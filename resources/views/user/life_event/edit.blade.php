@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="d-flex justify-content-lg-center">
    <div class="col" style="max-width: 45rem;">
        <div class="card card-user">
            <p class="card-text">
                <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <!-- <div class="block block-three"></div> -->
                </div>
                <div class="row mb-2 d-flex align-items-end justify-content-center">
                    <div class="col-auto mb-1">
                        <a href="#">
                            <img class="avatar-debt" src="{{ asset('black') }}/img/anime3.png" alt="">
                        </a>
                    </div>
                    <div class="col-auto">
                        <h2 class="title">{{$contact->first_name}} {{$contact->middle_name}} {{$contact->last_name}} @if(!empty($contact->nickname)) ({{$contact->nickname}}) @else @endif</h2>
                    </div>
                </div>
                <div class="row text-center mb-3">
                    <p class="col description">
                        <i class="border rounded-circle p-2 mx-2 fas fa-dollar-sign"></i>
                        <strong>Life event</strong>
                    </p>
                </div>
            </p>
        </div>
    </div>  
</div>
<hr class="dashed">
<div class="container card bg-transparent mt-4" style="max-width: 38rem; min-width: 29rem;">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <p>
                <strong>Update life event</strong>
            </p>
            <p class="card-text">
                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-info btn-link d-inline" style="font-size: 0.8em;"> 
                    Back
                </a>
            </p>
        </div>
    </div>
    <hr class="wide" style="margin-top: -0.2rem">
    <form action="{{ route('life-event.update', [$contact->id, $lifeEvent->id]) }}" method="POST">
    {{method_field('PUT')}}
    {{csrf_field()}}

        <div class="card border border-default bg-transparent">
            <div class="card-body mt-2">

                <div class="container">
                    <div class="mb-3 row row-md justify-content-md-center">
                        <label for="happened_at col-md-4" style="margin-top: .65rem; padding-right: 1rem;">When was it ?</label>
                        <input type="text" class="form-control datepicker-lifeEvent col-md-4" value="@if (!empty( $lifeEvent->happened_at )) {{ date('j F Y', strtotime( $lifeEvent->happened_at )) }} @endif" name="happened_at" id="happened_at" placeholder="When did it happened ?">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name">Event name</label>
                    <input type="text" class="form-control" value="{{ $lifeEvent->name}}" name="name" id="name" placeholder="What's the title of the life event ? . . .">
                </div>

                <div class="mb-3">
                    <label for="happened_at">Story (Optional)</label>
                    <textarea type="text" class="form-control rounded px-2" value="{{ $lifeEvent->note}}" name="note" id="note" placeholder="What details do you have about this life event ? . . . (Optional)">{{ $lifeEvent->note}}</textarea>
                </div>

            </div>
        </div>
        
        <div class="col-xl-auto d-flex align-items-center">
            <div class="mb-2 mt-auto">
                <button class="btn btn-primary btn-round">Update life event</button>
            </div>
            <!-- <div>
                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
            </div> -->
        </div>
    </form>
</div>
@endsection