<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your JSON file (adjust if it's elsewhere)
        $jsonPath = 'pokemon.json'; // This points to storage/app/pokemons.json

        // Check if the file exists
        if (!Storage::exists($jsonPath)) {
            throw new \Exception("JSON file not found at: " . Storage::path($jsonPath));
        }

        // Load and decode the JSON
        $jsonContent = Storage::get($jsonPath);
        $pokemons = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON: " . json_last_error_msg());
        }

        // Prepare data for insertion
        $dataToInsert = [];
        foreach ($pokemons as $pokemon) {
            if (isset($pokemon['abilities']) && is_string($pokemon['abilities'])) {
                $pokemon['abilities'] = json_decode($pokemon['abilities'], true) ?? [];
            }

            $dataToInsert[] = [
                'abilities' => json_encode($pokemon['abilities'] ?? []),
                'against_bug' => $pokemon['against_bug'] ?? 1,
                'against_dark' => $pokemon['against_dark'] ?? 1,
                'against_dragon' => $pokemon['against_dragon'] ?? 1,
                'against_electric' => $pokemon['against_electric'] ?? 1,
                'against_fairy' => $pokemon['against_fairy'] ?? 1,
                'against_fight' => $pokemon['against_fight'] ?? 1,
                'against_fire' => $pokemon['against_fire'] ?? 1,
                'against_flying' => $pokemon['against_flying'] ?? 1,
                'against_ghost' => $pokemon['against_ghost'] ?? 1,
                'against_grass' => $pokemon['against_grass'] ?? 1,
                'against_ground' => $pokemon['against_ground'] ?? 1,
                'against_ice' => $pokemon['against_ice'] ?? 1,
                'against_normal' => $pokemon['against_normal'] ?? 1,
                'against_poison' => $pokemon['against_poison'] ?? 1,
                'against_psychic' => $pokemon['against_psychic'] ?? 1,
                'against_rock' => $pokemon['against_rock'] ?? 1,
                'against_steel' => $pokemon['against_steel'] ?? 1,
                'against_water' => $pokemon['against_water'] ?? 1,
                'attack' => $pokemon['attack'] ?? 0,
                'base_egg_steps' => $pokemon['base_egg_steps'] ?? 0,
                'base_happiness' => $pokemon['base_happiness'] ?? 0,
                'base_total' => $pokemon['base_total'] ?? 0,
                'capture_rate' => $pokemon['capture_rate'] ?? 0,
                'classification' => $pokemon['classfication'] ?? $pokemon['classification'] ?? '',
                'defense' => $pokemon['defense'] ?? 0,
                'experience_growth' => $pokemon['experience_growth'] ?? 0,
                'height_m' => $pokemon['height_m'] ?? 0.0,
                'hp' => $pokemon['hp'] ?? 0,
                'japanese_name' => $pokemon['japanese_name'] ?? '',
                'name' => $pokemon['name'] ?? '',
                'percentage_male' => $pokemon['percentage_male'] ?? 0.0,
                'pokedex_number' => $pokemon['pokedex_number'] ?? 0,
                'sp_attack' => $pokemon['sp_attack'] ?? 0,
                'sp_defense' => $pokemon['sp_defense'] ?? 0,
                'speed' => $pokemon['speed'] ?? 0,
                'type1' => $pokemon['type1'] ?? '',
                'type2' => $pokemon['type2'] ?? null,
                'weight_kg' => $pokemon['weight_kg'] ?? 0.0,
                'generation' => $pokemon['generation'] ?? 1,
                'is_legendary' => $pokemon['is_legendary'] ?? false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $chunks = array_chunk($dataToInsert, 100);
        foreach ($chunks as $chunk) {
            DB::table('pokemons')->insert($chunk);
        }

        $this->command->info('Pokemon table seeded successfully!');
    }
}
