@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Manage Users</h1>
    <a href="{{route('users.create')}}" class="btn btn-secondary my-3"><i class="fa fa-user-plus me-1"></i> Create New User</a>
    <hr class="mt-0">

      <div class="table-responsive">
        <table class="table table-dark table-sm table-bordered table-hover table-striped text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                  <tr>
                      <th class="text-center">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at->toFormattedDateString()}}</td>
                      <td class="has-text-right"><a class="btn btn-secondary me-4" href="{{route('users.show', $user->id)}}">View </a><a class="btn btn-light" href="{{route('users.edit', $user->id)}}">Edit</a></td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>

    {{$users->links('vendor.pagination.bootstrap-4')}}
  </div>
@endsection