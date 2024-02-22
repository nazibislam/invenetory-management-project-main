<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_home_page_for_authenticated_users()
    {
        // Create a user to authenticate
        $user = User::factory()->create();

        // Authenticate the user
        $response = $this->actingAs($user);

        // Access the home page
        $response = $this->get(route('home'));

        // Assert the response status and view
        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    /** @test */
    public function it_redirects_unauthenticated_users_to_the_login_page()
    {
        // Access the home page without authentication
        $response = $this->get(route('home'));

        // Assert the response status and redirection
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}