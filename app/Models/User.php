<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Profile;
use App\Models\StaffDetail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Filament\Panel;
use Filament\Models\Contracts\HasAvatar;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens, Notifiable, HasRoles;

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function getRouteKeyName(): string
    {
        return 'encoded_id';
    }

    public function getEncodedIdAttribute(): string
    {
        return Crypt::encryptString($this->user_id);
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        $decoded = base64_decode($value);
        return self::where('user_id', $decoded)->first();
    }

    public function getFilamentRecordKey(): int|string
    {
        return $this->encoded_id;
    }

    protected $fillable = [
        'username',
        'password',
        'profile_id',
        'coop_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'profile_id');
    }

    public function getNameAttribute(): string
    {
        $profileName = $this->profile?->full_name;

        if (is_string($profileName) && trim($profileName) !== '') {
            return $profileName;
        }

        if (is_string($this->username) && trim($this->username) !== '') {
            return $this->username;
        }

        $key = $this->getKey();
        return $key ? ('User #' . $key) : 'User';
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar
            ? Storage::disk('public')->url($this->avatar)
            : null;
    }

    public function staffDetail()
    {
        return $this->hasOne(StaffDetail::class, 'profile_id', 'profile_id');
    }

    public function branchId(): ?int
    {
        return $this->staffDetail?->branch_id;
    }

    public function roleName(): ?string
    {
        return $this->profile?->role?->name;
    }

    public function isStaff(): bool
    {
        return $this->staffDetail !== null;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function isMember(): bool
    {
        return $this->hasRole('Member');
    }

    public function isBranchScoped(): bool
    {
        return $this->hasAnyRole([
            'Manager',
            'Staff',
            'Cashier',
            'Account Officer',
        ]);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return ! $this->hasRole('Member');
    }

    public function canAccessBackOffice(): bool
    {
        return ! $this->isMember();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->coop_id = self::generateCoopId();
        });
    }

    public static function generateCoopId(): string
    {
        $prefix = 'COOP';
        $year = now()->format('Y');

        $last = \DB::table('users')
            ->where('coop_id', 'like', "{$prefix}-{$year}-%")
            ->orderByDesc('coop_id')
            ->value('coop_id');

        $sequence = $last
            ? (int) str($last)->afterLast('-')->value() + 1
            : 1;

        return sprintf('%s-%s-%03d', $prefix, $year, $sequence);
    }
}
