<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    

    public function index()
    {
        $users = User::all();
        $chunks = $users->chunk(2);

        // foreach ($chunks as $chunk) {
        //    dd($chunk[0]->email);
        // };

        return view('welcome', compact('users'));
    }
}
