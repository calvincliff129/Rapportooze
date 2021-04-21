@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'manageUsers'])

@section('content')
  <h3>View User Details</h3>
  <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-edit me-1"></i> Edit User</a>
  <hr class="mt-0">

  <div class="card">
    <div class="card-body ms-4">
      <fieldset disabled>
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control w-25" placeholder="{{$user->name}}">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" class="form-control w-25" placeholder="{{$user->email}}">
        </div>

        <div class="mb-3">
          <label for="roles" class="form-label">Roles:</label>
          <ul>
            @forelse ($user->roles as $role)
              <li class="text-muted">{{$role->display_name}} ({{$role->description}})</li>
            @empty
              <p>No role has been assigned to this user yet</p>
            @endforelse
          </ul>
        </div>
      </fieldset>
    </div>
  </div>
@endsection