<!-- Sidebar Menu -->
<ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Show all</a></li>
            <li><a href="#">Create new</a></li>
          </ul>
        </li>
		<li><a href="#"><i class="fa fa-bar-chart"></i> <span>Statistic</span></a></li>
@if(Auth::user()->access_level_id == 1 || Auth::user()->access_level_id == 2)
		<li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Show all</a></li>
            <li><a href="/register">Create new</a></li>
          </ul>
        </li>
@endif
      </ul>
      <!-- /.sidebar-menu -->