@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kendaraan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('kendaraan') }}" class="active"><i class="fa fa-dashboard"></i> Kendaraan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Kendaraan</h3>
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
          <th>No</th>
          <th>Kendaraan</th>
          <th>No. Polisi</th>
          <th>Kapasitas (kg)</th>
          <th>Ubah</th>
          <th>Hapus</th>
        </tr>
        </thead>
       <tbody>
       @foreach ($kendaraan as $key => $k)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $k->nama }}</td>
          <td>{{ $k->no_polisi }}</td>
          <td>{{ number_format($k->kapasitas, 0, ',', '.') }}</td>
          <td>
            <a class="btn btn-success" href="{!! action('KendaraanController@edit',$k->id) !!}">Ubah</a>
          </td>
          <td>
            <form action ="{{ route('kendaraan.destroy',$k->id) }}" method="post">{{ method_field("DELETE") }} {{ csrf_field() }} <input type="submit" value="hapus" name="submit" class="btn btn-success"> </form>
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