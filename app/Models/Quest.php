<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'body',
        'image_path'
    ];

    // quest moze byt splneny mnohymi postavami
    public function characters() {
        return $this->belongsToMany(Character::class, 'chronicles');
    }

    // odmenou za quest je mnoho predmetov
    public function items() {
        return $this->belongsToMany(Item::class, 'rewards');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'quest_id');
    }
}
