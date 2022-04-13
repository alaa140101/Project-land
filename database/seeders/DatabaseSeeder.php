<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Project,
};
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
        // You can change Users number and Porjects 
        $numberofUsers = 500;
        $userHasProjects = 3;

        User::factory($numberofUsers)
            ->has(Project::factory()->count($userHasProjects))
            ->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'password' => Hash::make('password'),
        ]);
    }
}
