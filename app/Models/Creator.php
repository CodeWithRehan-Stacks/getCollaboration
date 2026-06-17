<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dob',
        'niche',
        'sub_niche',
        'social_media_links',
        'status',
        'restriction_reason',
    ];

    protected $casts = [
        'dob' => 'date',
        'social_media_links' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
