<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use Tests\TestCase;

class PokemonFilterTest extends TestCase
{
    /**
     * Test that filtering by type works correctly
     */
    public function test_pokemon_filter_by_type_works(): void
    {
        $response = $this->get(route('pokemon.index', ['type' => 'Fire']));

        $response->assertStatus(200)
            ->assertViewIs('pokemon.list')
            ->assertViewHas('pokemons');
    }
}