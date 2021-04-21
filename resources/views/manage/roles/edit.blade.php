@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'roles'])

@section('content')
  <h3>Edit {{$role->display_name}}</h3>
  <hr class="mt-0">

  <form action="{{route('roles.update', $role->id)}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="card">
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
        <input type="hidden" value="permissionsSelected" name="permissions">
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h2 class="card-title mb-3">Permissions:</h2>

        @foreach ($permissions as $permission)
          <div class="form-check mb-2 col-sm-3">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}" @if (count($role->permissions->where('id', $permission->id))) checked @endif>
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
              {{$permission->display_name}} <em>{{$permission->description}}</em>
            </label>
          </div>
        @endforeach

      </div>
    </div>
    <button class="btn btn-default">Save Changes to Role</button>
  </form>
@endsection