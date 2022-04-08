<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Jobs\SendEmailJob;

class SendBulkMailController extends Controller
{
  public function storemail()
  {
    // $request->validate([
    //   'title' => 'required',
    //   'message' => 'required',
    // ]);
    // $details = [
    //   'title' => $request->input('title'),
    //   'message' => $request->input('message')
    // ];
    $details = [
      'title' => 'test email send',
      'message' => 'hellow world'
    ];

    User::select('email')->chunk(4, function ($emails) use ($details) {
      dispatch(new  \App\Jobs\SendEmailJob($details, $emails))->delay(2);
    });
  }

}
