@extends('layouts.manage')

@section('content')
    <div class="container">
      <div class="column">
        <div class="column">
          <h1 class="title fc-white">Manage Users</h1>
        </div>
        <div class="col mb-2">
          <a href="#" class="btn btn-secondary justify-content-right"><i class="fa fa-user-plus me-1"></i> Create New User</a>
        </div>
      </div>
        <div class="table-responsive">
          <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>Email</th>
              </tr>
            </thead>
                @foreach ($users as $user)
                    <tr>
                        <th class="text-center">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            <tbody>
            </tbody>
          </table>
        </div>
    </div>
@endsection