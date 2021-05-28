@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-center">
    <div class="row container-fluid d-flex justify-content-lg-center" style="margin-top: 6%;">
        <div class="col-lg-auto">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <!-- <div class="block block-three"></div> -->
                        </div>
                        <div class="row mb-2 d-flex align-items-center justify-content-center">
                            <div class="col-auto">
                                <a href="#">
                                    <img class="avatar" src="{{ asset('black') }}/img/anime3.png" alt="">
                                </a>
                            </div>
                            <div class="col-auto">
                                <h4 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) ({{$contact->nickname}}) @else @endif</h4>
                            </div>
                        </div>
                        <div class="text-left px-4">
                            <p class="description">
                                Recent activity
                            </p>
                            <input class="form-control mb-4" disabled type="text" value="" placeholder="@if (!empty( $activity->happened_at )) {{ date('j F Y', strtotime( $activity->happened_at )) }} @else Not Available @endif">
                            <p class="description">
                                Stay in touch
                            </p>
                            <input class="form-control mb-4" disabled type="text" name="" id="" placeholder="No reminder set yet">
                        </div>
                    </p>
                </div>
            </div>
        </div>    
        <div class="col col-lg-4" style="min-width: 27rem">
            <form action="{{ route('reminder.update', [$contact->id, $reminder->id]) }}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                        </div>
                        <div style="margin-top: -2.5px;">
                            <h3>Update reminder</h3>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{ $reminder->title }}" name="title" id="title" placeholder="I want to be reminded of . . .">
                    </div>

                    <div class="mb-3">
                        <label for="happened_at">Choose a date</label>
                        <input type="text" class="form-control datepicker-reminder" value="@if (!empty( $reminder->reminder_date )) {{ date('j F Y', strtotime( $reminder->reminder_date )) }} @endif" name="reminder_date" id="reminder_date" placeholder="Choose a date">
                    </div>

                    <div class="dropdown mb-3">
                        <label for="frequency_type">Remind me</label>
                        <div class="form-group">
                            <select name="frequency_type" id="frequency_type" class="form-control mb-1">
                                <option class="dropdown-item" value="once" {{ $reminder->frequency_type == 'once' ? 'selected' : '' }}>Once only</option>
                                <option class="dropdown-item" value="recurring" {{ $reminder->frequency_type == 'recurring' ? 'selected' : '' }}>Repeating</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea type="text" class="form-control rounded px-2" value="{{ $reminder->description }}" name="description" id="description" placeholder="Type your note here (Optional)">{{ $reminder->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-auto d-flex flex-column align-items-center">
                <div class="mt-auto mb-2">
                    <button class="btn btn-primary btn-round">Save</button>
                </div>
                <div style="margin-bottom: 5rem">
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection