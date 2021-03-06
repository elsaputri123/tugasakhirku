@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('barang') }}" class="active"><i class="fa fa-dashboard"></i> Barang</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Barang</h3>
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
          <th class="text-center" width="10px">No</th>
          <th class="text-center">Jenis</th>
          <th class="text-center">Barang</th>
          <th class="text-center">Satuan</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>
       <tbody>
       @foreach ($barang as $key => $b)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $b->jenis->nama }}</td>
          <td>{{ $b->nama }}</td>
          <td>{{ $b->satuan }}</td>
          <td>
            <a class="btn btn-sm btn-success" href="{!! action('BarangController@edit',$b->id) !!}">
            <i class="fa fa-pencil"></i>
            </a>
            <form action ="{{ route('barang.destroy',$b->id) }}" method="post">{{ method_field("DELETE") }} {{ csrf_field() }}  
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