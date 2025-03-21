<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_add_category(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);
        $this->actingAs($user);
        $response = $this->post(route('user.category.store'),[
            'title'=>'Salary',
            'type'=>'income'
        ]);

        $this->assertDatabaseHas('categories',[
            'title'=>'Salary',
            'type'=>'income',
            'user_id'=>$user->id
        ]);
        
    }
}
