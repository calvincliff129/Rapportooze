@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
    <div class="row">
      <div class="col-8">
        <h4 class="card-title">Manage Roles</h4>
      </div>
      <div class="col-4 text-right">
        <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">Create Role</a>
      </div>
    </div>
    <hr class="mt-0">

    <div class="row justify-content-center">
      @foreach ($roles as $role)
        <div class="col-sm-5">
          <div class="card" style="max-width: 35rem; min-width: 15rem;">
            <div class="card-body">
              <h4 class="card-title">{{$role->display_name}}</h4><hr/>
              <h4 class="card-text"><em>{{$role->name}}</em></h4>
              <p>
                {{$role->description}}
              </p>

              <div class="row mt-3">
                <div class="col-sm-6">
                  <a href="{{route('roles.show', $role->id)}}" class="btn btn-default" style="width: 100%;">Details</a>
                </div>
                <div class="col-sm-6">
                  <a href="{{route('roles.edit', $role->id)}}" class="btn btn-simple text-white" style="width: 100%;">Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection