<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class WhatsNew extends Model
{
    protected $table = 'whats_new';

    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
        'image_path',
        'default_image',
        'start_date',
        'end_date',
        'is_active',
        'is_featured',
        'sort_order',
        'created_by',
        'updated_by',
    ];

    // Cast
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Automatically generate slug if not provided
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    // Relationship to the user who created the news
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    // Relationship to the user who last updated the news
    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }

    // Accessor to get the final image URL (uploaded or default)
    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }

        if ($this->default_image) {
            return asset('images/defaults/' . $this->default_image);
        }

        // fallback image
        return asset('images/defaults/fallback.png');
    }
}
