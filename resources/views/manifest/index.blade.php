@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manifest
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('manifest') }}" class="active"><i class="fa fa-dashboard"></i> Manifest</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title">Data Manifest</h3>
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
                  <th class="text-center">No. </th>
                  <th class="text-center">Tanggal Manifest</th>
                  <th class="text-center">No. Manifest</th>
                  <th class="text-center">Sopir</th>
                  <th class="text-center">Tanggal tiba</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detail as $key => $d)
                <tr>
                  <td class="text-center">{{ $key+1 }}</td>
                  <td class="text-center">{{ $d->tglmanifest }}</td>
                  <td class="text-center">{{ $d->nomanifest }}</td>
                  <td class="text-center">{{ $d->sopir }}</td>
                  <td class="text-center">{{ $d->updated_at }}</td>
                  <td class="text-center">
                   @if($d->status==0)
                   Belum Dikirim
                   @elseif($d->status==1)
                   Pengiriman Ke Kantor Cabang Tujuan
                   @else
                   Sampai Di Kantor Cabang Tujuan
                   @endif
                 </td>
                 <td>
                  <a class="btn btn-success" href="{!! action('ManifestController@detail',$d->id) !!}"><i class="fa fa-eye"></i></a>
                  @if($d->status==0)
                  <a href="{!! action('ManifestController@kirim',$d->id) !!}" class="btn btn-sm btn-primary">
                    <i class="fa fa-check"></i>
                    Kirim
                  </a>
                  @endif
                  @if($d->status==1)
                  <a href="{!! action('ManifestController@sampai',$d->id) !!}" class="btn btn-sm btn-primary">
                    <i class="fa fa-check"></i>
                    Sampai
                  </a> 
                  @endif
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