@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
  <h3>{{$role->display_name}}<small><em>({{$role->name}})</em></small></h3>
  <h5>{{$role->description}}</h5>
  <a href="{{route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-edit me-1"></i> Edit this Role</a>
  <hr class="mt-0">

  <div class="card">
    <div class="card-body">
      <h2 class="card-title">Permissions:</h1>
      <ul>
        @foreach ($role->permissions as $r)
          <li>{{$r->display_name}} <em>({{$r->description}})</em></li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection