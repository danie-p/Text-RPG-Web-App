<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // predmet patri do 1 kategorie
    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    // predmet moze vlastnit vela postav
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'inventories');
    }

    // predmet moze byt ako odmena v mnohych questoch
    public function quests() {
        return $this->belongsToMany(Quest::class, 'rewards');
    }
}
