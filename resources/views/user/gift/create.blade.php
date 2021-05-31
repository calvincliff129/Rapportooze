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
            <form action="{{route('gift.store', $contact)}}" method="POST">
                {{csrf_field()}}
        
            <div class="card">
                <div class="card-body mt-2">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('contact.show', $contact->id) }}"><i class="fas fa-angle-left fa-2x"></i></a>
                        </div>
                        <div style="margin-top: -2.5px;">
                            <h3>Gift</h3>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name the gift . . .">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="url" id="url" placeholder="Link to gift shopping site (Optional)">
                    </div>

                    <div class="mb-3 d-flex justify-content-center mt-4">
                        <div class="dropdown col-auto d-inline">
                            <select name="currency" id="currency" class="form-control">
                                <!-- <option class="dropdown-item" value="">MYR</option> -->
                                @foreach ($currencies as $currency)
                                    <option class="dropdown-item" value="{{ $currency->iso_code }}">{{ $currency->iso_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="number" step="0.01" class="col-4 form-control d-inline" name="price" id="price" placeholder="Value . . .">
                    </div>

                    <!-- <div class="row mb-3">
                        <div class="col-xl-auto mt-2">
                            <label for="giftPhoto" name="giftPhoto" id="giftPhoto" class="form-label">Upload photo (Optional)</label>
                            <div class="input-file-container">  
                                <input class="input-file" name="giftPhoto" id="giftPhoto" type="file">
                                <label tabindex="0" for="giftPhoto" name="giftPhoto" id="giftPhoto" class="input-file-trigger">Select a file...</label>
                            </div>
                            <p class="file-return"></p>
                        </div>

                        <div class="col-xl mt-2">
                            <label for="price">Price (Optional)</label>
                            <div class="mb-3 d-flex">
                                <div class="dropdown col-sm-auto d-inline" style="max-width: 6.6rem;">
                                    <select name="currency" id="currency" class="form-control">
                                        @foreach ($currencies as $currency)
                                            <option class="dropdown-item" value="{{ $currency->iso_code }}">{{ $currency->iso_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="number" step="0.01" class="card-body col-auto form-control d-inline" name="price" id="price" placeholder="Value . . .">
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="mb-3">
                        <textarea type="text" class="form-control rounded px-2" name="note" id="note" placeholder="Type your notes here (Optional)"></textarea>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-auto d-flex flex-column align-items-center">
                <div class="mb-2 mt-auto">
                    <button class="btn btn-primary btn-round">Add gift</button>
                </div>
                <div style="margin-bottom: 5rem">
                    <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection