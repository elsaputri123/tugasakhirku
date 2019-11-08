@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Rute Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('Rute') }}" class="active"><i class="fa fa-dashboard"></i> Rute Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title">Rute Pengiriman</h3>
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
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Nama Rute</th>
                  <td class="text-center">X (longitude)</td>
                  <td class="text-center">Y (latitude)</td>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>@if(isset($value->kecamatan->nama)) {{ $value->kecamatan->nama }} @endif</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->koordinat_x }}</td>
                  <td>{{ $value->koordinat_y }}</td>
                  <td>
                    <a class="btn btn-sm btn-success" href="{!! action('RuteController@edit', $value->id) !!}">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action ="{{ route('rute.destroy', $value->id) }}" method="post">{{ method_field("DELETE") }} {{ csrf_field() }}
                      <button class="btn btn-sm btn-danger">
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