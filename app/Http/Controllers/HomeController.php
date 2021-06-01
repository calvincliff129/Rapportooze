<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Debt;
use App\Models\Gift;
use App\Models\Contact;
use App\Models\Reminder;
use App\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $contacts = Contact::where('user_id', $userId)->get();
        $contactsCount = Contact::where('user_id', $userId)->count();
        $debtsCount = Debt::where('user_id', $userId)->count();
        $giftsCount = Gift::where('user_id', $userId)->count();
        $activitiesCount = Activity::where('user_id', $userId)->count();
        $month = Carbon::now();
        $monthTwo = Carbon::now()->addMonths();
        $monthThree = Carbon::now()->addMonths(2);
        $lastUpdated = Contact::where('user_id', $userId)->orderBy('updated_at', 'desc')->paginate(3);

        $reminderMonth = Reminder::where('user_id', $userId)->whereMonth('reminder_date', $month->month)
                                    ->orderBy('reminder_date', 'desc')
                                    ->paginate(5);
        $reminderMonthTwo = Reminder::where('user_id', $userId)->whereMonth('reminder_date', $monthTwo->month)
                                    ->orderBy('reminder_date', 'desc')
                                    ->paginate(5);
        $reminderMonthThree = Reminder::where('user_id', $userId)->whereMonth('reminder_date', $monthThree->month)
                                    ->orderBy('reminder_date', 'desc')
                                    ->paginate(5);

        $recentOccassions = Activity::where('user_id', $userId)
                                    ->orderBy('happened_at', 'desc')
                                    ->paginate(5);
                                    
        return view('dashboard')
            ->withContacts($contacts)
            ->withLastUpdated($lastUpdated)
            ->withContactsCount($contactsCount)
            ->withDebtsCount($debtsCount)
            ->withGiftsCount($giftsCount)
            ->withActivitiesCount($activitiesCount)
            ->withMonth($month)
            ->withMonthTwo($monthTwo)
            ->withMonthThree($monthThree)
            ->withReminderMonth($reminderMonth)
            ->withReminderMonthTwo($reminderMonthTwo)
            ->withReminderMonthThree($reminderMonthThree)
            ->withRecentOccassions($recentOccassions);
    }
}
