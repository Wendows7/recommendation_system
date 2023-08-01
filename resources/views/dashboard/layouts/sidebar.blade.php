<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/dashboard">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/dashboard">St</a>
      </div>
      <ul class="sidebar-menu">
        @can("admin")
          <li class={{ Request::is('dashboard')? 'active' : '' }} ><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class={{ Request::is('user*')? 'active' : '' }}><a class="nav-link" href="/user"><i class="far fa-user"></i> <span>Users</span></a></li>
          <li class="dropdown {{ Request::is('dashboard/*')? 'active' : '' }}">
            <a href="" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Data</span></a>
            <ul class="dropdown-menu">
        <li class={{ Request::is('dashboard/products*')? 'active' : '' }}><a class="nav-link" href="/dashboard/products"><i class="far fa-square"></i> <span>Data Products</span></a></li>
        {{-- <li class={{ Request::is('dashboard/members*')? 'active' : '' }}><a class="nav-link" href="/dashboard/members"><i class="far fa-square"></i> <span>Data Members</span></a></li> --}}
        <li class={{ Request::is('dashboard/parameters*')? 'active' : '' }}><a class="nav-link" href="/dashboard/parameters"><i class="far fa-square"></i> <span>Data Parameters</span></a></li>
        <li class={{ Request::is('dashboard/ratings*')? 'active' : '' }}><a class="nav-link" href="/dashboard/ratings"><i class="far fa-square"></i> <span>Data Ratings</span></a></li>
        @endcan
        @can("user")
        <li class={{ Request::is('dashboard')? 'active' : '' }} ><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class={{ Request::is('dashboard/product_user*')? 'active' : '' }}><a class="nav-link" href="/dashboard/product_user"><i class="far fa-user"></i> <span>Products</span></a></li>
        <li class={{ Request::is('dashboard/recommend_product*')? 'active' : '' }}><a class="nav-link" href="/dashboard/recommend_product"><i class="far fa-user"></i> <span>Recommend Product</span></a></li>
       
      @endcan
      </ul>
      
          
       </aside>
  </div>
