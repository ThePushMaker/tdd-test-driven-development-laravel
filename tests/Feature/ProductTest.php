<?php

namespace Tests\Feature;

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
}
