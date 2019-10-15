@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Manifest
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('manifest') }}" class="active"><i class="fa fa-dashboard"></i> Detail Manifest</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;">
            <div class="box-header">
              <h3 class="box-title">Detail Manifest</h3>
              @if(session('status'))
                <div style="background-color:green; color:white;font-weight: bold">
                  {{session('status')}}
                </div>
              @endif
            </div>

            <div class="row invoice-info">
              <div class="col-sm-12 invoice-col">
                <address>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table">
                        @foreach ($detailatas as $key => $detailatas)
                        <tr>
                          <th style="width: 10%;">No. Manifest </th>
                          <td>: {{ $detailatas->nomanifest }}</td>
                        </tr>                    
                        <tr>
                          <th>Tanggal </th>
                          <td>: {{ $detailatas->tanggal }}</td>
                        </tr>
                       <tr>
                          <th>Sopir </th>
                          <td>: {{ $detailatas->sopir }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal berangkat </th>
                          <td>: {{ $detailatas->tglbrgkt }}</td>
                        </tr>
                        <tr>
                          <th>Tanggal tiba </th>
                          <td>: {{ $detailatas->tgltiba }}</td>
                        </tr>
                        @endforeach
                        
                      </table>
                    </div>
                  </div>           
                </address>                
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="btn-success">
          				<tr>
          					<th class="text-center">No.</th>
          					<th class="text-center">No. Resi</th>
                    <th class="text-center">Dari</th>
          					<th class="text-center">Tujuan</th>
                    <th class="text-center">Nama Barang</th>
          					<th class="text-center">Jumlah</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Berat/Dimensi (kg)</th>
                    <th class="text-center">Sub Total Berat (kg)</th>
                    <th class="text-center">Sub Total Biaya</th>
          				</tr>
                  </thead>
                 <tbody>
                  <?php 

                    $no_resi = "";
                    $status = 0;
                    $jmlh = 0;
                    $no=0;

                  ?>
                 @foreach ($dt as $key => $d)

                 <?php 
                  
                  if ($no_resi!=$d->noresi) {
                    $status = 0;
                    $no = $no +1;
                    foreach ($jumlahbaris as $key => $a) 
                    {
                      if($a->no_resi == $d->noresi)
                      {
                          $jmlh = $a->jmlhbarisresi;
                      }
                    }
                  }

                 ?>

                   @if ($status == 0)
                    <tr>
                      <td rowspan="{{$jmlh}}">{{ $no }}</td>
                      <td rowspan="{{$jmlh}}">{{ $d->noresi }}</td> 
                      <?php 
                        $no_resi = $d->noresi;
                        $status=1;
                      ?>
                      <td rowspan="{{$jmlh}}">{{ $d->dari }}</td>
                      <td rowspan="{{$jmlh}}">{{ $d->tujuan }}</td> 
                      <td>{{ $d->namabarang }}</td>
                      <td class="text-center">{{ $d->jumlah }}</td>
                      <td class="text-center">{{ $d->satuan }}</td>
                      <td class="text-center">{{ $d->berat }}</td>
                      <td class="text-center">{{ $d->totdimensi }}</td>
                      <td>Rp. {{ number_format($d->subtotbiaya , 2, ',', '.') }}</td>
                    </tr>
                    @elseif($no_resi == $d->noresi) 
                    <tr>
                      <td>{{ $d->namabarang }}</td>
            					<td class="text-center">{{ $d->jumlah }}</td>
                      <td class="text-center">{{ $d->satuan }}</td>
                      <td class="text-center">{{ $d->berat }}</td>
                      <td class="text-center">{{ $d->totdimensi }}</td>
                      <td>Rp. {{ number_format($d->subtotbiaya , 2, ',', '.') }}</td>
                      </tr>
                    @endif
                  @endforeach
                  <tr>
                    @foreach ($hitungan2 as $key => $h2)
                      <td align="right" colspan="9">Total :</td>
                      <td>Rp. {{ number_format($h2->biaya, 2, ',', '.') }}</td>
                        @endforeach
                  </tr>
                  </tbody>
                </table>
                  <div class="col-md-12">
                   @foreach ($hitungan1 as $key => $h1)

                     <td>Jumlah (kuantitas) : {{ $h1->kuantitas }}</td> <br>
                     <td>Jumlah (berat) : {{ $h1->totalberat }}</td>

                   @endforeach

                 </div>
                 <div class="col-md-12">
                  @foreach ($hitungan2 as $key => $h2)

                    <td>Jumlah (resi) : {{ $h2->jmlh }}</td>

                  @endforeach
                </div>
                
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
      <br><br><br>
      <div align="right" style="margin-right: 5%;">
          <p style="margin-bottom: 50px;">Penanggung Jawab,</p>
          <p><u>{{ $detailatas->pembuat }}</u></p>
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="{!! action('ManifestController@print',$detailatas->id) !!}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
        </div>
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
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>


@endsection
@endsection