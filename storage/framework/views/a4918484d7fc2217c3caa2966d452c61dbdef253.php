<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();" class="hold-transition skin-bluelight sidebar-mini">

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h3 align="center">CV. Karya Anugerah Ekspedisi</h3>
          <p align="center">Surabaya : Jl. Ruko Sulung Mas blok D-18 Surabaya</p>
          <p align="center">Telp : 0313553566, 085100183035</p>
          <p align="center">Bali : Jl. Mahendrata No. 44</p>
          <p align="center">Telp : 085105122212</p>
          <h2 class="page-header"></h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <div class="col-sm-12 invoice-col">
          <address>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table">
                  <?php $__currentLoopData = $printatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th style="width: 10%;">No. Manifest </th>
                    <td>: <?php echo e($p->nomanifest); ?></td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal </th>
                    <td>: <?php echo e($p->tanggal); ?></td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal berangkat </th>
                    <td>: <?php echo e($p->tglbrgkt); ?></td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal tiba </th>
                    <td>: <?php echo e($p->tgltiba); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
                </table>
              </div>
            </div>         
          </address>                
        </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="btn-success">
                <tr>
                  <th>No.</th>
                  <th>No. Resi</th>
                  <th>Dari</th>
                  <th>Tujuan</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Berat/Dimensi (kg)</th>
                  <th>Sub Total Berat (kg)</th>
                  <th>Sub Total Biaya</th>
                </tr>
              </thead>
              <tbody>
              <?php 

                    $no_resi = "";
                    $status = 0;
                    $jmlh = 0;
                    $no=0;

                  ?>
                 <?php $__currentLoopData = $tabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                 <?php 
                  
                  if ($no_resi!=$t->noresi) {
                    $status = 0;
                    $no = $no +1;
                    foreach ($hitungbaris as $key => $a) 
                    {
                      if($a->no_resi == $t->noresi)
                      {
                          $jmlh = $a->jmlhbarisresi;
                      }
                    }
                  }

                 ?>

                   <?php if($status == 0): ?>
                    <tr>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($no); ?></td>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($t->noresi); ?></td> 
                      <?php 
                        $no_resi = $t->noresi;
                        $status=1;
                      ?>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($t->dari); ?></td>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($t->tujuan); ?></td> 
                      <td><?php echo e($t->namabarang); ?></td>
                      <td class="text-center"><?php echo e($t->jumlah); ?></td>
                      <td class="text-center"><?php echo e($t->satuan); ?></td>
                      <td class="text-center"><?php echo e($t->berat); ?></td>
                      <td class="text-center"><?php echo e($t->totdimensi); ?></td>
                      <td>Rp. <?php echo e(number_format($t->subtotbiaya , 2, ',', '.')); ?></td>
                    </tr>
                    <?php elseif($no_resi == $t->noresi): ?> 
                    <tr>
                      <td><?php echo e($t->namabarang); ?></td>
                      <td class="text-center"><?php echo e($t->jumlah); ?></td>
                      <td class="text-center"><?php echo e($t->satuan); ?></td>
                      <td class="text-center"><?php echo e($t->berat); ?></td>
                      <td class="text-center"><?php echo e($t->totdimensi); ?></td>
                      <td>Rp. <?php echo e(number_format($t->subtotbiaya , 2, ',', '.')); ?></td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php $__currentLoopData = $perhitungan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <td align="right" colspan="9">Total :</td>
                      <td>Rp. <?php echo e(number_format($p2->biaya, 2, ',', '.')); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tr>
            </tbody>
          </table>
            <div class="col-md-12">
             <?php $__currentLoopData = $perhitungan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

             <td>Jumlah (kuantitas) : <?php echo e($p1->kuantitas); ?></td> <br>
             <td>Jumlah (berat) : <?php echo e($p1->totalberat); ?></td>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           </div>
           <div class="col-md-12">
            <?php $__currentLoopData = $perhitungan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <td>Jumlah (resi) : <?php echo e($p2->jmlh); ?></td>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <div class="box-body">
          <div class="row" align="center" >
            <div class="col-sm-12">
              <div class="col-md-4">
                    <p>Penerima,</p><br><br>
                    <p><u><?php echo e($p->penerima); ?></u></p>
              </div>
              <div class="col-md-4">
                    <p>Sopir,</p><br><br>
                    <p><u><?php echo e($p->sopir); ?></u></p>
              </div>
              <div class="col-md-4">
                    <p>Penanggung Jawab,</p><br><br>
                    <p><u><?php echo e($p->pembuat); ?></u></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- jQuery 3 -->
<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
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
</body>
<?php echo $__env->yieldContent('script'); ?>
</html>
