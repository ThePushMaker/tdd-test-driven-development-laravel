<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_unauthenticated_user_cannot_access_products_page(): void
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));
    }
    
    public function test_homepage_contains_empty_table(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('products.index'))
            ->assertStatus(200)
            ->assertSee('No products found');
    }
}
