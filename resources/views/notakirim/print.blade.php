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
                  <tr>
                    <th style="width: 10%;">No. Resi </th>
                    <td>: {{ $notakirims->no_resi }}</td>
                  </tr>                    
                  <tr>
                    <th>Tanggal </th>
                    <td>: {{ $notakirims->tanggal }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Pembayaran </th>
                    @if($notakirims->jenispembayaran == 1)
                    <td>: Lunas</td>
                    @elseif($notakirims->jenispembayaran == 2)
                    <td>: Franco</td>
                    @elseif($notakirims->jenispembayaran == 3)
                    <td>: Loco</td>
                    @endif
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Dari </th>
                        <td>: {{ $notakirims->pelanggans->nama }}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <td>: {{ $notakirims->pelanggans->alamat }}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <td>: {{ $notakirims->pelanggans->no_tlp }}</td>
                      </tr> 
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Tujuan </th>
                        <td>: {{ $notakirims->namapenerima }}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <td>: {{ $notakirims->alamatpenerima }}</td>
                      </tr>
                      <tr>
                        <th></th>
                        <td>: {{ $notakirims->tlppenerima }}</td>
                      </tr> 
                    </table>
                  </div>
                </div>
              </div>
            </div>            
          </address>                
        </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead class="btn-success">
                <tr>
                  <th>No.</th>
                  <th>Jenis Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Berat (kg) </th>
                  <th>Sub Total Berat (kg)</th>
                  <th>Sub Total Biaya</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($detailnota as $key => $d)

               <?php 
               $stharga = $notakirims->tarifkms->harga * $d->jumlah * $d->berat;
               $stberat = $d->jumlah * $d->berat;
               ?>

               <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $d->jenis }}</td>
                <td>{{ $d->barang }}</td>
                <td>{{ $d->jumlah }}</td>
                <td>{{ $d->satuan }}</td>

                @if($d->dimensi == null)
                <td>{{ $d->berat }}</td>
                <td>{{ number_format($stberat, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($stharga, 2, ',', '.') }}</td>
                @else
                <?php
                $dmnsi = $d->dimensi;

                $temp = explode('x', $dmnsi);

                $p=$temp[0];
                $l=$temp[1];
                $t=$temp[2];

                $tberat = $p*$l*$t/4000;

                $dstberat = $d->jumlah*$tberat;
                $dstharga = $notakirims->tarifkms->harga * $dstberat;
                ?>
                <td>{{ $tberat }}</td>
                <td>{{ number_format($dstberat, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($dstharga, 2, ',', '.') }}</td>
                @endif
              </tr>
              @endforeach
              <tr>
                <td align="right" colspan="6">Total :</td>
                <td>{{ number_format($totberat->subtotberat, 0, ',', '.') }} kg</td>
                <td>Rp. {{ number_format($notakirims->biaya_kirim, 2, ',', '.') }}</td>
              </tr>
            </tbody>
          </table>


        </div>
        <div align="right" style="margin-right: 10%;">
            <p style="margin-bottom: 50px;">Penanggung Jawab,</p>
            <p><u>{{ $notakirims->karyawan }}</u></p>
          </div>
      
        <!-- /.col -->
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
