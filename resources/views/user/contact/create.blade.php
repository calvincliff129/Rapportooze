@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-center">
    <div class="row" style="margin-top: 6%;">
        <div class="col-lg-3 text-center">
            <h1>Create a contact</h1>
        </div>        
        <div class="col-lg">
            <form action="{{route('contact.store')}}" method="POST">
                {{csrf_field()}}

                @include('alerts.success')
        
            <div class="card" style="max-width: 38rem; min-width: 20rem;">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('contact.index') }}"><i class="fas fa-angle-left fa-2x"></i></a>
                        </div>
                        <div style="margin-top: -2.5px;">
                            <h3>New Contact</h3>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name (Optional)">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name (Optional)">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname (Optional)">
                    </div>
                    <div class="dropdown mb-3">
                        <div class="form-group">
                            <select name="gender_id" id="gender_id" class="form-control mb-1">
                                <option class="dropdown-item" value="">Select Gender</option>
                                @foreach ($genders as $gender)
                                    <option class="dropdown-item" name="gender_id" value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-4 d-flex flex-column btn-cstm">
                <div class="mb-2 mt-auto">
                    <button class="btn btn-primary btn-round">Save and add more</button>
                </div>
                <div class="mb-5">
                    <button type="submit"class="btn btn-success btn-round" value="save" name="save">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- <div class="dropdown mb-3">
    <div class="form-group">
        <select name="country" id="country" class="form-control mb-1">
            <option class="dropdown-item" value="">Select Country</option>
            @foreach ($countries as $country)
                <option class="dropdown-item" value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>
    </div>
</div> -->
@endsection