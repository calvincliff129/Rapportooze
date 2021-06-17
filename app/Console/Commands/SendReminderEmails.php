<?php

namespace App\Console\Commands;

use Mailgun\Mailgun;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Reminder;
use Carbon\CarbonInterval;
use Illuminate\Console\Command;
use App\Mail\ReminderEmailDigest;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails notifications to user';

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
        //One hour is added to compensate for PHP being one hour faster 
        $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        logger($now);
        
        //  Get all reminders
        $reminders = Reminder::with(['contact'])
                    ->whereMonth('reminder_date', Carbon::today()->month)
                    ->whereDay('reminder_date','>=', Carbon::now())
                    ->whereDay('reminder_date', '<=', Carbon::today()->addDay(2)->day)
                    ->where('deleted_at', NULL)
                    ->orderBy('reminder_date', 'asc')
                    ->get();

        // Group by user
        $data = [];
        foreach ($reminders as $reminder) {

            $data[$reminder->user_id][] = $reminder->toArray();
        }

        // dd($data);
        //  Send email
        foreach($data as $userId => $reminders)
        {
            $this->sendEmailToUser($userId, $reminders);
        }
    }

    private function sendEmailToUser($userId, $reminders)
    {
        $user = User::find($userId);

        Mail::to($user)->queue(new ReminderEmailDigest($reminders));
    }
}
