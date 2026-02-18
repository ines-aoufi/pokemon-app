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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->json('abilities'); // Store as JSON array (e.g., ["Overgrow", "Chlorophyll"])
            $table->decimal('against_bug', 3, 2); // Floats like 1.0, 0.5
            $table->decimal('against_dark', 3, 2);
            $table->decimal('against_dragon', 3, 2);
            $table->decimal('against_electric', 3, 2);
            $table->decimal('against_fairy', 3, 2);
            $table->decimal('against_fight', 3, 2);
            $table->decimal('against_fire', 3, 2);
            $table->decimal('against_flying', 3, 2);
            $table->decimal('against_ghost', 3, 2);
            $table->decimal('against_grass', 3, 2);
            $table->decimal('against_ground', 3, 2);
            $table->decimal('against_ice', 3, 2);
            $table->decimal('against_normal', 3, 2);
            $table->decimal('against_poison', 3, 2);
            $table->decimal('against_psychic', 3, 2);
            $table->decimal('against_rock', 3, 2);
            $table->decimal('against_steel', 3, 2);
            $table->decimal('against_water', 3, 2);
            $table->integer('attack');
            $table->integer('base_egg_steps');
            $table->integer('base_happiness');
            $table->integer('base_total');
            $table->integer('capture_rate');
            $table->string('classification'); // Assuming this is the intended field name
            $table->integer('defense');
            $table->integer('experience_growth');
            $table->decimal('height_m', 4, 2); // E.g., 0.7
            $table->integer('hp');
            $table->string('japanese_name');
            $table->string('name');
            $table->decimal('percentage_male', 4, 1); // E.g., 88.1
            $table->integer('pokedex_number')->unique(); // Likely unique
            $table->integer('sp_attack');
            $table->integer('sp_defense');
            $table->integer('speed');
            $table->string('type1');
            $table->string('type2')->nullable(); // Can be null if no second type
            $table->decimal('weight_kg', 5, 2); // E.g., 6.9
            $table->integer('generation');
            $table->boolean('is_legendary'); // 0 or 1
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};