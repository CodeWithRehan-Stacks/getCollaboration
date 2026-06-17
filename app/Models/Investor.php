<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'website',
        'business_category',
        'sub_category',
        'tier',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
