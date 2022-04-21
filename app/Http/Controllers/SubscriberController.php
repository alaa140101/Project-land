<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public $subscriber;
    
    public function __construct(Subscriber $subscriber)
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
        $subscribers = Subscriber::orderBy('created_at', 'desc')->paginate(20);
       
        return view('subscribers', compact('subscribers'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $subscriber = new Subscriber;

        $subscriber->email = $request->email;

        $subscriber->save();

        return redirect()->back()->with('success', 'تمت اضافة بريدك ');
    }
}
