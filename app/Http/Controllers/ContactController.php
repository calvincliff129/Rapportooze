<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Session;
use LaraFlash;
use Carbon\Carbon;
use App\Models\Pet;
use App\Models\User;
use App\Models\Debt;
use App\Models\Gift;
use App\Models\Photo;
use App\Models\PetType;
use App\Models\Gender;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Reminder;
use App\Models\Activity;
use App\Models\LifeEvent;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Monarobase\CountryList\CountryListFacade;


class ContactController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $contacts = Contact::where('user_id',$userId)->orderBy('first_name', 'asc')->paginate(10);
        $contactsCount = Contact::where('user_id', $userId)->count();
        $imagePath = public_path('/uploads/avatars/');
        
        return view('user.contact.index')
            ->withContacts($contacts)
            ->withImagePath($imagePath)
            ->withContactsCount($contactsCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $countries = CountryListFacade::getList('en');
        return view('user.contact.create')
            ->withGenders($genders)
            ->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'gender_id' => 'nullable|integer|exists:genders,id',
        ]);

        $contact = new Contact();
        $contact->user_id = Auth::user()->id;
        $contact->first_name = $request->first_name;
        $contact->middle_name = $request->middle_name;
        $contact->last_name = $request->last_name;
        $contact->nickname = $request->nickname;
        $contact->gender_id = $request->gender_id;
        $contact->save();

        if (! is_null($request->input('save'))) {
            Session::flash('success', 'Contact has been successfully created');
            return redirect()->route('contact.show', $contact->id);
        } else {
            return redirect()->route('contact.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {    
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id',$userId)->findOrFail($contact->id);
        $age = Carbon::parse($contact->birthdate)->diffInYears(Carbon::now());
        $activities = Activity::where('user_id', $userId)->where('contact_id', $contact->id)->orderBy('happened_at', 'desc')->get();
        $activity = Activity::where('user_id', $userId)->where('contact_id', $contact->id)->orderBy('happened_at', 'desc')->first();
        $reminders = Reminder::where('user_id', $userId)->where('contact_id', $contact->id)->orderBy('reminder_date', 'desc')->get();
        $gifts = Gift::where('user_id', $userId)->where('contact_id', $contact->id)->latest()->get();
        $debts = Debt::where('user_id', $userId)->where('contact_id', $contact->id)->latest()->get();
        $lifeEvents = LifeEvent::where('user_id', $userId)->where('contact_id', $contact->id)->orderBy('happened_at', 'desc')->get();
        $imagePath = public_path('/uploads/avatars/').$contact->avatar;

        $check_address = Address::where('user_id',$userId)->where('contact_id', $contact->id)->first();
        if ($check_address === null) {

            $address = new Address();

        } else {

            $address = Address::where('user_id',$userId)->where('contact_id', $contact->id)->first();

        }

        $check_pet = Pet::where('user_id',$userId)->where('contact_id', $contact->id)->first();
        if ( $check_pet === null) {

            $pet = new Pet();

        } else {

            $pet = Pet::where('user_id',$userId)->where('contact_id', $contact->id)->first();
            
        }

        return view('user.contact.show')
            ->withContact($contact)
            ->withAge($age)
            ->withActivities($activities)
            ->withActivity($activity)
            ->withReminders($reminders)
            ->withGifts($gifts)
            ->withDebts($debts)
            ->withLifeEvents($lifeEvents)
            ->withContact($contact)
            ->withAddress($address)
            ->withPet($pet)
            ->withImagePath($imagePath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id',$userId)->findOrFail($contact->id);
        $genders = Gender::all();
        
        return view('user.contact.edit')->withContact($contact)->withGenders($genders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validateWith([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'gender_id' => 'nullable|integer|exists:genders,id',
            'description' => 'nullable|max:255',
            'birthdate' => 'nullable|date',
        ]);
        
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id',$userId)->findOrFail($contact->id);
        $contact->first_name = $request->first_name;
        $contact->middle_name = $request->middle_name;
        $contact->last_name = $request->last_name;
        $contact->nickname = $request->nickname;
        $contact->gender_id = $request->gender_id;
        $contact->description = $request->description;
        if ($request->birthdate_options == 'exact') {
            if ($request->filled('birthdate')) {
                $DOB = Carbon::parse($request->birthdate);
                $contact->birthdate = $DOB;
            } else {
                $contact->birthdate = null;
            }
        } elseif ($request->birthdate_options == 'noDOB') {
            $contact->birthdate = null;
        }
        
        $contact->save();

        // Session::flash('success', 'Permission has been successfully added');
        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function editExtra(Contact $contact)
    {
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id',$userId)->find($contact->id);
        $countries = CountryListFacade::getList('en');
        $petCats = PetType::get();

        $check_address = Address::where('user_id',$userId)->where('contact_id', $contact->id)->first();
        if ($check_address === null) {

            $address = new Address();

        } else {

            $address = Address::where('user_id',$userId)->where('contact_id', $contact->id)->first();

        }

        $check_pet = Pet::where('user_id',$userId)->where('contact_id', $contact->id)->first();
        if ( $check_pet === null) {

            $pet = new Pet();

        } else {

            $pet = Pet::where('user_id',$userId)->where('contact_id', $contact->id)->first();
            
        }

        return view('user.contact.extra')
            ->withContact($contact)
            ->withAddress($address)
            ->withPetCats($petCats)
            ->withPet($pet)
            ->withCountries($countries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function updateExtra(Request $request, Contact $contact)
    {
        $this->validateWith([
            'email' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'pet_name' => 'nullable|string|max:255',
            'favourite_food' => 'nullable|string|max:255',
            'first_met' => 'nullable|date',
            'first_met_info' => 'nullable|string|max:255',
        ]);
        
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id',$userId)->find($contact->id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->favourite_food = $request->favourite_food;
        $f_mt = Carbon::parse($request->first_met);
        $contact->first_met = $f_mt;
        $contact->first_met_info = $request->first_met_info;
        
        $check_address = Address::where('user_id',$userId)->where('contact_id', $contact->id)->first();
        if ($check_address === null) {

            $address = new Address();
            $address->user_id = $userId;
            $address->contact_id = $contact->id;
            $address->street = $request->street;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->postal_code = $request->postal_code;
            $address->country = $request->country;

        } else {

            $address = $check_address;
            $address->street = $request->street;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->postal_code = $request->postal_code;
            $address->country = $request->country;
        }

        $check_pet = Pet::where('user_id', $userId)->where('contact_id', $contact->id)->first();
        if ( $check_pet === null) {
                $pet = new Pet();
                $pet->user_id = $userId;
                $pet->contact_id = $contact->id;
                $pet->pet_type = $request->pet_type;
                if ($request->pet_type == '') {
                    $pet->name = null;
                } else {
                    $pet->name = $request->pet_name;   
                } 
        } else {
                $pet = $check_pet;
                $pet->user_id = $userId;
                $pet->contact_id = $contact->id;
                $pet->pet_type = $request->pet_type;
                if ($request->pet_type == '') {
                    $pet->name = null;
                } else {
                    $pet->name = $request->pet_name;   
                } 
        }

        $contact->save();
        $address->save();
        $pet->save();
        // Session::flash('success', 'Permission has been successfully added');
        return redirect()->route('contact.show', $contact->id);
    }

    public function chooseAvatar(Contact $contact)
    {
        $userId = Auth::user()->id;
        $contact = Contact::where('user_id', $userId)->find($contact->id);
        // $imagePath = public_path('/uploads/avatars/').$contact->avatar;
        
        $path = 'uploads/avatars';
        $url = Storage::disk('s3')->url($path.'/'.$contact->avatar);
                    
        return view('user.contact.avatar')
                ->withUrl($url)
                ->withContact($contact);
    }

    public function setAvatar(Request $request, Contact $contact)
    {
        $this->validateWith([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $userId = Auth::user()->id;
    	// Handle avatar upload
    	if($request->hasFile('avatar')){
    		// $avatar = $request->file('avatar');
    		// $filename = time() . '.' . $avatar->getClientOriginalExtension();
    		// Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $path = 'uploads/avatars';
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->resize(300, 300)->storeAs(
                    '$path',
                    'filename',
                    's3'
                );
    		
            $contact = Contact::where('user_id',$userId)->find($contact->id);
    		$contact->avatar = $filename;
    		$contact->save();
    	}

    	return redirect()->route('avatar.select', $contact->id);
    }

    public function deleteAvatar(Contact $contact)
    {
        $user = auth()->user()->id;
        $contact = Contact::where('user_id', $user)->find($contact->id);

        if(\File::exists(public_path('/uploads/avatars/').$contact->avatar)){

            \File::delete(public_path('/uploads/avatars/').$contact->avatar);
            $contact->avatar = null;
            $contact->save();
        }
        
        return redirect()->route('avatar.select', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Contact::where('id', $contact->id)->delete();

        return redirect()->route('contact.index');
    }
}
