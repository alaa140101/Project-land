<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Project,
};

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
        $numberofUsers = 10;
        $userHasProjects = 3;

        User::factory($numberofUsers)
            ->has(Project::factory()->count($userHasProjects))
            ->create();
    }
}
