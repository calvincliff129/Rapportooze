@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-center">
    <div class="row container-fluid d-flex justify-content-lg-center" style="margin-top: 6%;">
        <div class="col-lg-auto text-center">
            <h1>Edit contact</h1>
        </div>        
        <div class="col col-lg-auto">
            <form action="{{route('contact.update', $contact->id)}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="card" style="max-width: 38rem; min-width: 16rem;">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                        </div>
                        <div style="margin-top: -2.5px;">
                            <h3>Update {{$contact->first_name}}'s information</h3>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col mb-3">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" value="{{$contact->first_name}}" name="first_name" id="first_name" placeholder="First Name">
                        </div>

                        <div class="col mb-3" style="min-width: 10rem;">
                            <label for="middle_name">Mddle name (Optional)</label>
                            <input type="text" class="form-control" value="{{$contact->middle_name}}" name="middle_name" id="middle_name" placeholder="Middle Name (Optional)">
                        </div>

                        <div class="col-md mb-3">
                            <label for="last_name">Last name (Optional)</label>
                            <input type="text" class="form-control" value="{{$contact->last_name}}" name="last_name" id="last_name" placeholder="Last Name (Optional)">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="nickname">Nickname (Optional)</label>
                        <input type="text" class="form-control" value="{{$contact->nickname}}" name="nickname" id="nickname" placeholder="Nickname (Optional)">
                    </div>
                    <hr>
                    <div class="dropdown mb-3">
                        <label for="gender_id">Gender</label>
                        <div class="form-group">
                            <select name="gender_id" id="gender_id" class="form-control mb-1">
                                @foreach ($genders as $gender)
                                    <option class="dropdown-item" name="gender_id" value="{{ $gender->id }}" {{ $gender->id == $contact->gender_id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="description">How would you describe {{$contact->first_name}}? (Optional)</label>
                        <textarea type="text" class="form-control rounded px-2" value="{{ $contact->description }}" name="description" id="description" placeholder="Write some info if any . . .">{{ $contact->description }}</textarea>
                    </div>
                    <hr>
                    
                    <label for="birthdate">Birthdate</label>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="birthdate_options" value="noDOB" onclick="createDOB(0)" @if (empty( $contact->birthdate )) checked @endif>
                            I don't know . . . yet
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="birthdate_options" value="exact" onclick="createDOB(1)" @if (!empty( $contact->birthdate )) checked @endif>
                            What is the birth date of this person?
                            <span class="form-check-sign"></span>
                        </label>
                        <div class="mt-2 mb-3 mx-4 @if (empty( $contact->birthdate )) collapse @endif" style="width:220px;" id="exactDOB">
                            <input type="text" class="form-control datepicker" value="@if (!empty( $contact->birthdate )) {{ date('j F Y', strtotime($contact->birthdate)) }} @endif" name="birthdate" placeholder="Enter {{$contact->first_name}}'s birthdate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-auto d-flex justify-content-center">
                <div class="mb-5 mt-auto">
                    <button class="btn btn-primary btn-round">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection