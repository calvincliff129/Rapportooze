@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'manageUsers'])

@section('content')
    <h3>Edit User</h3>
    <hr class="mt-0">

    <form action="{{route('users.update', $user->id)}}" method="POST" id="editUserForm">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <div class="card">
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
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="password_options" value="keep" onclick="manualPassInput(0)" checked>
                            Do Not Change Password
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="password_options" value="auto" onclick="manualPassInput(0)">
                            Auto-Generate New Password
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="password_options" value="manual" onclick="manualPassInput(1)">
                            Manually Set New Password
                            <span class="form-check-sign"></span>
                        </label>
                        <div class="collapse mt-2 mx-4" id="manualPassInput">
                            <div class="form-group">
                                <p style="width:250px;">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Manual password">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="roles" class="form-label">Roles:</label>
                <input type="hidden" name="roles" :value="rolesSelected" />

                @foreach ($roles as $role)
                <div class="form-check mb-2 col-sm-3">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="role_id[]" value="{{$role->id}}" @if (count($user->roles->where('id', $role->id))) checked @endif>
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    {{$role->display_name}}
                    </label>
                </div>
                @endforeach
            </div>
        </div> <!-- end of .container -->
        <button class="btn btn-default">Edit User</button>
    </form>
@endsection