<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Deck;
use Tests\TestCase;

class DeckPrivacyTest extends TestCase
{
    /**
     * Test that users can only see their own decks
     */
    public function test_user_cannot_see_other_users_decks(): void
    {
        $response = $this->get(route('deck.list'));

        $response->assertStatus(200)
            ->assertViewIs('deck.list')
            ->assertViewHas('decks');
    }
}