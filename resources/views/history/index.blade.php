@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      History Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('jadwalpengiriman') }}" class="active"><i class="fa fa-dashboard"></i> History Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title text-center">Data History Pengiriman</h3>
            @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
              
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="10px">No</th>
                  <th class="text-center">Tanggal </th>
                  <th class="text-center">Supir </th>
                  <th class="text-center">Kendaraan </th>
                  <th class="text-center">Status </th>
                  <th class="text-center">Aksi </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->tanggal }}</td>
                  <td>{{ $value->karyawan }}</td>
                  <td>{{ $value->kendaraan." - ".$value->no_polisi }}</td>
                  <td>
                    @if($value->status==0)
                         Belum Dikirim
                    @elseif($value->status==1)
                          Pengiriman Ke Kantor Cabang Tujuan
                    @else
                          Sampai Di Kantor Cabang Tujuan
                    @endif
                  </td>
                  <td>
                    <a href="{!! action('HistoryController@show',$value->id) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>

                    @if($value->status==0)
                    <a href="{!! action('HistoryController@kirim',$value->id) !!}" class="btn btn-sm btn-success">
                      <i class="fa fa-check"></i>
                      Kirim
                    </a>
                    @endif
                    @if($value->status==1)
                    <a href="{!! action('HistoryController@sampai',$value->id) !!}" class="btn btn-sm btn-success">
                      <i class="fa fa-check"></i>
                      Sampai
                    </a> 
                    @endif
                    {{-- <button class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> </button> --}}
                  </td> 
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