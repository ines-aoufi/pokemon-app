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

    public function getImageUrlAttribute() : ?string
    {
        $return = strtr(utf8_decode($this->name), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
        $return = str_replace(' ', '-', $return); // Replaces all spaces with hyphens.
        $return = preg_replace('/[^A-Za-z0-9\-]/', '', $return);
        $return = strtolower($return); // Converts the string to lowercase.

        return asset('pokemons_images/' . $return . '.png');
    }
}

