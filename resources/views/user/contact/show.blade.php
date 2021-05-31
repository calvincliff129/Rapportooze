@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-lg-center">
    <div class="col" style="max-width: 45rem;">
        <div class="card card-user">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{route('contact.edit', $contact->id)}}" class="btn btn-sm btn-success">Edit User</a>
                </div>
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <!-- <div class="block block-three"></div> -->
                    </div>
                    <div class="row mb-2 d-flex align-items-center justify-content-center">
                        <div class="col-auto" style="min-width: 150px">
                            <a href="{{ route('avatar.select', $contact->id) }}">
                                <div class="avatar-cstm">
                                    @if ($contact->avatar == null)
                                        <div>{!! Avatar::create($contact->first_name)->setFontSize(40)->setBorder(0, '#fff', 45)->setDimension(114)->toSvg(); !!}</div>
                                    @else
                                        <img src="{{ @$url }}" style="width: 120px; height: 120px; float:left; border-radius:30%; margin-right:25px;">
                                    @endif
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <h3 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) <p class="fs-italic text-center">({{$contact->nickname}})</p> @else @endif</h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <p class="col description">
                            Birthday : @if (!empty( $contact->birthdate )) <strong>{{ date('j M Y', strtotime($contact->birthdate)) }} ({{ $age }})</strong> @else <strong>Not given yet</strong> @endif
                        </p>
                        <p class="col description">
                            Recent activity : @if (!empty( $activity->id )) <strong>{{ date('j M Y', strtotime($activity->happened_at)) }}</strong> @else <strong>No activity together . .</strong> @endif
                        </p>
                    </div>
                </p>
                <!-- <div class="card-description text-center">
                    {{ __('Just doin somethin...') }}
                </div> -->
            </div>
            <!-- <div class="card-footer">
                <div class="button-container">
                    <button class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div> -->
        </div>
    </div>  
</div>
<hr class="dashed">


