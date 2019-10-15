@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Manifest
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('manifest.edit') }}" class="active"><i class="fa fa-dashboard"></i> Edit Data Manifest</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Manifest</h3>
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

            <form role="form" action="{{ route('manifest.update', $karyawans->id) }}" method="POST" enctype="multipart/form-data">
              {{ method_field("PUT") }} 
			        {{ csrf_field() }} 
              <div class="box-body">
                <div class="form-group">
                  <label>Tanggal Manifest</label>
                  <input style="width: 30%;" type="text" name="tglmanifest" class="form-control" value="{{ $manifests->tanggal }}"/>
                </div>

				        <div class="form-group">
                  <label>No. Manifest</label>
                  <input readonly="" style="width: 30%;" type="file" name="foto" class="form-control" value="{{ $manifests->no_manifest }}"/>
                </div>

                <div class="form-group">
                  <label>Sopir</label>
                  <input readonly="" style="width: 30%;" type="text" name="sopir" class="form-control" value="{{ $manifests->no_manifest }}"/>
                </div>

                <div class="form-group">
                  <label>Tanggal Berangkat</label>
                  <input style="width: 30%;" type="date" name="tglbrgkt" class="form-control" value="{{ $manifests->tglbrgkt }}"/>
                </div>

                <div class="form-group">
                  <label>Tanggal Tiba</label>
                  <input style="width: 30%;" type="date" name="tgltiba" class="form-control" value="{{ $manifests->tgltiba }}"/>
                </div>
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