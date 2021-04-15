@extends('layouts.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
  <h3>View Permission Details</h3>
  <hr class="mt-0">

  <form action="{{route('permissions.update', $permission->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}

    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <label for="display_name" class="form-label">Name (Display Name)</label>
          <input type="text" class="form-control" name="display_name" id="display_name" value="{{$permission->display_name}}">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Slug <small>(Cannot be changed)</small></label>
          <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" disabled>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{$permission->description}}">
        </div>
      </div>
    </div>

    <button class="btn btn-secondary">Save Changes</button>
  </form>
@endsection