@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('pelanggan.edit') }}" class="active"><i class="fa fa-dashboard"></i> Edit Data Pelanggan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pelanggan</h3>
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

            <form role="form" action="{{ route('pelanggan.update', $pelanggans->id) }}" method="POST" enctype="multipart/form-data">
              {{ method_field("PUT") }} 
			        {{ csrf_field() }} 
              <div class="box-body">
				        <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input type="text" name="nama" class="form-control" value="{{ $pelanggans->nama }}"/>
                </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="{{ $pelanggans->alamat }}"/>
                </div>
                 <div class="form-group">
                  <label>No. Tlp</label>
                  <input type="number" name="notlp" class="form-control" value="{{ $pelanggans->no_tlp }}"/>
                </div>
              <!-- /.box-body -->

              <div class="row pull-right">
                <div class="col-md-12">
                  <div class="form-group">
                   <button class="btn btn-success btn-md" type="submit">Simpan</button>
                 </div>
               </div>
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