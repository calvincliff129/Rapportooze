@extends('layouts.app', ['page' => __('Permissions'), 'pageSlug' => 'permissions'])

@section('content')
  <h3>Create New Permission</h3>
  <hr class="m-t-0">

    <form action="{{route('permissions.store')}}" method="POST">
      {{csrf_field()}}
      <div class="card">
        <div class="card-body">
          <div class="my-3">

            <div class="form-check form-check-radio form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="permission_type" id="permission_type" value="basic" onclick="text(0)" checked>
                Basic Permission
                <span class="form-check-sign"></span>
              </label>
            </div>
            <div class="form-check form-check-radio form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="permission_type" id="permission_type" value="crud" onclick="text(1)">
                CRUD Permission
                <span class="form-check-sign"></span>
              </label>
            </div>
          </div>
          
          <!-- For basic option -->
          <div id="basicPer">
            <div class="mb-3" v-if="permissionType == 'basic'">
              <label for="display_name" class="form-label">Name (Display Name)</label>
              <input type="text" class="form-control" name="display_name" id="display_name">
            </div>

            <div class="mb-3" v-if="permissionType == 'basic'">
              <label for="name" class="form-label">Slug</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="mb-3" v-if="permissionType == 'basic'">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does">
            </div>
          </div>
          

          <!-- For crud option -->
          <div class="collapse" id="crudPer">
            <div class="mb-3" v-if="permissionType == 'crud'">
              <label for="resource" class="form-label">Resource</label>
              <input type="text" class="form-control" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
            </div>
            <div class="row">
              <div class="col-sm-6" v-if="permissionType == 'crud'">
                <div class="form-check form-check-radio">
                    <label class="form-check-label mb-2">
                      <input class="form-check-input" type="radio" name="crudSelected" id="crudSelected" value="create" >
                      Create
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio">
                    <label class="form-check-label mb-2">
                      <input class="form-check-input" type="radio" name="crudSelected" id="crudSelected" value="read" checked>
                      Read
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio">
                    <label class="form-check-label mb-2">
                      <input class="form-check-input" type="radio" name="crudSelected" id="crudSelected" value="update" checked>
                      Update
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio">
                    <label class="form-check-label mb-2">
                      <input class="form-check-input" type="radio" name="crudSelected" id="crudSelected" value="delete" checked>
                      Delete
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                </div>
                <input type="hidden" name="crud_selected" :value="crudSelected">

                <div class="col-sm-4">
                  <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
                    <thead>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Description</th>
                    </thead>
                    <tbody>
                      <tr v-for="item in crudSelected">
                        <td v-text="crudName(item)"></td>
                        <td v-text="crudSlug(item)"></td>
                        <td v-text="crudDescription(item)"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-secondary">Create Permission</button>
    </form>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete']
      },
      methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
      }
    });
  </script>
@endsection