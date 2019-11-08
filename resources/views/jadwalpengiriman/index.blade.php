@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jadwal Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('jadwalpengiriman') }}" class="active"><i class="fa fa-dashboard"></i> Jadwal Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title text-center">Data Jadwal Pengiriman</h3>
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
                  <th class="text-center">Kendaraan </th>
                  <th class="text-center">Sopir </th>
                  <th class="text-center">Hari </th>
                  <th class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
                <!--  -->
                @foreach($jadwal as $key => $value)
                <tr>
                  <td class="text-center">
                    {{ $key+1 }}
                  </td>
                  <td class="text-center"> 
                    {{ $value->kendaraans->nama }}
                  </td>
                  <td class="text-center">
                    {{ $value->karyawans->nama }}
                  </td>
                  <td class="text-center">
                    {{ $hari[$value->hari] }}
                  </td>
                  <td class="text-center">
                    <a href="{!! action('JadwalpengirimanController@edit',$value->id) !!}" class="btn btn-success">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action ="{{ route('jadwalpengiriman.destroy', $value->id) }}" method="post">{{ method_field("DELETE") }} {{ csrf_field() }} 
                      <button class="btn btn-danger">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
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