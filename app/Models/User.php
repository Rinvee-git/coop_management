<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
use Filament\Panel;

class User extends Authenticatable
{
    /**
     * Used by Filament for user display name.
     * Always returns a string.
     */

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'profile_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
        // if you only have one panel, just block Members here
        return ! $this->hasRole('Member');
    }

    public function canAccessBackOffice(): bool
{
    return ! $this->isMember(); // members should not access admin panel
}
}
