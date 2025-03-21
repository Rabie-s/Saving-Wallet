<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    
   
    use RefreshDatabase;

    public function test_user_can_create_income_transaction()
    {
        
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);

        // Create a wallet manually
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 1000, // Initial balance
        ]);

        $category = Category::create([
            'title'=>'Salary',
            'type'=>'income'
        ]);

        $this->actingAs($user); // Simulate user login

        // Send a request to create an income transaction
        $response = $this->post(route('user.createNewTransaction'), [
            'amount' => 500,
            'type' => 'income',
            'category_id' => $category->id, // Assuming a category exists
            'note' => 'Salary',
        ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'amount' => 500,
            'type' => 'income',
        ]);


        $wallet->refresh();
        $this->assertEquals(1500, $wallet->balance);

    }

    public function test_user_can_create_expenses_transaction()
    {
        
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);

        // Create a wallet manually
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 1000, // Initial balance
        ]);

        $category = Category::create([
            'title'=>'food',
            'type'=>'expenses'
        ]);

        $this->actingAs($user); // Simulate user login

        // Send a request to create an income transaction
        $response = $this->post(route('user.createNewTransaction'), [
            'amount' => 500,
            'type' => 'expenses',
            'category_id' => $category->id, // Assuming a category exists
            'note' => 'Salary',
        ]);

        $wallet->refresh();

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'amount' => 500,
            'type' => 'expenses',
        ]);

        $this->assertEquals(500, $wallet->balance);

    }

    public function test_user_cannot_create_expense_transaction_if_balance_is_insufficient(){
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);

        // Create a wallet manually
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'balance' => 1000, // Initial balance
        ]);

        $category = Category::create([
            'title'=>'food',
            'type'=>'expenses'
        ]);

        $this->actingAs($user); // Simulate user login

        $response = $this->post(route('user.createNewTransaction'), [
            'amount' => 1500,
            'type' => 'expenses',
            'category_id' => $category->id, // Assuming a category exists
            'note' => '',
        ]);

        $this->assertDatabaseMissing('transactions',[
            'amount' => 1500,
            'type' => 'expenses',
            'category_id' => $category->id, // Assuming a category exists
            'note' => '',
        ]);

    }


}
