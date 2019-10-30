@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail History Pengiriman 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('jadwalpengiriman') }}" class="active"><i class="fa fa-dashboard"></i>Detail History Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title text-center">Data Detail History Pengiriman</h3>
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
                  <th class="text-center">No</th>
                  <th class="text-center">Kode Manifest </th>
                  <th class="text-center">Tanggal Manifest </th>
                  <th class="text-center">Daftar Resi  </th>
                  <th class="text-center">Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->manifest->no_manifest }}</td>
                  <td>{{ $value->manifest->tanggal }}</td>
                  <td style="padding-left: 20px">
                    @foreach($value->manifest->notakirims as $key1 => $val )
                    {{ " - ".$val->no_resi }} <br>
                    @endforeach
                  </td>
                  <td class="text-center">
                      {{-- <a href="{{ url("history/destroydetail/".$value->id) }}" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> </a> --}}
                  </td>
                </tr>
                @endforeach

                <tr>
                 <form method="POST" action="{{ url("history/detail") }}" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <input type="hidden" name="iddetail">
                  <input type="hidden" name="historypengiriman_id" value="{{ isset($idhistory) ? $idhistory:null }}">
                  <td></td>
                  <td>
                    <input type="text" name="manifest" id="manifest" class="form-control" placeholder="Masukan Kode Manifest ..">
                    <input type="hidden" name="manifest_id" id="manifest_id">
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <button class="btn bnt-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                  </td>
                </form>
              </tr>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
  $('#hapus').click(function(){
    return confirm("Anda yakin untuk menghapus data ini?");
  });
</script>

<script>
  // $(function () {
  //   $('#example1').DataTable({
  //     'paging'      : true,
  //     'lengthChange': true,
  //     'searching'   : true,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : true
  //   })

  // })

  $('#manifest').autocomplete({
    source:'{!!URL::route('autocomplete')!!}',
    minlength:1,
    autoFocus:true,
    select:function(e,ui)
    { 
      $('#manifest').val(ui.item.value);
      $('#manifest_id').val(ui.item.id);
    }
  });

</script>
@endsection
@endsection