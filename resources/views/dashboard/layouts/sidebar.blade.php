<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">St</a>
      </div>
      <ul class="sidebar-menu">
     
          <li class={{ Request::is('dashboard')? 'active' : '' }} ><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class={{ Request::is('dashboard/user*')? 'active' : '' }}><a class="nav-link" href="/dashboard/user"><i class="far fa-user"></i> <span>Users</span></a></li>
        <li class={{ Request::is('dashboard/products*')? 'active' : '' }}><a class="nav-link" href="/dashboard/products"><i class="far fa-square"></i> <span>Data Products</span></a></li>
        <li class={{ Request::is('dashboard/members*')? 'active' : '' }}><a class="nav-link" href="/dashboard/members"><i class="far fa-square"></i> <span>Data Members</span></a></li>
        <li class={{ Request::is('dashboard/parameters*')? 'active' : '' }}><a class="nav-link" href="/dashboard/parameters"><i class="far fa-square"></i> <span>Data Parameters</span></a></li>
        
          
       </aside>
  </div>
