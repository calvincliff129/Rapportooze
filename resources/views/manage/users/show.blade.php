@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <div class="">
      <div class="">
        <h1 class="title">View User Details</h1>
      </div> <!-- end of column -->

      <div class="col">
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-secondary justify-content-end my-3"><i class="fa fa-user me-1"></i> Edit User</a>
      </div>
    </div>
    <hr class="mt-0">

    <div class="card text-white bg-dark">
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
            <label for="email" class="form-label">Roles:</label>
              @forelse ($user->roles as $role)
                <input type="text" class="form-control w-25" placeholder="{{$role->display_name}} ({{$role->description}})">
              @empty
                <p>No role has been assigned to this user yet</p>
              @endforelse
          </div>
        </fieldset>
      </div>
    </div>
  </div>
@endsection