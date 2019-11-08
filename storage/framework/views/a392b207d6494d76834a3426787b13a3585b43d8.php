<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Karya Anugerah Ekspedisi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/morris.js/morris.css')); ?>">

   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/jvectormap/jquery-jvectormap.css')); ?>">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
   <!-- fullCalendar -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/fullcalendar/dist/fullcalendar.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css')); ?>" media="print">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css')); ?>">    



   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Admin</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Karya Anugerah </b> Ekspedisi</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo e(asset('dist/img/avatar2.png')); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo e(Auth::user()->username); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo e(asset('dist/img/avatar2.png')); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo e(Auth::user()->username); ?>

                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Keluar</a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DAFTAR MENU</li>

            <?php if(Route::has('login')): ?>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-file"></i>
                <span>Nota Kirim</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('notakirim')); ?>"><i class="fa fa-list"></i>Daftar Nota Kirim</a></li>
                <li><a href="<?php echo e(url('notakirim/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Nota Kirim</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Manifest</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('manifest')); ?>"><i class="fa fa-list"></i>Daftar Manifest</a></li>
                <li><a href="<?php echo e(url('manifest/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Manifest</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-bars"></i>
                <span>Jadwal Pengiriman</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('jadwalpengiriman')); ?>"><i class="fa fa-list"></i>Daftar Jadwal Pengiriman</a></li>
                <li><a href="<?php echo e(url('jadwalpengiriman/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Jadwal Pengiriman</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa  fa-history"></i>
                <span>History</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('history')); ?>"><i class="fa fa-list"></i>Daftar History</a></li>
                <li><a href="<?php echo e(url('history/create')); ?>"><i class="fa fa-list"></i>Input History</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i>
                <span>Rute</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('rute')); ?>"><i class="fa fa-list"></i>Daftar Rute</a></li>
                <li><a href="<?php echo e(url('rute/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Rute</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa  fa-money"></i>
                <span>Tarif</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('tarif')); ?>"><i class="fa fa-list"></i>Daftar Tarif</a></li>
                <li><a href="<?php echo e(url('tarif/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Tarif</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Jenis</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('jenis')); ?>"><i class="fa fa-list"></i>Daftar Jenis</a></li>
                <li><a href="<?php echo e(url('jenis/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Jenis</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-cubes"></i>
                <span>Barang</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('barang')); ?>"><i class="fa fa-list"></i>Daftar Barang</a></li>
                <li><a href="<?php echo e(url('barang/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Barang</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Jabatan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('jabatan')); ?>"><i class="fa fa-list"></i>Daftar Jabatan</a></li>
                <li><a href="<?php echo e(url('jabatan/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Jabatan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Karyawan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('karyawan')); ?>"><i class="fa fa-list"></i>Daftar Karyawan</a></li>
                <li><a href="<?php echo e(url('karyawan/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Karyawan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-automobile"></i>
                <span>Kendaraan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('kendaraan')); ?>"><i class="fa fa-list"></i>Daftar Kendaraan</a></li>
                <li><a href="<?php echo e(url('kendaraan/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Kendaraan</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Pelanggan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('pelanggan')); ?>"><i class="fa fa-list"></i>Daftar Pelanggan</a></li>
                <li><a href="<?php echo e(url('pelanggan/create')); ?>"><i class="fa fa-plus-square-o"></i>Input Pelanggan</a></li>
              </ul>
            </li>

           
            <?php endif; ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <?php echo $__env->yieldContent('content'); ?>


      <!-- jQuery 3 -->
      <script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/numeral.min.js')); ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
      <!-- Morris.js charts -->
      <script src="<?php echo e(asset('bower_components/raphael/raphael.min.js')); ?>"></script>
      <script src="<?php echo e(asset('bower_components/morris.js/morris.min.js')); ?>"></script>
      <!-- Sparkline -->
      <script src="<?php echo e(asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
      <script src="<?php echo e(asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo e(asset('bower_components/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo e(asset('bower_components/moment/min/moment.min.js')); ?>"></script>
      <script src="<?php echo e(asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo e(asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
      <!-- bootstrap time picker -->
      <script src="<?php echo e(asset('plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo e(asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
      <!-- DataTables -->
      <script src="<?php echo e(asset('bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
      <script src="<?php echo e(asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo e(asset('bower_components/fastclick/lib/fastclick.js')); ?>"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
      <!-- CK Editor -->
      <script src="<?php echo e(asset('bower_components/ckeditor/ckeditor.js')); ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
      <!-- fullCalendar -->
      <script src="<?php echo e(asset('bower_components/moment/moment.js')); ?>"></script>
      <script src="<?php echo e(asset('bower_components/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>

      <!-- Select2 -->
      <script src="<?php echo e(asset('bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>    

    </body>
    <?php echo $__env->yieldContent('script'); ?>
    </html>
