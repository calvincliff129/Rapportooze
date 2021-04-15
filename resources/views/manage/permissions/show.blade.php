@extends('layouts.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
    <h3>View Permission Details</h3>
    <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-primary mb-3"><i class="fa fa-edit me-1"></i> Edit Permission</a>
    <hr class="mt-0">

    <div class="card">
      <div class="card-body">
        <p>
          <strong>{{$permission->display_name}}</strong> <em>({{$permission->name}})</em>
          <br>
          {{$permission->description}}
        </p>
      </div>
    </div>
@endsection