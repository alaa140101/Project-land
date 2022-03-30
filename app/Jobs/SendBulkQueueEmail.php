<?php

namespace App\Jobs;

use App\Mail\SendEmailTest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\SendBulkMailController;


use App\Models\User;

class SendBulkQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    // public $listout = 5; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = collect(User::all());//13
        $usersChunked = $users->chunk(4);// 
        $usersCount = count($users);
        $now = now();

        $users->chunk($usersCount)->each(function($usersChunked) use($now){
            SendBulkQueueEmail::dispatch($usersChunked)->delay($now->addSeconds(2));
        });      

        // $email = new SendEmailTest();
        // Mail::to($this->details['email'])->dispatch($usersChunked)->delay($now->addSeconds(2))->send($email);
        // // \Mail::to($this->details['email'])->send($email);

    }
}
