@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('karyawan/create') }}" class="active"><i class="fa fa-dashboard"></i> Tambah Data Karyawan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(session('status'))
                <div style="background-color:green; color:white;font-weight: bold">
                  {{session('status')}}
                </div>
            @endif
            @foreach ($errors ->all() as $error)
              <h4 style="color: red">{{ $error }}</h4>
            @endforeach
            <form role="form" action="{{ url('karyawan') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label>Foto</label>
                  <input style="width: 30%;" type="file" name="foto" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input style="width: 30%;" type="text" name="nama" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <select style="width: 30%;" name="jabatan" id="jabatan" class="form-control" required>
                    <option value="" selected="">Pilih Jabatan </option>
                    @foreach ($jabatans as $key => $j)
                    <option value="{{$j->id}}">{{$j->nama}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input style="width: 30%;" type="text" name="alamat" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>No. Telp</label>
                  <input style="width: 30%;" type="text" name="notlp" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input style="width: 30%;" type="text" name="tmptlahir" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input style="width: 30%;" type="date" name="tgllahir" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input style="width: 30%;" type="text" name="username" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                  <div class="form-group">
                  <label>Password</label>
                  <input style="width: 30%;" type="password" name="password" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input style="width: 30%;" type="text" name="email" class="form-control" required>
                  <p class="help-block"></p>
                </div>
              <!-- /.box-body -->

                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                </div>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>
@endsection
@endsection