<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="col"></div>
                    <div class="col card-text text-center title mb-4">
                        <p for="activity">Additional info.</</p>
                    </div>
                    <div class="col text-right" style="margin-top: -0.5rem; margin-right: -1.9rem; padding-left: 3rem;">
                        <a href="{{ route('extra.edit', $contact->id) }}" class="btn btn-sm btn-success btn-link" style=""><small><i class="fas fa-pen-square fa-2x"></i></small></a>
                    </div>
                </div>
                <div class="border border-5 border-default rounded p-3" style="border: 2px;">
                    <div class="card bg-dark">
                        <div class="card-header title"><h4>Contact details</h4>
                        </div>
                        <hr class="bold">
                        <div class="card-body">
                            @if (!empty( $contact->email || $contact->phone || $contact->facebook || $contact->twitter ))
                                <div class="card-text">
                                <p class="d-flex align-items-center mb-2">@if ( !empty($contact->email) )<i class="fas fa-envelope" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->email }} @endif</p>
                                <p class="d-flex align-items-center">@if ( !empty($contact->phone) )<i class="fas fa-phone" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->phone }} @endif</p>
                                <p class="d-flex align-items-center">@if ( !empty($contact->facebook) )<i class="fab fa-facebook-f" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->facebook }} @endif</p>
                                <p class="d-flex align-items-center">@if ( !empty($contact->twitter) )<i class="fab fa-twitter" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->twitter }} @endif</p>
                                </div>
                            @else
                                <p class="card-text">. . .</p>
                            @endif
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header title"><h4>Current address</h4>
                        </div>
                        <hr class="bold">
                        <div class="card-body">
                            @if (!empty( $address->street || $address->city || $address->state || $address->postal_code || $address->country ))
                                <div class="card-text d-flex flex-row">
                                <i class="fas fa-map-marker-alt" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                <p class="mb-2">
                                    @if ( !empty($address->street) ) {{ $address->street }} <br> @endif 
                                    @if ( !empty($address->city) ) {{ $address->city }} <br> @endif
                                    @if ( !empty($address->state) )  {{ $address->state }} <br> @endif
                                    @if ( !empty($address->postal_code) ) {{ $address->postal_code }} <br> @endif
                                    @if ( !empty($address->country) ) {{ $address->country }} <br> @endif
                                </p>
                                </div>
                            @else
                                <p class="card-text">. . .</p>
                            @endif
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header title"><h4>Favourite Pet</h4>
                        </div>
                        <hr class="bold">
                        <div class="card-body">
                            @if (!empty( $pet->pet_type))
                                <div class="card-text d-flex flex-row">
                                    <i class="fas fa-paw" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                    <p class="mb-2">
                                        {{ $pet->pet_type }} <br>
                                        @if ( !empty($pet->name) ) It's called {{ $pet->name }}. @endif
                                    </p>
                                </div>
                            @else
                                <p class="card-text">. . .</p>
                            @endif
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header title"><h4>Favourite food</h4>
                        </div>
                        <hr class="bold">
                        <div class="card-body">
                            @if (!empty( $contact->favourite_food))
                                <div class="card-text">
                                    <p class="d-flex align-items-center mb-2">@if ( !empty($contact->favourite_food) )<i class="fas fa-cookie-bite" style="width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->favourite_food }} @endif</p>
                                </div>
                            @else
                                <p class="card-text">. . .</p>
                            @endif
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <div class="card-header title"><h4>How you first met?</h4>
                        </div>
                        <hr class="bold">
                        <div class="card-body">
                            @if (!empty( $contact->first_met || $contact->first_met_info ))
                                <div class="card-text d-flex flex-row">
                                    <i class="fas fa-user-friends" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                    <p class="mb-2">
                                        @if ( !empty($contact->first_met) ) {{ date('j F Y', strtotime($contact->first_met)) }} <br> @endif
                                        @if ( !empty($contact->first_met_info) ) {{ $contact->first_met_info }} @endif
                                    </p>
                                </div>
                            @else
                                <p class="card-text">. . .</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab">
            <li>
                <a href="#profile" class="btn btn-simple btn-warning animation-on-hover active" data-toggle="pill">Profile</a>
            </li>
            <li>
                <a href="#timeline" class="btn btn-simple btn-warning animation-on-hover" data-toggle="pill">Timeline</a>
            </li>
        </ul>
        <div class="tab-content width-content">
            <div class="tab-pane fade show active" id="profile">
                <div class="card bg-default mb-5">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $contact->first_name }} {{ $contact->last_name }} is . . .</h5>
                        <p class="card-text">{{$contact->description}}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row justify-content-between">
                        <div class="col-auto text-white">
                            <label for="activity">Activities</label>
                        </div>
                        <div class="col-auto text-right" style="margin-top: -0.5rem">
                            <a href="{{ route('activity.create', $contact->id) }}" class="btn btn-sm btn-success">Add activity</a>
                        </div>
                    </div>
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">List of activities</h5>
                            <hr class="wide">
                            @if (!empty( $activities ))
                                @foreach ($activities as $activity)
                                    <p class="card-text">
                                        • {{ $activity->summary }}
                                        <small class="badge bg-default text-wrap">
                                            {{ date('j M Y', strtotime($activity->happened_at)) }}
                                        </small>
                                        @if (!empty( $activity->detail ))
                                        <small class="d-flex align-items-right mt-1">
                                            &nbsp;&nbsp; {{ $activity->detail }}
                                        </small>
                                        @endif
                                        <div class="d-flex">
                                            <a href="{{ route('activity.edit', [$contact->id, $activity->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('activity.destroy', [$contact->id, $activity->id]) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-warning btn-link"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </p>
                                    <hr class="wide mb-2">
                                @endforeach
                            @else
                                <p class="card-text">Not added yet . . .</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row justify-content-between">
                        <div class="col-auto text-white">
                            <label for="activity">Reminders</label>
                        </div>
                        <div class="col-auto text-right" style="margin-top: -0.5rem">
                            <a href="{{route('reminder.create', $contact->id)}}" class="btn btn-sm btn-success">Add reminder</a>
                        </div>
                    </div>
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">List of reminders</h5>
                            <hr class="wide">
                            @if (!empty( $reminders ))
                                @foreach ($reminders as $reminder)
                                    <div class="row">
                                        <p class="card-text">
                                            <div class="col-sm-2">
                                                <small>
                                                    • {{ date('j M Y', strtotime($reminder->reminder_date)) }}
                                                </small>
                                            </div>
                                            <div class="col-sm-2">
                                                <small>
                                                    {{ $reminder->title }}
                                                </small>
                                            </div>
                                            <div class="col-sm">
                                                @if (!empty( $reminder->description ))
                                                    <small>
                                                        {{ $reminder->description }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                <small class="badge bg-primary text-wrap">
                                                    {{ $reminder->frequency_type != 'once' ? 'Set to' : 'Remind' }} {{ $reminder->frequency_type }}
                                                </small>
                                            </div>
                                            <div class="col d-flex justify-content-end" style="margin-top: -0.6rem;">
                                                <a href="{{ route('reminder.edit', [$contact->id, $reminder->id]) }}" class="btn btn-success btn-link d-inline"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('reminder.destroy', [$contact->id, $reminder->id]) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-warning btn-link d-inline"><i class="fas fa-check-square"></i></button>
                                                </form>
                                            </div>
                                        </p>
                                    </div>
                                    <hr class="wide mb-2">
                                @endforeach
                            @else
                                <p class="card-text">Not added yet . . .</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row justify-content-between">
                        <div class="col-auto text-white">
                            <label for="gift">Gifts</label>
                        </div>
                        <div class="col-auto text-right" style="margin-top: -0.5rem">
                            <a href="{{route('gift.create', $contact->id)}}" class="btn btn-sm btn-success">Add gift</a>
                        </div>
                    </div>
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">List of gifts</h5>
                            <hr class="wide">
                            @if (!empty( $gifts ))
                                @foreach ($gifts as $gift)
                                    <p class="card-text">
                                        • {{ $gift->name }}
                                        <small>
                                            ({{ $gift->status }})
                                        </small>
                                        @if (!empty( $gift->price ))
                                        <small class="d-flex mt-1">
                                            &nbsp;&nbsp; {{ $gift->currency }} {{ $gift->price }}
                                        </small>
                                        @endif
                                        @if (!empty( $gift->note ))
                                        <small class="d-flex mt-1">
                                            &nbsp;&nbsp; {{ $gift->note }}
                                        </small>
                                        @endif
                                        <div class="d-flex">
                                            <a href="{{ route('gift.edit', [$contact->id, $gift->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('gift.destroy', [$contact->id, $gift->id]) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-warning btn-link"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </p>
                                    <hr class="wide mb-2">
                                @endforeach
                            @else
                                <p class="card-text">No gift idea . . .</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row justify-content-between">
                        <div class="col-auto text-white">
                            <label for="activity">Debts</label>
                        </div>
                        <div class="col-auto text-right" style="margin-top: -0.5rem">
                            <a href="{{route('debt.create', $contact->id)}}" class="btn btn-sm btn-success">Add debt</a>
                        </div>
                    </div>
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">List of debts</h5>
                            <hr class="wide">
                            @if (!empty( $debts ))
                                @foreach ($debts as $debt)
                                <p class="card-text">
                                        <div class="row">
                                            <div class="col-4">
                                                <small class="badge bg-default text-wrap">
                                                    @if ($debt->in_debt == 'yes')
                                                        • You owe {{ $contact->first_name }}
                                                    @elseif ($debt->in_debt == 'no')
                                                        • {{ $contact->first_name }} owes you
                                                    @endif
                                                </small>
                                            
                                                <small class="d-flex mt-1">
                                                    @if (!empty( $debt->amount ))
                                                        &nbsp;&nbsp; {{ $debt->currency }} {{ $debt->amount }}
                                                    @endif
                                                </small>
                                            </div>
                                            <div class="col">
                                                <small class="d-flex mt-1">
                                                    @if (!empty( $debt->reason ))
                                                        &nbsp;&nbsp; {{ $debt->reason }}
                                                    @endif
                                                </small>
                                            </div>
                                            <div class="col-auto d-flex" style="margin-top: -0.5rem;">
                                                <a href="{{ route('debt.edit', [$contact->id, $debt->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('debt.destroy', [$contact->id, $debt->id]) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-default btn-link"><i class="fas fa-check-square"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </p>
                                    <hr class="wide mb-2">
                                @endforeach
                            @else
                                <p class="card-text">Debt clean . . .</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="mb-3">
                    <div class="row justify-content-between">
                        <div class="col-4 text-white">
                            <label for="activity">Tasks</label>
                        </div>
                        <div class="col-4 text-right" style="margin-top: -0.5rem">
                            <a href="{{route('contact.edit', $contact->id)}}" class="btn btn-sm btn-success">Add task</a>
                        </div>
                    </div>
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">List of tasks</h5>
                            <p class="card-text">Currently there's 0 task.</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="tab-pane fade show" id="timeline">
                @include('user.timeline.index')
            </div>
        </div>
    </div>
</div>







<div class="container mt-5">
    <div class="row gx-4">
        <div class="col-xl">
            <!-- <div class="p-3 bg-dark">Custom column padding</div> -->
            <div class="card text-white mb-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="col"></div>
                        <div class="col card-text text-center title mb-4">
                            <p for="activity">Additional info.</</p>
                        </div>
                        <div class="col text-right" style="margin-top: -0.5rem; margin-right: -1.9rem; padding-left: 3rem;">
                            <a href="{{ route('extra.edit', $contact->id) }}" class="btn btn-sm btn-success btn-link" style=""><small><i class="fas fa-pen-square fa-2x"></i></small></a>
                        </div>
                    </div>
                    <div class="border border-5 border-default rounded p-3" style="border: 2px;">
                        <div class="card bg-dark">
                            <div class="card-header title"><h4>Contact details</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                @if (!empty( $contact->email || $contact->phone || $contact->facebook || $contact->twitter ))
                                    <div class="card-text">
                                    <p class="d-flex align-items-center mb-2">@if ( !empty($contact->email) )<i class="fas fa-envelope" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->email }} @endif</p>
                                    <p class="d-flex align-items-center">@if ( !empty($contact->phone) )<i class="fas fa-phone" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->phone }} @endif</p>
                                    <p class="d-flex align-items-center">@if ( !empty($contact->facebook) )<i class="fab fa-facebook-f" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->facebook }} @endif</p>
                                    <p class="d-flex align-items-center">@if ( !empty($contact->twitter) )<i class="fab fa-twitter" style="margin-bottom: -.25rem; width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->twitter }} @endif</p>
                                    </div>
                                @else
                                    <p class="card-text">. . .</p>
                                @endif
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title"><h4>Current address</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                @if (!empty( $address->street || $address->city || $address->state || $address->postal_code || $address->country ))
                                    <div class="card-text d-flex flex-row">
                                    <i class="fas fa-map-marker-alt" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                    <p class="mb-2">
                                        @if ( !empty($address->street) ) {{ $address->street }} <br> @endif 
                                        @if ( !empty($address->city) ) {{ $address->city }} <br> @endif
                                        @if ( !empty($address->state) )  {{ $address->state }} <br> @endif
                                        @if ( !empty($address->postal_code) ) {{ $address->postal_code }} <br> @endif
                                        @if ( !empty($address->country) ) {{ $address->country }} <br> @endif
                                    </p>
                                    </div>
                                @else
                                    <p class="card-text">. . .</p>
                                @endif
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title"><h4>Favourite Pet</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                @if (!empty( $pet->pet_type))
                                    <div class="card-text d-flex flex-row">
                                        <i class="fas fa-paw" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                        <p class="mb-2">
                                            {{ $pet->pet_type }} <br>
                                            @if ( !empty($pet->name) ) It's called {{ $pet->name }}. @endif
                                        </p>
                                    </div>
                                @else
                                    <p class="card-text">. . .</p>
                                @endif
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title"><h4>Favourite food</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                @if (!empty( $contact->favourite_food))
                                    <div class="card-text">
                                        <p class="d-flex align-items-center mb-2">@if ( !empty($contact->favourite_food) )<i class="fas fa-cookie-bite" style="width: 1rem; color: blueviolet;"></i>&nbsp;&nbsp;&nbsp; {{ $contact->favourite_food }} @endif</p>
                                    </div>
                                @else
                                    <p class="card-text">. . .</p>
                                @endif
                            </div>
                        </div>
                        <div class="card bg-dark">
                            <div class="card-header title"><h4>How you first met?</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body">
                                @if (!empty( $contact->first_met || $contact->first_met_info ))
                                    <div class="card-text d-flex flex-row">
                                        <i class="fas fa-user-friends" style="margin-top: .19rem; width: 2rem; color: blueviolet;"></i>
                                        <p class="mb-2">
                                            @if ( !empty($contact->first_met) ) {{ date('j F Y', strtotime($contact->first_met)) }} <br> @endif
                                            @if ( !empty($contact->first_met_info) ) {{ $contact->first_met_info }} @endif
                                        </p>
                                    </div>
                                @else
                                    <p class="card-text">. . .</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl">
            <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab">
                <li>
                    <a href="#profile" class="btn btn-simple btn-warning animation-on-hover active" data-toggle="pill">Profile</a>
                </li>
                <li>
                    <a href="#timeline" class="btn btn-simple btn-warning animation-on-hover" data-toggle="pill">Timeline</a>
                </li>
            </ul>
            <div class="tab-content width-content">
                <div class="tab-pane fade show active" id="profile">
                    <div class="card text-white bg-default mb-5">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $contact->first_name }} {{ $contact->last_name }} is . . .</h5>
                            <p class="card-text">{{$contact->description}}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4 text-white">
                                <label for="activity">Activities</label>
                            </div>
                            <div class="col-4 text-right" style="margin-top: -0.5rem">
                                <a href="{{ route('activity.create', $contact->id) }}" class="btn btn-sm btn-success">Add activity</a>
                            </div>
                        </div>
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">List of activities</h5>
                                <hr class="wide">
                                @if (!empty( $activities ))
                                    @foreach ($activities as $activity)
                                        <p class="card-text">
                                            • {{ $activity->summary }}
                                            <small class="badge bg-default text-wrap">
                                                {{ date('j M Y', strtotime($activity->happened_at)) }}
                                            </small>
                                            @if (!empty( $activity->detail ))
                                            <small class="d-flex align-items-right mt-1">
                                                &nbsp;&nbsp; {{ $activity->detail }}
                                            </small>
                                            @endif
                                            <div class="d-flex">
                                                <a href="{{ route('activity.edit', [$contact->id, $activity->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('activity.destroy', [$contact->id, $activity->id]) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-warning btn-link"><i class="far fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </p>
                                        <hr class="wide mb-2">
                                    @endforeach
                                @else
                                    <p class="card-text">Not added yet . . .</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4 text-white">
                                <label for="activity">Reminders</label>
                            </div>
                            <div class="col-4 text-right" style="margin-top: -0.5rem">
                                <a href="{{route('reminder.create', $contact->id)}}" class="btn btn-sm btn-success">Add reminder</a>
                            </div>
                        </div>
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">List of reminders</h5>
                                <hr class="wide">
                                @if (!empty( $reminders ))
                                    @foreach ($reminders as $reminder)
                                        <div class="row">
                                            <p class="card-text">
                                                <div class="col-sm-2">
                                                    <small>
                                                        • {{ date('j M Y', strtotime($reminder->reminder_date)) }}
                                                    </small>
                                                </div>
                                                <div class="col-sm-2">
                                                    <small>
                                                        {{ $reminder->title }}
                                                    </small>
                                                </div>
                                                <div class="col-sm">
                                                    @if (!empty( $reminder->description ))
                                                        <small>
                                                            {{ $reminder->description }}
                                                        </small>
                                                    @endif
                                                </div>
                                                <div class="col-1">
                                                    <small class="badge bg-primary text-wrap">
                                                        {{ $reminder->frequency_type != 'once' ? 'Set to' : 'Remind' }} {{ $reminder->frequency_type }}
                                                    </small>
                                                </div>
                                                <div class="col d-flex justify-content-end" style="margin-top: -0.6rem;">
                                                    <a href="{{ route('reminder.edit', [$contact->id, $reminder->id]) }}" class="btn btn-success btn-link d-inline"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('reminder.destroy', [$contact->id, $reminder->id]) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-warning btn-link d-inline"><i class="fas fa-check-square"></i></button>
                                                    </form>
                                                </div>
                                            </p>
                                        </div>
                                        <hr class="wide mb-2">
                                    @endforeach
                                @else
                                    <p class="card-text">Not added yet . . .</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4 text-white">
                                <label for="gift">Gifts</label>
                            </div>
                            <div class="col-4 text-right" style="margin-top: -0.5rem">
                                <a href="{{route('gift.create', $contact->id)}}" class="btn btn-sm btn-success">Add gift</a>
                            </div>
                        </div>
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">List of gifts</h5>
                                <hr class="wide">
                                @if (!empty( $gifts ))
                                    @foreach ($gifts as $gift)
                                        <p class="card-text">
                                            • {{ $gift->name }}
                                            <small>
                                                ({{ $gift->status }})
                                            </small>
                                            @if (!empty( $gift->price ))
                                            <small class="d-flex mt-1">
                                                &nbsp;&nbsp; {{ $gift->currency }} {{ $gift->price }}
                                            </small>
                                            @endif
                                            @if (!empty( $gift->note ))
                                            <small class="d-flex mt-1">
                                                &nbsp;&nbsp; {{ $gift->note }}
                                            </small>
                                            @endif
                                            <div class="d-flex">
                                                <a href="{{ route('gift.edit', [$contact->id, $gift->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('gift.destroy', [$contact->id, $gift->id]) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-warning btn-link"><i class="far fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </p>
                                        <hr class="wide mb-2">
                                    @endforeach
                                @else
                                    <p class="card-text">No gift idea . . .</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4 text-white">
                                <label for="activity">Debts</label>
                            </div>
                            <div class="col-4 text-right" style="margin-top: -0.5rem">
                                <a href="{{route('debt.create', $contact->id)}}" class="btn btn-sm btn-success">Add debt</a>
                            </div>
                        </div>
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">List of debts</h5>
                                <hr class="wide">
                                @if (!empty( $debts ))
                                    @foreach ($debts as $debt)
                                    <p class="card-text">
                                            <div class="row">
                                                <div class="col-4">
                                                    <small class="badge bg-default text-wrap">
                                                        @if ($debt->in_debt == 'yes')
                                                            • You owe {{ $contact->first_name }}
                                                        @elseif ($debt->in_debt == 'no')
                                                            • {{ $contact->first_name }} owes you
                                                        @endif
                                                    </small>
                                                
                                                    <small class="d-flex mt-1">
                                                        @if (!empty( $debt->amount ))
                                                            &nbsp;&nbsp; {{ $debt->currency }} {{ $debt->amount }}
                                                        @endif
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small class="d-flex mt-1">
                                                        @if (!empty( $debt->reason ))
                                                            &nbsp;&nbsp; {{ $debt->reason }}
                                                        @endif
                                                    </small>
                                                </div>
                                                <div class="col-auto d-flex" style="margin-top: -0.5rem;">
                                                    <a href="{{ route('debt.edit', [$contact->id, $debt->id]) }}" class="btn btn-success btn-link"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('debt.destroy', [$contact->id, $debt->id]) }}" method="POST">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-default btn-link"><i class="fas fa-check-square"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </p>
                                        <hr class="wide mb-2">
                                    @endforeach
                                @else
                                    <p class="card-text">Debt clean . . .</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4 text-white">
                                <label for="activity">Tasks</label>
                            </div>
                            <div class="col-4 text-right" style="margin-top: -0.5rem">
                                <a href="{{route('contact.edit', $contact->id)}}" class="btn btn-sm btn-success">Add task</a>
                            </div>
                        </div>
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">List of tasks</h5>
                                <p class="card-text">Currently there's 0 task.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="tab-pane fade show" id="timeline">
                    @include('user.timeline.index')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right card-text" style="margin-bottom: -3rem;">
    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button class="btn btn-warning btn-link" style="font-size: 9px;">Delete contact</button>
    </form>
</div>
@endsection