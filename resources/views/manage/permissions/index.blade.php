@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Manage Permissions</h1>
    <a href="{{route('permissions.create')}}" class="btn btn-secondary my-3"><i class="fa fa-user-plus me-1"></i> Create New Permission</a>
    <hr class="mt-0">

    <div class="table-responsive">
      <table class="table table-dark table-sm table-bordered table-hover table-striped text-center">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Update</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($permissions as $permission)
            <tr>
              <th>{{$permission->display_name}}</th>
              <td>{{$permission->name}}</td>
              <td>{{$permission->description}}</td>
              <td class="has-text-right"><a class="btn btn-secondary me-4" href="{{route('permissions.show', $permission->id)}}">View</a><a class="btn btn-light" href="{{route('permissions.edit', $permission->id)}}">Edit</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{$permissions->links('vendor.pagination.bootstrap-4')}}
  </div>
@endsection