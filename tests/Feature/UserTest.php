<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_view_register_form()
    {
        $response = $this->get(route('user.auth.showRegistrationForm'));
        $response->assertStatus(200);
    }

    public function test_user_can_view_login_form()
    {
        $response = $this->get(route('user.auth.showLoginForm'));
        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('rabiePassword'),
            'role' => 'user',
        ]);
        $user->wallet()->create();

        $response = $this->post(route('user.auth.registerUser'), $user->toArray());

        $this->assertDatabaseHas('users', ['email' => $user->email]);
        $this->assertDatabaseHas('wallets', ['user_id' =>$user->id]);
    }

    public function test_user_can_login()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('rabiePassword'),
            'role' => 'user',
        ]);

        $response = $this->post(route('user.auth.loginUser'), [
            'email' => $user->email,
            'password' => 'rabiePassword',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_logout()
    {

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('user.auth.logoutUser'));

        $response->assertRedirect('/');

        $this->assertGuest();
    }
}
