<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'creator_id',
        'investor_id',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
