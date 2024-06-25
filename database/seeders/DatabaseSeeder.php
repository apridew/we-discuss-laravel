<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $username = 'userTest';

        \App\Models\User::create([
            'username' => 'userTest',
            'email' => 'userTest@test.com',
            'password' => static::$password ??= Hash::make('password'),
            'picture' => config('app.avatar_generator_url').$username,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);
    }
}
