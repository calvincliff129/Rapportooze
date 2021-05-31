<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.reminder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function create(Contact $contact)
    {
        $userId = Auth::user()->id;
        $contacts = Contact::where('user_id', '=', $userId)->where('id', '!=', $contact->id)->get();
        $activity = Activity::where('contact_id', $contact->id)->orderBy('happened_at','desc')->first();
        $path = 'avatars';
        if (Storage::disk('s3')->exists($path.'/'.$contact->avatar))
        {
            $url = Storage::disk('s3')->temporaryUrl(
                $path.'/'.$contact->avatar,
                now()->addMinutes(60)
            );
        } else {
            $url = 0;
        }

        return view('user.reminder.create')
            ->withUrl($url);
            ->withContact($contact)
            ->withContacts($contacts)
            ->withActivity($activity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Contact $contact
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {
        $this->validateWith([
            'title' => 'required|string|max:255',
            'description' => 'nullable|max:255',
            'reminder_date' => 'required|date',
        ]);

        $userId = Auth::user()->id;
        $reminder = new Reminder();
        $reminder->user_id = $userId;
        $reminder->contact_id = $contact->id;
        $reminder->is_birthday = 0;
        $reminder->title = $request->title;
        $reminder->description = $request->description;
        $r_dt = Carbon::parse($request->reminder_date);
        $reminder->reminder_date = $r_dt;
        $reminder->frequency_type = $request->frequency_type;
        $reminder->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @param Reminder $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, Reminder $reminder)
    {
        $userId = Auth::user()->id;
        // $contacts = Contact::where('user_id', '=', $userId)->where('id', '!=', $contact->id)->get();
        $activity = Activity::where('contact_id', $contact->id)->orderBy('happened_at','desc')->first();
        $path = 'avatars';
        if (Storage::disk('s3')->exists($path.'/'.$contact->avatar))
        {
            $url = Storage::disk('s3')->temporaryUrl(
                $path.'/'.$contact->avatar,
                now()->addMinutes(60)
            );
        } else {
            $url = 0;
        }
        
        return view('user.reminder.edit')
            ->withUrl($url);
            ->withContact($contact)
            ->withReminder($reminder)
            ->withActivity($activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Contact $contact
     * @param Reminder $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, Reminder $reminder)
    {
        $this->validateWith([
            'title' => 'required|string|max:255',
            'description' => 'nullable|max:255',
            'reminder_date' => 'required|date',
        ]);

        $userId = Auth::user()->id;
        $reminder = Reminder::where('id', $reminder->id)->where('contact_id', $contact->id)->findOrFail($reminder->id);
        $reminder->user_id = $userId;
        $reminder->contact_id = $contact->id;
        $reminder->is_birthday = 0;
        $reminder->title = $request->title;
        $reminder->description = $request->description;
        $r_dt = Carbon::parse($request->reminder_date);
        $reminder->reminder_date = $r_dt;
        $reminder->frequency_type = $request->frequency_type;
        $reminder->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request  $request
     * @param Contact $contact
     * @param Reminder $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact, Reminder $reminder)
    {
        Reminder::where('id', $reminder->id)->where('contact_id', $contact->id)->delete();

        return redirect()->route('contact.show', $contact);
    }
}
