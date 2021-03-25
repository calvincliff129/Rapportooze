<!-- Sidebar Toggle button -->
<button
  class="navbar-toggler"
  type="button"
  data-mdb-toggle="collapse"
  data-mdb-target="#sidebarMenu"
  aria-controls="sidebarMenu"
  aria-expanded="false"
  aria-label="Toggle navigation"
  >
  <i class="fas fa-bars"></i>
</button>

<nav id="sidebarMenu" class="hover-shadow collapse d-lg-block sidebar-admin collapse bg-light">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3 mt-3">
      <a href="{{route('manage.dashboard')}}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
        <i class="fas fa-chart-area fa-fw me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="#" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-users fa-fw me-3"></i>
        <span>Administration</span>
      </a>
      <!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-chart-line fa-fw me-3"></i>
        <span>Content</span>
      </a> -->
    </div>
  </div>
</nav>
<!--   
<nav class="sidenav fc-white" id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('manage.dashboard')}}">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Content
    </p>
    <ul class="menu-list">
    </ul>

    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
    </ul>
  </aside>
</nav>

<button type="button" data-mdb-toggle="sidenav" data-mdb-target="#admin-side-menu">
  Toggle sidenav
</button> -->