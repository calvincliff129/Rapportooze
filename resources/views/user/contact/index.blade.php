@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="d-flex justify-content-between card-body">
                <div>
                    <h4 class="card-title"><strong>You have {{ $contactsCount }} Contact(s)</strong><small> ~Listed by alphabetical order~</small></h4>
                </div>
                <div>
                    <a href="{{ route('contact.create') }}" class="btn btn-sm btn-primary">Add Contact</a>
                </div>
            </div>
            <div class="card-body table-card">
                <div class="table-responsive table-hover">
                    <table class="table">
                        <thead>
                            <tr class="text-center alert alert-dismissible">
                                <th style="border: 0;" scope="col">Contact Name</th>
                                <th class="d-sm-none d-md-block d-none" style="border: 0;" scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr class="alert alert-primary">
                                <td class="pull-left" style="">
                                    <a href="{{ route('contact.show', $contact->id) }}">
                                        <div class="img">
                                            @if ($contact->avatar == null)
                                                {!! Avatar::create($contact->first_name)->toSvg(); !!}
                                            @else
                                                <img src="{{ Storage::disk('s3')->temporaryUrl('avatars/'.$contact->avatar, now()->addMinutes(60)) }}" class="border bg-primary border-primary" style="padding: .125rem; width: 55px; height: 55px; float:left; border-radius:35%;">
                                            @endif
                                        </div>
                                        <div class="pl-3 email">
                                            <span>{{$contact->first_name}}&nbsp;{{$contact->middle_name}}&nbsp;{{$contact->last_name}}&nbsp; @if (!empty( $contact->nickname )) ({{$contact->nickname}}) @endif</span>
                                            <span>Added: {{ date('j M Y', strtotime($contact->created_at)) }}</span>
                                        </div>
                                    </a> 
                                </td>
                                <td style="border: 0;">
                                    <a class="d-sm-none d-md-block d-none" href="{{ route('contact.show', $contact->id) }}">
                                        {{$contact->description}}
                                    </a>
                                </td>
                                <!-- <td class="status"><span class="active">Active</span></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
        {{$contacts->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
@endsection