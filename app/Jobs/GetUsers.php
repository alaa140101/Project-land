<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Jobs\SendEmailJob;

class GetUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = collect(User::all());//13
        $usersChunked = $users->chunk(4);// 4 Jobs
        $usersCount = count($users);
        $now = now();

        // dd($usersChunked);

        $users->chunk($usersCount)->each(function($usersChunked) use($now){
            SendEmailJob::dispatch($usersChunked)->delay($now->addSeconds(2));
        });   
    }
}
