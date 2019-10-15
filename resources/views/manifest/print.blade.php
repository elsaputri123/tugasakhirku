<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">

  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
  


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
                  @foreach ($printatas as $key => $p)
                  <tr>
                    <th style="width: 10%;">No. Manifest </th>
                    <td>: {{ $p->nomanifest }}</td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal </th>
                    <td>: {{ $p->tanggal }}</td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal berangkat </th>
                    <td>: {{ $p->tglbrgkt }}</td>
                  </tr>
                  <tr>
                    <th style="width: 10%;">Tanggal tiba </th>
                    <td>: {{ $p->tgltiba }}</td>
                  </tr>
                  @endforeach                     
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
                 @foreach ($tabel as $key => $t)

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

                   @if ($status == 0)
                    <tr>
                      <td rowspan="{{$jmlh}}">{{ $no }}</td>
                      <td rowspan="{{$jmlh}}">{{ $t->noresi }}</td> 
                      <?php 
                        $no_resi = $t->noresi;
                        $status=1;
                      ?>
                      <td rowspan="{{$jmlh}}">{{ $t->dari }}</td>
                      <td rowspan="{{$jmlh}}">{{ $t->tujuan }}</td> 
                      <td>{{ $t->namabarang }}</td>
                      <td class="text-center">{{ $t->jumlah }}</td>
                      <td class="text-center">{{ $t->satuan }}</td>
                      <td class="text-center">{{ $t->berat }}</td>
                      <td class="text-center">{{ $t->totdimensi }}</td>
                      <td>Rp. {{ number_format($t->subtotbiaya , 2, ',', '.') }}</td>
                    </tr>
                    @elseif($no_resi == $t->noresi) 
                    <tr>
                      <td>{{ $t->namabarang }}</td>
                      <td class="text-center">{{ $t->jumlah }}</td>
                      <td class="text-center">{{ $t->satuan }}</td>
                      <td class="text-center">{{ $t->berat }}</td>
                      <td class="text-center">{{ $t->totdimensi }}</td>
                      <td>Rp. {{ number_format($t->subtotbiaya , 2, ',', '.') }}</td>
                      </tr>
                    @endif
                  @endforeach
                  <tr>
                    @foreach ($perhitungan2 as $key => $p2)
                      <td align="right" colspan="9">Total :</td>
                      <td>Rp. {{ number_format($p2->biaya, 2, ',', '.') }}</td>
                        @endforeach
                  </tr>
            </tbody>
          </table>
            <div class="col-md-12">
             @foreach ($perhitungan1 as $key => $p1)

             <td>Jumlah (kuantitas) : {{ $p1->kuantitas }}</td> <br>
             <td>Jumlah (berat) : {{ $p1->totalberat }}</td>

             @endforeach

           </div>
           <div class="col-md-12">
            @foreach ($perhitungan2 as $key => $p2)

            <td>Jumlah (resi) : {{ $p2->jmlh }}</td>

            @endforeach
          </div>
        </div>
        <div class="box-body">
          <div class="row" align="center" >
            <div class="col-sm-12">
              <div class="col-md-4">
                    <p>Penerima,</p><br><br>
                    <p><u>{{ $p->penerima }}</u></p>
              </div>
              <div class="col-md-4">
                    <p>Sopir,</p><br><br>
                    <p><u>{{ $p->sopir }}</u></p>
              </div>
              <div class="col-md-4">
                    <p>Penanggung Jawab,</p><br><br>
                    <p><u>{{ $p->pembuat }}</u></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- fullCalendar -->
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
</body>
@yield('script')
</html>
