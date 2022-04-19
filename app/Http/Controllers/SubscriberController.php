<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscriber;

class SubscriberController extends Controller
{
    public $subscriber;
    
    public function __construct(subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $subscribers = subscriber::orderBy('created_at', 'desc')->paginate(20);
       
        return view('subscribers', compact('subscribers'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $subscriber = new subscriber;

        $subscriber->email = $request->email;

        $subscriber->save();

        return redirect()->back()->with('success', 'تمت اضافة بريدك ');
    }
}
