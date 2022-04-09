<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmailJob;

class SendBulkMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function show()
  {
    return view('emails.send-email');
  }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'message' => 'required',
    ]);

    $details = [
      'title' => $request->input('title'),
      'message' => $request->input('message')
    ];
   
    // How many emails per Job
    $chunkedEmails = 25;


    User::select('email')->chunk($chunkedEmails, function ($emails) use ($details) {
      dispatch(new  SendEmailJob($details, $emails));
    });

    return redirect()->back()->with('success', 'تم ارسال الايملاات بنجاح');
    }

}
