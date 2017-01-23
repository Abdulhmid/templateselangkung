  <?php $segment = GLobalHelper::indexUrl(); ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{!!url('/assets/dists/be')!!}/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>
          <a href="{{url('me')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        <li class="{!! $segment == 'users' ? 'active' : '' !!}"><a href="{{url('users')}}"><i class="fa fa-book"></i> <span>Pengguna</span></a></li>
       </li>

        <li class="header">Data Master</li>
        <li class="{!! $segment == 'roles' ? 'active' : '' !!}">
          <a href="{!!url('roles')!!}"><i class="fa fa-circle-o text-red"></i> 
            <span>Grup</span>
          </a>
        </li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Kendaraan</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i> <span>Lokasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/country')}}"><i class="fa fa-circle-o"></i> Negara</a></li>
            <li><a href="{{url('/province')}}"><i class="fa fa-circle-o"></i> Provinsi</a></li>
            <li class="active"><a href="{{url('/city')}}"><i class="fa fa-circle-o"></i> Kota</a></li>
          </ul>
        </li>

        <li class="header">Konfigurasi</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Konfigurasi Umum</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Hak Akses</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>