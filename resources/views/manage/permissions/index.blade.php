@extends('layouts.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Manage Permissions</h4>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="{{route('permissions.create')}}" class="btn btn-sm btn-primary">Create Permission</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th scope="col">Name</th>
                        <th scope="col">Name/Code</th>
                        <th scope="col">Description</th>
                        <th scope="col">Update</th>
                    </tr></thead>
                    <tbody>
                      @foreach ($permissions as $permission)
                        <tr>
                          <th>{{$permission->display_name}}</th>
                          <td>{{$permission->name}}</td>
                          <td>{{$permission->description}}</td>
                          <td>
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{route('permissions.show', $permission->id)}}">Detail</a>
                                <a class="dropdown-item" href="{{route('permissions.edit', $permission->id)}}">Edit</a>
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
      {{$permissions->links('vendor.pagination.bootstrap-4')}}
    </div>
  </div>
@endsection