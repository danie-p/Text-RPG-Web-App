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

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // postava vlastni vela predmetov
    public function items() {
        return $this->belongsToMany(Item::class, 'inventories');
    }

    // postava moze splnit mnoho questov
    public function quests() {
        return $this->belongsToMany(Quest::class, 'chronicles');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'character_id');
    }
}
