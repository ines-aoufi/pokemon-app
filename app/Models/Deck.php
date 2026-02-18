<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Deck extends Model
{
    protected $table = "decks";
    public function pokemons(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class)->withPivot('quantity');
    }
}
