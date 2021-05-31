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
                                <a href="{{ route('avatar.select', $contact->id) }}">
                                    @if ($contact->avatar == null)
                                        <div class="avatar">{!! Avatar::create($contact->first_name)->setFontSize(50)->setBorder(0, '#fff', 60)->setDimension(114)->toSvg(); !!}</div>
                                    @else
                                        <img class="avatar" src="{{ @$url }}">
                                    @endif
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
            <form action="{{ route('activity.update', [$contact->id, $activity->id]) }}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}
        
            <div class="card">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                        </div>
                        <div style="margin-top: -2.5px;">
                            <h3>Update activity</h3>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="summary">Activity name</label>
                        <input type="text" class="form-control" value="{{ $activity->summary }}" name="summary" id="summary" placeholder="What exciting activity have you done together?">
                    </div>

                    <div class="row">
                        <div class="col mt-2 mb-3" id="">
                            <label for="happened_at">Activity date</label>
                            <input type="text" class="form-control datepicker" value="@if (!empty( $activity->happened_at )) {{ date('j F Y', strtotime( $activity->happened_at )) }} @endif" name="happened_at" placeholder="When was it?">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="detail">Story</label>
                        <textarea type="text" class="form-control rounded px-2" value="{{ $activity->detail }}" name="detail" id="detail" placeholder="Write your thoughts on the activty (Optional)">{{ $activity->detail }}</textarea>
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