@extends('layouts.manage')

@section('content')
    <div class="container fc-white">
        <h1>Edit User</h1>
        <hr class="mt-0">

        <form action="{{route('users.update', $user->id)}}" method="POST" id="editUserForm">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <div class="my-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    </div>

                    <div class="my-3">
                        <label for="email" class="label">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                    </div>

                    <div class="my-3">
                        <label for="password" class="label">Password:</label>
                        <!-- <b-radio-group v-model="password_options"> -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="password_options" value="keep">
                            <label class="form-check-label">
                                Do Not Change Password
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="password_options" value="auto">
                            <label class="form-check-label">
                                Auto-Generate New Password
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="password_options" value="manual" id="manualPass">
                            <label class="form-check-label">
                                Manually Set New Password
                            </label>
                            <div class="collapse mt-2" id="manualPassInput">
                                <div class="form-group">
                                    <p class="w-20">
                                        <input type="text" class="form-control" name="password" id="password" if="password_options == 'manual'" placeholder="Manual password">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- radio buttons -->
                    </div>

                    <div class="col">
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
                    </div>
                </div>
            </div> <!-- end of .container -->
            <button class="btn btn-secondary mx-auto" style="width: 250px;">Edit User</button>
        </form>
    </div>
    
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });
  </script>
@endsection