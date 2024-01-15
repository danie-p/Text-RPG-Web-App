<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'image', 'quest', 'character_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function character() {
        return $this->belongsTo(Character::class, 'character_id');
    }
}
