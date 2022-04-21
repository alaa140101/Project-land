<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // You can change subscriber number 
        $numberofSubscriber = 1000;
        Subscriber::factory($numberofSubscriber)->create();

        // Call seeders for users and projects
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);

        // Admin account
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'password' => Hash::make('password'),
        ]);
    }
}
