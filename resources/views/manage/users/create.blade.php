@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1 class="title">Create New User</h1>
    <hr class="mt-0">

    <form action="{{route('users.store')}}" method="POST">
      {{csrf_field()}}
      <div class="card text-white bg-dark mb-3">
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
              <div class="collapse" id="passUserInput">
                <input type="text" class="form-control" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
              </div>
              <div class="form-check my-2 col-sm-3">
                <input class="form-check-input" type="checkbox" v-model="auto_password" name="auto_generate" onclick="passUser(0)" checked>
                <label class="form-check-label" for="auto_generate">
                  Auto Generate Password
                </label>
              </div>
          </div>

          <label for="roles" class="form-label">Roles:</label>
          <input type="hidden" name="roles" :value="rolesSelected" />
          @foreach ($roles as $role)
            <div class="form-check mb-2 col-sm-3">
              <input class="form-check-input" type="checkbox" v-model="rolesSelected" :native-value="{{$role->id}}" id="rolesChoice">
              <label class="form-check-label" for="rolesChoice">
                {{$role->display_name}}
              </label>
            </div>
          @endforeach
        </div> <!-- end of .column -->
      </div> <!-- end of .columns for forms -->
      <button class="btn btn-secondary">Create New User</button>
    </form>
  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
        rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
      }
    });
  </script>
@endsection