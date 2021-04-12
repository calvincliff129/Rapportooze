@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Manage Roles</h1>
    <a href="{{route('roles.create')}}" class="btn btn-secondary my-3"><i class="fa fa-user-plus me-1"></i> Create New Role</a>
    <hr class="mt-0">

    <div class="row">
      @foreach ($roles as $role)
        <div class="col-sm-3">
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-body">
              <h4 class="card-title">{{$role->display_name}}</h4><hr>
              <h4 class="card-text"><em>{{$role->name}}</em></h4>
              <p>
                {{$role->description}}
              </p>

              <div class="row">
                <div class="col">
                  <a href="{{route('roles.show', $role->id)}}" class="btn btn-secondary" style="width: 100%;">Details</a>
                </div>
                <div class="col">
                  <a href="{{route('roles.edit', $role->id)}}" class="btn btn-light" style="width: 100%;">Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection