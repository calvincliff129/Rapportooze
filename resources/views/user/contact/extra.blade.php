@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<hr class="dashed">
<div class="container mt-5" style="max-width: 38rem; min-width: 29rem;">
    <div class="row gx-4">
        <div class="col-xl">
            <div class="card text-white mb-5">
                <div class="card-body">
                    <div class="text-center title mb-4">
                        <p for="activity">Update contact's extra info section.</</p>
                    </div>
                    
                    <form action="{{ route('extra.update', $contact->id) }}" method="POST">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    
                        <div class="card bg-dark">
                            <div class="card-header title text-center"><h4>Contact details (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ $contact->email }}" name="email" id="email" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone no</label>
                                    <input type="text" class="form-control" value="{{ $contact->phone }}" name="phone" id="phone" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" value="{{ $contact->facebook }}" name="facebook" id="facebook" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" value="{{ $contact->twitter }}" name="twitter" id="twitter" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title text-center"><h4>Physical address (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                <!-- <div class="mb-3">
                                    <label for="addr_name">Title</label>
                                    <input type="text" class="form-control" name="addr_name" id="addr_name" placeholder="">
                                </div> -->
                                
                                    <div class="mb-3">
                                        <label for="street">Street</label>
                                        <input type="text" class="form-control" value="@if ($address->contact_id == $contact->id) {{ $address->street }} @endif" name="street" id="street" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" value="@if ($address->contact_id == $contact->id) {{ $address->city }} @endif" name="city" id="city" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" value="@if ($address->contact_id == $contact->id) {{ $address->state }} @endif" name="state" id="state" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="postal_code">Poscode</label>
                                        <input type="text" class="form-control" value="@if ($address->contact_id == $contact->id) {{ $address->postal_code }} @endif" name="postal_code" id="postal_code" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control mb-1">
                                            <option value=""></option>
                                            @foreach ($countries as $country)
                                                <option class="dropdown-item" value="{{ $country }}" name="country" id="country" @if ($address->contact_id == $contact->id) {{ $country == $address->country ? 'selected' : '' }} @endif>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title text-center"><h4>Favourite pet (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="pet_type">Pet kind</label>
                                    <select name="pet_type" id="pet_type" class="form-control mb-1">
                                        <option value=""></option>
                                        @foreach ($petCats as $petType)
                                            <option class="dropdown-item" value="{{ $petType->name }}" @if ($pet->contact_id == $contact->id) {{ $petType->name == $pet->pet_type ? 'selected' : '' }} @endif>{{ $petType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pet_name">Pet name</label>
                                    <input type="text" class="form-control" value="@if ($pet->contact_id == $contact->id) {{ $pet->name }} @endif" name="pet_name" id="pet_name" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title text-center"><h4>Favourite food (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="favourite_food">Food name</label>
                                    <input type="text" class="form-control" value="{{ $contact->favourite_food }}" name="favourite_food" id="favourite_food" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title text-center"><h4>How you first met? (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="first_met">Date</label>
                                    <input type="text" class="form-control datepicker-lifeEvent" value="@if (!empty( $contact->first_met )) {{ date('j F Y', strtotime($contact->first_met)) }} @endif" name="first_met" id="first_met" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="first_met_info">Story</label>
                                    <input type="text" class="form-control" value="{{ $contact->first_met_info }}" name="first_met_info" id="first_met_info" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-auto d-flex justify-content-center">
                            <div class="mb-2 mt-auto px-2">
                                <button class="btn btn-primary btn-round">Update</button>
                            </div>
                            <div>
                                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection