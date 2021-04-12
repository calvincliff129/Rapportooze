@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Create New Role</h1>
    <hr class="mt-0">

    <form action="{{route('roles.store')}}" method="POST">
      {{ csrf_field() }}

      <div class="card text-white bg-dark mb-3">
        <div class="card-body">
          <h2 class="card-title">Role Details:</h1>
          <div class="mb-3">
            <label for="display_name" class="form-label">Name (Human Readable)</label>
            <input type="text" class="form-control" name="display_name" value="{{old('display_name')}}" id="display_name">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Slug (Can not be changed)</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" value="{{old('description')}}" id="description" name="description">
          </div>
          <input type="hidden" :value="permissionsSelected" name="permissions">
        </div>
      </div>

      <div class="card text-white bg-dark mb-3">
        <div class="card-body">
          <h2 class="card-title mb-3">Permissions:</h1>
          <div class="ms-3 row">
            @foreach ($permissions as $permission)
              <div class="form-check mb-2 col-sm-3">
                <input class="form-check-input" type="checkbox" v-model="permissionsSelected" :native-value="{{$permission->id}}" id="rolesCheckCreate">
                <label class="form-check-label" for="rolesCheckCreate">
                  {{$permission->display_name}} <em>({{$permission->description}})</em>
                </label>
              </div>
            @endforeach
              </ul>
          </div>
        </div>
      </div>
      <button class="btn btn-secondary">Create new Role</button>
    </form>
  </div>
@endsection


@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: []
    }
  });
  </script>
@endsection