<?php

namespace App\Jobs;

use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    public $emails;

  public function __construct($details, $emails)
  {
    $this->details = $details;
    $this->emails = $emails;
}

public function handle()
{
    // إرسال البريد الإلكتروني إلى حزمة البريد الالكتروني المحددة أو للجميع
    
    info($this->emails);
    // $users = $this->emails ?? User::all();
    $users = $this->emails ?? User::all();
    $input['title'] = $this->details['title'];
    $input['message'] = $this->details['message'];
    foreach ($users as $user) {
      $input['email'] = $user->email;

      Mail::send(
        'emails.test',
        ['input' => $input],
        function ($message) use ($input) {
          $message->to($input['email'])->subject($input['title']);
        }
      );
    }
  }
}
