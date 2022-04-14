<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
        $users = User::orderBy('created_at', 'desc')->paginate(20);
       
        return view('users.all-users', compact('users'));
    }

    
    public function update(Request $request, User $user)
    {

        $user = $this->user->find($request->id);

        
        $user->update(['is_subscribe'=> $request->is_subscribe]);
        
        return redirect()->back()->with(
            'success',
            'تمت اضافة بريدك '
        );
    }
}
