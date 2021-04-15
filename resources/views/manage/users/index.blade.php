@extends('layouts.app', ['page' => __('Manage Users'), 'pageSlug' => 'manageUsers'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Manage Users</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Create User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Update</th>
                    </tr></thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <th>{{$user->id}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at->toFormattedDateString()}}</td>
                          <td>
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{route('users.show', $user->id)}}">Detail</a>
                                <a class="dropdown-item" href="{{route('users.edit', $user->id)}}">Edit</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      {{$users->links('vendor.pagination.bootstrap-4')}}
    </div>
  </div>
@endsection