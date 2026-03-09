<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $table = 'decks';
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
