<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8"> -->
    <span class="brand-text font-weight-light">E-commerce</span>
    
    <select class="form-select changeLang">
      <option value="pt-br" {{ session()->get('locale') == 'pt-br' ? 'selected' : '' }}>Portugês</option>
      <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
    </select>
                        
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('get_users') }}" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              {{ __('admin/sidebar.users') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('get_users') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.users_list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.user_create') }}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-box"></i>
            <p>
              {{ __('admin/sidebar.products') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/users" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.products_list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.product_create') }}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-box"></i>
            <p>
              {{ __('admin/sidebar.categories') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/categories" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.categories_list') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('admin/sidebar.category_create') }}</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>