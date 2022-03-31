<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $users = User::all();
        $chunks = $users->chunk(2);

        // foreach ($chunks as $chunk) {
        //    dd($chunk[0]->email);
        // };

        return view('users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = new User;

        $user->email = $request->email;
        $user->save();


        return back();
    }
}
