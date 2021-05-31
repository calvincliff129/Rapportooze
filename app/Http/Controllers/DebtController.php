<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Debt;
use App\Models\Contact;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.debt.index');
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

        return view('user.debt.create')
            ->withUrl($url);
            ->withContact($contact)
            ->withContacts($contacts)
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
            'amount' => 'required|string|gt:0',
            'reason' => 'nullable|max:255',
        ]);

        $userId = Auth::user()->id;
        $debt = new Debt();
        $debt->user_id = $userId;
        $debt->contact_id = $contact->id;
        $debt->in_debt = $request->get('debt_options') == 'yes' ? 'yes' : 'no';
        $debt->currency = $request->currency;
        $debt->amount = $request->amount;
        $debt->reason = $request->reason;
        $debt->save();

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
     * @param Debt $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact, Debt $debt)
    {
        $userId = Auth::user()->id;
        $contacts = Contact::where('user_id', '=', $userId)->where('id', '!=', $contact->id)->get();
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
        
        return view('user.debt.edit')
            ->withUrl($url);
            ->withContact($contact)
            ->withContacts($contacts)
            ->withDebt($debt)
            ->withCurrencies($currencies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Contact $contact
     * @param Debt $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, Debt $debt)
    {
        $this->validateWith([
            'amount' => 'required|string|gt:0',
            'reason' => 'nullable|max:255',
        ]);

        $userId = Auth::user()->id;
        $debt = Debt::where('id', $debt->id)->where('contact_id', $contact->id)->findOrFail($debt->id);
        $debt->user_id = $userId;
        $debt->contact_id = $contact->id;
        $debt->in_debt = $request->get('debt_options') == 'yes' ? 'yes' : 'no';
        $debt->currency = $request->currency;
        $debt->amount = $request->amount;
        $debt->reason = $request->reason;
        $debt->save();

        return redirect()->route('contact.show', $contact->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @param Debt $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact, Debt $debt)
    {
        Debt::where('id', $debt->id)->where('contact_id', $contact->id)->delete();

        return redirect()->route('contact.show', $contact);
    }
}
