@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-user">
            <p class="card-text">
                <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <!-- <div class="block block-three"></div> -->
                </div>
                <div class="row mb-2 d-flex align-items-end justify-content-center">
                    <div class="col-auto mb-1">
                        <a href="{{ route('avatar.select', $contact->id) }}">
                            @if ($contact->avatar == null)
                                <div class="avatar-debt">{!! Avatar::create($contact->first_name)->toSvg(); !!}</div>
                            @else
                                <img class="avatar-debt" src="{{ @$url }}">
                            @endif
                        </a>
                    </div>
                    <div class="col-auto">
                        <h4 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) <p class="fs-italic text-center">({{$contact->nickname}})</p> @else @endif</h4>
                    </div>
                </div>
                <div class="row text-center mb-3">
                    <p class="col description">
                        <i class="border rounded-circle p-2 mx-2 fas fa-dollar-sign"></i>
                        <strong>{{$contact->first_name}}'s life event</strong>
                    </p>
                </div>
            </p>
        </div>
    </div>  
</div>
<hr class="dashed">
<div class="row justify-content-center mt-4">
    <div class="col-md-4">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <p>
                    <strong>Add a life event</strong>
                </p>
                <p class="card-text">
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-info btn-link d-inline" style="font-size: 0.8em;"> 
                        Back
                    </a>
                </p>
            </div>
        </div>
        <hr class="wide" style="margin-top: -0.2rem">
        <form action="{{ route('life-event.store', $contact) }}" method="POST">
            {{csrf_field()}}
        
            <div class="card border border-default bg-transparent">
                <div class="card-body mt-2">
                    <div class="container">
                        <div class="mb-3 row row-md justify-content-md-center">
                            <label for="happened_at col-md-4" style="margin-top: .65rem; padding-right: 1rem;">When was it ?</label>
                            <input type="text" class="form-control{{ $errors->has('happened_at') ? ' is-invalid' : '' }} datepicker-lifeEvent col-md-4" name="happened_at" id="happened_at" placeholder="When did it happened ?">
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <label for="name">Event name</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="What's the title of the life event ? . . .">
                    </div>

                    <div class="mb-3">
                        <label for="note">Story (Optional)</label>
                        <textarea type="text" class="form-control rounded px-2" name="note" id="note" placeholder="What details do you have about this life event ? . . . (Optional)"></textarea>
                    </div>

                </div>
            </div>
            <div class="col-xl-auto d-flex justify-content-center">
                <div class="mb-2 mt-auto">
                    <button class="btn btn-primary btn-round">Add to {{$contact->first_name}}'s timeline</button>
                </div>
                <!-- <div>
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
                </div> -->
            </div>
        </form>
    </div>
</div>
@endsection