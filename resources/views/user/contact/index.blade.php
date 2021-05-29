@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="container card">
            <div class="d-flex flex-row justify-content-between card-body">
                <div>
                    <h4 class="card-title"><strong>You have {{ $contactsCount }} Contact(s)</strong><small> ~Listed by alphabetical order~</small></h4>
                </div>
                <div>
                    <a href="{{ route('contact.create') }}" class="btn btn-sm btn-primary">Add Contact</a>
                </div>
            </div>
            <div class="card-body table-card">
                <div class="table-responsive-xl table-hover">
                    <table class="table">
                        <thead>
                            <tr class="text-center alert alert-dismissible">
                                <th style="border: 0; width: 40%;" scope="col">Contact Name</th>
                                <th style="border: 0;" scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($contacts as $contact)
                            <tr class="alert alert-primary">
                                <td class="d-flex align-items-center" style="border: 0; border-radius: 5rem;">
                                    <a href="{{ route('contact.show', $contact->id) }}">
                                        <div class="img" style="min-width: 70px">
                                            @if ($contact->avatar == null)
                                                {!! Avatar::create($contact->first_name)->toSvg(); !!}
                                            @else
                                                <img url="/uploads/avatars/{{ $contact->avatar }}" class="border bg-primary border-primary" style="padding: .125rem; width: 55px; height: 55px; float:left; border-radius:35%;">
                                            @endif
                                        </div>
                                        <div class="pl-3 email">
                                            <span>{{$contact->first_name}}&nbsp;{{$contact->middle_name}}&nbsp;{{$contact->last_name}}&nbsp; @if (!empty( $contact->nickname )) ({{$contact->nickname}}) @endif</span>
                                            <span>Added: {{ date('j M Y', strtotime($contact->created_at)) }}</span>
                                        </div>
                                    </a> 
                                </td>
                                <td style="border: 0;">
                                    <a href="{{ route('contact.show', $contact->id) }}">
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