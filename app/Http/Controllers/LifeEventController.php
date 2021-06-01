<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\LifeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LifeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.life_event.index');
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
            
        return view('user.life_event.create')
            ->withUrl($url)
            ->withContact($contact)
            ->withContacts($contacts);
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
            'name' => 'required|string|max:255',
            'note' => 'nullable|max:255',
            'happened_at' => 'required|date',
        ]);

        $userId = Auth::user()->id;
        $lifeEvent = new LifeEvent();
        $lifeEvent->user_id = $userId;
        $lifeEvent->contact_id = $contact->id;
        $lifeEvent->name = $request->name;
        $lifeEvent->note = $request->note;
        $hp_at = Carbon::parse($request->happened_at);
        $lifeEvent->happened_at = $hp_at;
        $lifeEvent->save();

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
     * @param LifeEvent $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, LifeEvent $lifeEvent)
    {
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

        return view('user.life_event.edit')
            ->withUrl($url)
            ->withContact($contact)
            ->withLifeEvent($lifeEvent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Contact $contact
     * @param LifeEvent $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, LifeEvent $lifeEvent)
    {
        $this->validateWith([
            'name' => 'required|string|max:255',
            'note' => 'nullable|max:255',
            'happened_at' => 'required|date',
        ]);

        $userId = Auth::user()->id;
        $lifeEvent = LifeEvent::where('id', $lifeEvent->id)->where('contact_id', $contact->id)->findOrFail($lifeEvent->id);
        $lifeEvent->user_id = $userId;
        $lifeEvent->contact_id = $contact->id;
        $lifeEvent->name = $request->name;
        $lifeEvent->note = $request->note;
        $hp_at = Carbon::parse($request->happened_at);
        $lifeEvent->happened_at = $hp_at;
        $lifeEvent->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @param LifeEvent $lifeEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact, LifeEvent $lifeEvent)
    {
        LifeEvent::where('id', $lifeEvent->id)->where('contact_id', $contact->id)->delete();

        return redirect()->route('contact.show', $contact);
    }
}
