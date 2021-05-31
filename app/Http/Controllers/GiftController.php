<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Gift;
use App\Models\Photo;
use App\Models\Contact;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.gift.index');
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
        $currencies = DB::table('currencies')->get();
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

        return view('user.gift.create')
            ->withUrl($url);
            ->withContact($contact)
            ->withContacts($contacts)
            ->withActivity($activity)
            ->withCurrencies($currencies);
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
            'url' => 'nullable|string|max:255',
            'price' => 'nullable|string|gt:0',
        ]);

        $userId = Auth::user()->id;
        $gift = new Gift();
        $gift->user_id = $userId;
        $gift->contact_id = $contact->id;
        $gift->name = $request->name;
        $gift->note = $request->note;
        $gift->url = $request->url;
        $gift->currency = $request->currency;
        $gift->price = $request->price;
        if($request->hasFile('giftPhoto')){
    		$gift_photo = $request->file('giftPhoto');
    		$filename = time() . '.' . $gift_photo->getClientOriginalExtension();
    		Image::make($gift_photo)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$gift->photo = $filename;
    	}

        $gift->save();

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
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, Gift $gift)
    {
        $userId = Auth::user()->id;
        // $contacts = Contact::where('user_id', '=', $userId)->where('id', '!=', $contact->id)->get();
        $activity = Activity::where('contact_id', $contact->id)->orderBy('happened_at','desc')->first();
        $currencies = DB::table('currencies')->get();
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
        
        return view('user.gift.edit')
            ->withUrl($url);
            ->withContact($contact)
            ->withGift($gift)
            ->withActivity($activity)
            ->withCurrencies($currencies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Contact $contact
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, Gift $gift)
    {
        $this->validateWith([
            'name' => 'required|string|max:255',
            'note' => 'nullable|max:255',
            'url' => 'nullable|string|max:255',
            'price' => 'nullable|string|gt:0',
        ]);
        
        $userId = Auth::user()->id;
        $gift = Gift::where('id', $gift->id)->where('contact_id', $contact->id)->find($gift->id);
        $gift->user_id = $userId;
        $gift->contact_id = $contact->id;
        $gift->name = $request->name;
        $gift->note = $request->note;
        $gift->url = $request->url;
        $gift->currency = $request->currency;
        $gift->price = $request->price;
        if($request->hasFile('giftPhoto')){
    		$gift_photo = $request->file('giftPhoto');
    		$filename = time() . '.' . $gift_photo->getClientOriginalExtension();
    		Image::make($gift_photo)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$contact->gift = $filename;
    	}

        $gift->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @param Gift $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact, Gift $gift)
    {
        Gift::where('id', $gift->id)->where('contact_id', $contact->id)->delete();

        return redirect()->route('contact.show', $contact);
    }

    // public function deletePhoto(Contact $contact, Gift $gift)
    // {
    //     $gift = Gift::where('contact_id', $contact->id)->find($gift->id);

    //     if(\File::exists(public_path('/uploads/avatars/').$gift->photo)){

    //         \File::delete(public_path('/uploads/avatars/').$gift->photo);
    //         $gift->photo = null;
    //         $gift->save();
    //     }
    // }
}
