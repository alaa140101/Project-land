<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Validation\Rule;


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
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $this->validate($request, $rules, $messages);

        $subscriber = new Subscriber;

        $subscriber->email = $request->email;

        $subscriber->save();

        session()->flash('flash_message', trans('messages.Email subscribe successfully'));

        return redirect()->back();
    }

    protected function getRules()
    {
        return [
            'email' => "required|unique:subscribers,email|email",
        ];
    }
    protected function getMessages()
    {
        return [
            'email.required' => trans('messages.Email required'),
            'email.unique' => trans('messages.Email already exist'),
            'email.email' => trans('messages.Email not correct form'),
        ];
    }
}
