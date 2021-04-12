@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Edit {{$role->display_name}}</h1>
    <hr class="mt-0">

    <form action="{{route('roles.update', $role->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="card text-white bg-dark mb-3">
        <div class="card-body">
          <h2 class="card-title">Role Details:</h1>
          <div class="mb-3">
            <label for="display_name" class="form-label">Name (Human Readable)</label>
            <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}" id="display_name">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Slug (Can not be edited)</label>
            <input type="text" class="form-control" name="name" value="{{$role->name}}" disabled id="name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" value="{{$role->description}}" id="description" name="description">
          </div>
          <input type="hidden" :value="permissionsSelected" name="permissions">
        </div>
      </div>

      <div class="card text-white bg-dark mb-3">
        <div class="card-body">
          <h2 class="card-title mb-3">Permissions:</h2>
          <div class="ms-3 row">
            @foreach ($permissions as $permission)
              <div class="form-check mb-2 col-sm-3">
                <input class="form-check-input" type="checkbox" v-model="permissionsSelected" :native-value="{{$permission->id}}" id="rolesCheck">
                <label class="form-check-label" for="rolesCheck">
                  {{$permission->display_name}} <em>({{$permission->description}})</em>
                </label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <button class="btn btn-secondary">Save Changes to Role</button>
    </form>
  </div>
@endsection


@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: {!!$role->permissions->pluck('id')!!}
    }
  });
  </script>
@endsection