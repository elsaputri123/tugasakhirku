@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nota Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('notakirim') }}" class="active"><i class="fa fa-dashboard"></i> Nota Kirim</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Nota Kirim</h3>
              @if(session('status'))
                <div style="background-color:green; color:white;font-weight: bold">
                  {{session('status')}}
                </div>
              @endif
            </div>
            <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th class="text-center">No. </th>
                <th class="text-center">Tanggal Nota</th>
                <th class="text-center">No. Resi</th>
                <th class="text-center">Dari</th>
                <th class="text-center">Tujuan</th>
                <th class="text-center">Biaya Kirim</th>
                <th class="text-center">Jarak (KM)</th>
                <th class="text-center"> Status </th>
                <th class="text-center">Detail</th>
              </tr>
              </thead>
             <tbody>
             @foreach ($notakirim as $key => $n)
              <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center">{{ $n->tanggal }}</td>
                <td class="text-center">{{ $n->no_resi}}</td>
                <td>{{ $n->pelanggans->nama }}</td>
                <td>{{ $n->alamatpenerima }}</td>
                <td>Rp. {{ number_format($n->biaya_kirim, 2, ',', '.') }}</td>
                <td class="text-center">{{ $n->jarak}}</td>
                <td>
                  @if($n->status==1)
                      Barang Masuk
                  @elseif($n->status==2)
                      Barang Dikemas
                  @elseif($n->status==3)
                      Barang Dikirim Ke Kantor Bali
                  @elseif($n->status==4)
                      Barang Sampai Di Kantor Bali
                  @elseif($n->status==5)
                      Barang Dibawa Kurir
                  @elseif($n->status==6)
                      Barang Menuju Ke Alamat Penerima
                  @else
                      Barang Diterima
                  @endif
                </td>
                <td><a class="btn btn-success" href="{!! action('NotakirimController@detail',$n->id) !!}"><i class="fa fa-eye"></i></a></td> 
              </tr>
             @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="{{ url('/') }}">CV. Karya Anugerah Ekspedisi</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
@section('script')
<script type="text/javascript">
    $('#hapus').click(function(){
        return confirm("Anda yakin untuk menghapus data ini?");
    });
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>
@endsection
@endsection