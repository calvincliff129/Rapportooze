@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'manageUsers'])

@section('content')
  <h3 class="title">Create New User</h3>
  <hr class="mt-0">

  <form action="{{route('users.store')}}" method="POST">
    {{csrf_field()}}
    <div class="card">
      <div class="card-body">
        <div class="my-3">
          <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="my-3">
          <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="my-3">
          <label for="password" class="form-label">Password</label>
            <div class="manualPass collapse" id="passUserInput">
              <input type="text" class="form-control" name="password" id="password" placeholder="Manually give a password to this user">
            </div>

            <div class="form-check mb-2 col-sm-3">
              <label class="form-check-label">
                <input class="form-check-input" name="auto_generate" id="auto_password" type="checkbox" value="autoPass" checked>
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                Auto Generate Password
              </label>
            </div>
        </div>

        <label for="roles" class="form-label">Roles:</label>
        <input type="hidden" name="roles" :value="rolesSelected" />
        @foreach ($roles as $role)
          <div class="form-check mb-2 col-sm-3">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}">
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
              {{$role->display_name}}
            </label>
          </div>

          <!-- <div class="form-check mb-2 col-sm-3">
            <input class="form-check-input" type="checkbox" v-model="rolesSelected" :native-value="{{$role->id}}" id="rolesChoice">
            <label class="form-check-label" for="rolesChoice">
              {{$role->display_name}}
            </label>
          </div> -->
        @endforeach
      </div> <!-- end of .column -->
    </div> <!-- end of .columns for forms -->
    <button class="btn btn-secondary">Create New User</button>
  </form>
@endsection