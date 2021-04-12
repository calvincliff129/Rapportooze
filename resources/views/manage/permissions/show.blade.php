@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>View Permission Details</h1>
    <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-secondary justify-content-end my-3"><i class="fa fa-edit me-1"></i> Edit Permission</a>
    <hr class="mt-0">

    <div class="card text-white bg-dark">
      <div class="card-body ms-4">
        <p>
          <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
          <br>
          {{$permission->description}}
        </p>
      </div>
    </div>
  </div>
@endsection