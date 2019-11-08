@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('karyawan') }}" class="active"><i class="fa fa-dashboard"></i> Karyawan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Karyawan</h3>
              @if(session('status'))
                <div style="background-color:green; color:white;font-weight: bold">
                  {{session('status')}}
                </div>
              @endif
            </div>
            <!-- /.box-header -->
          <div class="box-body">
      <table id="example1" class="table table-bordered table-striped" style="overflow-x:auto;">
        <thead>
        <tr>
          <th class="text-center" width="10px">No</th>
          <th class="text-center">Foto</th>
          <th class="text-center">Nama Karyawan</th>
          <th class="text-center">Jabatan</th>
          <th class="text-center" width="100px">Alamat</th>
          <th class="text-center">No. Telpon</th>
          <th class="text-center">Tempat Lahir</th>
          <th class="text-center">Tanggal Lahir</th>
          <th class="text-center">Username</th>
          <th class="text-center">Email</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>
       <tbody>
       @foreach ($karyawans as $key => $k)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>
            <img src="{{ url('images/karyawan/'.$k->foto) }}" style="width: 150px; height: 150px;">
          </td>
          <td>{{ $k->nama }}</td>
          <td>{{ $k->jabatans->nama }}</td>
          <td>{{ $k->alamat }}</td>
          <td>{{ $k->no_tlp }}</td>
          <td>{{ $k->tmpt_lahir }}</td>
          <td>{{ $k->tgl_lahir }}</td>
          <td>{{ $k->users->username }}</td>
          <td>{{ $k->users->email }}</td>
          <td>
            <a class="btn btn-sm btn-success" href="{!! action('KaryawanController@edit',$k->id) !!}"> 
              <i class="fa fa-pencil"></i>
            </a>
            <form action ="{{ route('karyawan.destroy',$k->id) }}" method="post">{{ method_field("DELETE") }} {{ csrf_field() }} 
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