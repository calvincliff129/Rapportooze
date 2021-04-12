@extends('layouts.manage')

@section('content')
  <div class="container fc-white">
    <h1>Create New Permission</h1>
    <hr class="m-t-0">

      <form action="{{route('permissions.store')}}" method="POST">
        {{csrf_field()}}
        <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <div class="my-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="permission_type" id="permissionType" native-value="basic" onclick="text(0)" checked>
                <label class="form-check-label" for="permissionType">
                  Basic Permission
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="permission_type" id="permissionType" native-value="crud" onclick="text(1)">
                <label class="form-check-label" for="permissionType">
                  CRUD Permission
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

              <div class="columns" v-if="permissionType == 'crud'">
                <div class="column is-one-quarter">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" v-model="crudSelected" :native-value="create" id="crudSelected">
                      <label class="form-check-label" for="crudSelected">
                        Create
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" v-model="crudSelected" :native-value="read" id="crudSelected">
                      <label class="form-check-label" for="crudSelected">
                        Read
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" v-model="crudSelected" :native-value="update" id="crudSelected">
                      <label class="form-check-label" for="crudSelected">
                        Update
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" v-model="crudSelected" :native-value="delete" id="crudSelected">
                      <label class="form-check-label" for="crudSelected">
                        Delete
                      </label>
                    </div>
                </div>
                <input type="hidden" name="crud_selected" :value="crudSelected">

                <div class="column">
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

        <button class="btn btn-secondary">Create Permission</button>
      </form>
  </div>
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