<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('decks_pokemons', 'deck_pokemon');
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('deck_pokemon', 'decks_pokemons');
    }
};
