<div class="row" id="body-row">
  <!-- Sidebar -->
  <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
    <!-- Bootstrap List Group -->
    <ul class="list-group">
      <!-- Collapser -->
      <a href="#" data-toggle="sidebar-colapse" class="list-group-item sidebar-separator-title text-muted d-flex" style="margin-left: 2px;">
        <div class="d-flex w-100 justify-content-start align-items-center">
          <span id="collapse-icon" class="fa me-4"></span>
          <span id="collapse-text" class="menu-collapsed">Administration</span>
        </div>
      </a>
      <!-- Menu with submenu -->
      <li>
        <a href="{{route('manage.dashboard')}}" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
          <div class="w-100 justify-content-start align-items-center">
            <span class="fa fa-dashboard fa-fw me-3"></span> 
            <span class="menu-collapsed">Dashboard</span>
          </div>
        </a>
      </li>
      <li>
        <a href="{{route('users.index')}}" class="bg-dark list-group-item list-group-item-action">
          <div class="w-100 justify-content-start align-items-center">
            <span class="fa fa-tasks fa-fw me-3"></span>
            <span class="menu-collapsed">Manage Users</span>
          </div>
        </a>
      </li>
      <li>
        <a class="bg-dark list-group-item list-group-item-action">
          <div class="w-100 justify-content-start align-items-center">
            <span class="fa fa-sitemap fa-fw me-3"></span>
            <span class="menu-collapsed">Access Control</span>
          </div>
        </a> 
        <ul class="ms-4 fc-white">
            <li><a href="{{route('roles.index')}}" class="bg-dark list-group-item list-group-item-action">Roles</a></li>
            <li><a href="{{route('permissions.index')}}" class="bg-dark list-group-item list-group-item-action">Permissions</a></li>
        </ul>
      </li>
    </ul><!-- List Group END-->
  </div><!-- sidebar-container END -->
</div>