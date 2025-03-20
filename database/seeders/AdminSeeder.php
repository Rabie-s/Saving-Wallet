<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@email.com',
            'password'=>'admin@email.com',
            'phone_number'=>'0000000000',
            'role'=>'admin',
        ]);
        $user->wallet()->create();
    }
}
