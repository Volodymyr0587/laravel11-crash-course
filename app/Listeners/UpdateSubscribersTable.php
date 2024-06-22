<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateSubscribersTable
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        DB::insert('insert into subsribers (email) values (?)', [$event->user->email]);
    }
}
