<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Contact $contact
     * @return \Illuminate\View\View
     */
    public function create(Contact $contact)
    {
        $userId = Auth::user()->id;
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
            
        return view('user.activity.create')
            ->withContact($contact)
            // ->withContacts($contacts)
            ->withUrl($url);
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
            'summary' => 'required|string|max:255',
            'detail' => 'nullable|max:255',
            'happened_at' => 'nullable|date',
        ]);

        $userId = Auth::user()->id;
        $activity = new Activity();
        $activity->user_id = $userId;
        $activity->contact_id = $contact->id;
        $activity->summary = $request->summary;
        $activity->detail = $request->detail;
        if ($request->filled('happened_at')) {
            $h_at = Carbon::parse($request->happened_at);
            $activity->happened_at = $h_at;
        } else {
            $activity->happened_at = null;
        }
        $activity->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @param Activity $activity
     */
    public function edit(Contact $contact, Activity $activity)
    {   
        $userId = Auth::user()->id;
        $lastActivity = Activity::where('contact_id', $contact->id)->orderBy('happened_at','desc')->first();
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
            
        return view('user.activity.edit')
            ->withUrl($url);
            ->withContact($contact)
            ->withActivity($activity)
            ->withLastActivity($lastActivity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Contact $contact
     * @param Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, Activity $activity)
    {
        $this->validateWith([
            'summary' => 'required|string|max:255',
            'detail' => 'nullable|max:255',
            'happened_at' => 'nullable|date',
        ]);
        
        $userId = Auth::user()->id;
        $activity = Activity::where('id', $activity->id)->where('contact_id', $contact->id)->findOrFail($activity->id);
        $activity->user_id = $userId;
        $activity->contact_id = $contact->id;
        $activity->summary = $request->summary;
        $activity->detail = $request->detail;
        if ($request->filled('happened_at')) {
            $h_at = Carbon::parse($request->happened_at);
            $activity->happened_at = $h_at;
        } else {
            $activity->happened_at = null;
        }
        $activity->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @param Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact, Activity $activity)
    {
        Activity::where('id', $activity->id)->where('contact_id', $contact->id)->delete();

        return redirect()->route('contact.show', $contact);
    }
}
