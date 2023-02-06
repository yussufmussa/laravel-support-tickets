<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory()->count(1)->create();

        User::create([
            'name' => 'customer demo',
            'email' => 'yussufhamad600@gmail.com',
            'role_id' => 3,
            'email_verified_at' => now(),
            'password' => Hash::make('customer'), // password
            // 'remember_token' => Str::random(10),

        ]);
    }
}
