<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create(['name' => 'مهند سيف', 'email' => 'safe@gmail.com', 'password' =>  Hash::make('password'),]);
        User::create(['name' => 'حسن خالد', 'email' => 'hassan@gmail.com', 'password' =>  Hash::make('password'),]);
        User::create(['name' => 'أكرم حسام', 'email' => 'akram@gmail.com', 'password' =>  Hash::make('password'),]);
        User::create(['name' => 'وائل محمد', 'email' => 'wael@gmail.com', 'password' =>  Hash::make('password'),]);
        User::create(['name' => 'محمد علي', 'email' => 'mohammed@gmail.com', 'password' =>  Hash::make('password'),]);
        
    }
}
