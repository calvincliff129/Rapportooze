@extends('layouts.manage')

@section('content')
    <div class="container fc-white">
        <div class="">
            <div class="">
                <h1 class="title">Edit User</h1>
            </div>
            </div>
            <hr class="m-t-0">

            <form action="{{route('users.update', $user->id)}}" method="POST" id="editUserForm">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="card text-white bg-dark">
                    <div class="card-body ms-4">
                        <div class="fieldset">
                            <label for="name" class="form-label mb-2">Name:</label>
                            <p class="w-25">
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                            </p>
                        </div>

                        <div class="field">
                            <label for="email" class="label mb-2">Email:</label>
                            <p class="w-25">
                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                            </p>
                        </div>

                        <div class="field">
                            <label for="password" class="label mb-2">Password:</label>
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
                                <div id="manualPassInput">
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
                        <label for="roles" class="label mt-3">Roles:</label>
                        <input type="hidden" name="roles" :value="rolesSelected" />

                        @foreach ($roles as $role)
                        <div class="field">
                            <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- end of .container -->
            <div class="col">
                <div class="col">
                    <hr />
                    <button class="btn btn-secondary mx-auto" style="width: 250px;">Edit User</button>
                </div>
            </div>
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