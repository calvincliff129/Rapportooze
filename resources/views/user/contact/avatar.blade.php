@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<hr class="dashed">
<div class="container mt-5" style="max-width: 70rem;">
    <div class="row gx-4">
        <div class="col-xl">
            <div class="card text-white">
                <div class="card-body">
                    <!-- <div class="text-center title mb-4">
                        <p for="activity">Update contact's extra info section.</</p>
                    </div> -->
                    
                    <form enctype="multipart/form-data" action="{{ route('avatar.update', $contact->id) }}" method="POST" files="true">
                    
                        <div class="card bg-dark">
                            <div class="card-header title text-center">
                                <h4>Contact details (Optional)</h4>
                            </div>
                            <hr class="bold">
                            <div class="card-body row text-center d-flex align-items-center">
                                <div class="col-xl-4 d-flex justify-content-center mb-4 mt-3" style="min-width: 300px">
                                    @if ($contact->avatar == null)
                                        <div>{!! Avatar::create($contact->first_name)->setFontSize(70)->setBorder(0, '#fff', 30)->setDimension(250)->toSvg(); !!}</div>
                                    @else
                                        <img src="{{ $url }}" style="width: 250px; height: 250px; border-radius:15%;">
                                    @endif
                                </div>
                                
                                <div class="col-xl mb-5">
                                    <h2 class="text-center">{{ $contact->first_name }}'s profile picture</h2>
                                    <label for="avatar" name="avatar" id="avatar" class="custom-file-upload">
                                        <!-- <span id="file-selected"></span> -->
                                        Upload avatar image
                                    </label>
                                    <input type="file" style="width: 10rem" name="avatar" id="avatar" onchange="showname()" />
                                    <!-- <input id="file-upload" type="file" /> -->
                                    <!-- <div class="d-flex align-items-center">  
                                        <input class="file" name="avatar" id="avatar" type="file">
                                        <label tabindex="0" for="avatar" class="input-file-avatar">Upload</label>
                                    </div> -->
                                    <p class="">Max size: 2MB</p>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg mx-auto">
                                    <div class="mb-2">
                                        <button class="btn btn-success btn-round">Set avatar</button>
                                    </div>
                                    <div>
                                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-default btn-round">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if ($contact->avatar != null)
                        <form action="{{ route('avatar.remove', $contact->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-warning btn-link pull-right" style="font-size: 12px;">Remove avatar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection