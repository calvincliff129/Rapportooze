@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
  <h3>Create New Role</h3>
  <hr class="mt-0">

  <form action="{{route('roles.store')}}" method="POST">
    {{ csrf_field() }}

    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Role Details:</h3>
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

    <div class="card">
      <div class="card-body">
        <h3 class="card-title mb-3">Permissions:</h3>
        @foreach ($permissions as $permission)
          <div class="form-check mb-2">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" value="{{$permission->id}}">
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
              {{$permission->display_name}} <em>{{$permission->description}}</em>
            </label>
          </div>
        @endforeach
      </div>
    </div>
    <button class="btn btn-secondary">Create new Role</button>
  </form>
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