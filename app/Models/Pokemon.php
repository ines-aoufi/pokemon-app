<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    protected $table = "pokemons";
    public function decks()
    {
        return $this->belongsToMany(Deck::class)->withPivot('quantity');
    }
}

