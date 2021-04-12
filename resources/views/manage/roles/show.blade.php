@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
      <h1>{{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></h1>
      <h5>{{$role->description}}</h5>
      <a href="{{route('roles.edit', $role->id)}}" class="btn btn-secondary my-3"><i class="fa fa-user-plus me-1"></i> Edit this Role</a>
    <hr class="mt-0">

    <div class="card text-white bg-dark">
      <div class="card-body ms-4">
        <h2 class="card-title">Permissions:</h1>
        <ul>
          @foreach ($role->permissions as $r)
            <li>{{$r->display_name}} <em>({{$r->description}})</em></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection