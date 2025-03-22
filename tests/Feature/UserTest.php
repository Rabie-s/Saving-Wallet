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
        $response->assertRedirect(route('home'));
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
        $response->assertRedirect();
    }

    public function test_user_can_logout()
    {

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('user.auth.logoutUser'));

        $response->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_user_can_change_password(){
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('rabiePassword'),
            'role' => 'user',
        ]);

        $this->actingAs($user);

        $response = $this->post(route('user.auth.changePassword'), [
            'currentPassword' => 'rabiePassword',
            'newPassword' => 'rabieNewPassword',
        ]);

        $response->assertRedirect()
        ->assertSessionHas('message', ['message' => 'Password Change Successful', 'type' => 'success']);


    }
}
