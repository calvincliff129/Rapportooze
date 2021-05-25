<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use Illuminate\Console\Command;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userId = auth()->user();
        $reminders = Reminder::where('user_id', $userId->id)->whereNotNull('reminder_date')->get();
        foreach($reminders as $reminder) {
            $diffInDays = $reminder->reminder_date->diff(Carbon::now())->days;
        
            $reminder->notify("Hey there, you have a reminder in $diffInDays day(s)!");
        }
    }
}
