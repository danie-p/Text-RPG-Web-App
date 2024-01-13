<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'age',
        'image_url',
        'bio',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
