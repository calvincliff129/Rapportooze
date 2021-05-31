@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="row justify-content-center" style="margin-top: 6%;">
    <div class="col-md-3">
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
                            <a href="{{ route('avatar.select', $contact->id) }}">
                                @if ($contact->avatar == null)
                                    <div class="avatar">{!! Avatar::create($contact->first_name)->setFontSize(50)->setBorder(0, '#fff', 60)->setDimension(114)->toSvg(); !!}</div>
                                @else
                                    <img class="avatar" src="{{ @$url }}">
                                @endif
                            </a>
                        </div>
                        <div class="col-auto">
                            <h4 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) <p class="fs-italic text-center">({{$contact->nickname}})</p> @else @endif</h4>
                        </div>
                    </div>
                    <div class="text-left px-4">
                        <p class="description">
                            Recent activity
                        </p>
                        <input class="form-control mb-4" disabled type="text" placeholder="@if (!empty( $activity->happened_at )) {{ date('j F Y', strtotime( $activity->happened_at )) }} @else Not Available @endif">
                        <p class="description">
                            Stay in touch
                        </p>
                        <input class="form-control mb-4" disabled type="text" name="" id="" placeholder="No reminder set yet">
                    </div>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
        <form action="{{ route('reminder.store', $contact) }}" method="POST">
            {{csrf_field()}}

            @include('alerts.success')

            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                    </div>
                    <div style="margin-top: -2.5px;">
                        <h3>New reminder</h3>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" placeholder="I want to be reminded of . . .">
                </div>

                <div class="mb-3">
                    <label for="happened_at">Choose a date</label>
                    <input type="text" class="form-control{{ $errors->has('reminder_date') ? ' is-invalid' : '' }} datepicker-reminder" name="reminder_date" id="reminder_date" placeholder="Choose a date">
                </div>

                <div class="dropdown mb-3">
                    <label for="frequency_type">Remind me</label>
                    <div class="form-group">
                        <select name="frequency_type" id="frequency_type" class="form-control mb-1">
                            <!-- <option class="dropdown-item">Remind me every</option> -->
                            <option class="dropdown-item" value="once">Once only</option>
                            <option class="dropdown-item" value="recurring">Repeating</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control rounded px-2" value="" name="description" id="description" placeholder="Type your note here (Optional)"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1 d-flex flex-column align-items-center">
        <div class="mt-auto mb-2">
            <button class="btn btn-primary btn-round">Save</button>
        </div>
        <div style="margin-bottom: 3rem">
            <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
        </div>
        </form>
    </div>
</div>
@endsection