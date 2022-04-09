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

  /**
  * Create a new job instance.
  *
  * @return void
  */

  public function __construct($details, $emails)
  {
    $this->details = $details;
    $this->emails = collect($emails);
  }
  
  /**
   * Execute the job.
   *
   * @return void
   */
  
  
  public function handle() 
  {
    $users = $this->emails ?? User::select('email')->get();
    $users = $this->emails;
    $input['title'] = $this->details['title'];
    $input['message'] = $this->details['message'];
    
    foreach ($users as $user) {
      $input['email'] = $user->email;
      
      \Mail::send(
        'emails.test',
        ['input' => $input],
        function ($message) use ($input) {
          $message->to($input['email'])->subject($input['title']);
        }
      )->later(now()->addSeconds(2));

      sleep(2);
    } 
  }
}
