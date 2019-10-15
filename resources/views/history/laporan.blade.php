@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pembelian Obat
      </h1>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tanggal Awal :</label>
                    <input type="date" name="tglawal" id="tglawal" class="form-control">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tanggal Akhir :</label>
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                  </div>
                </div>                

              <div class="col-md-4">
                <div class="form-group" >
                <input style="margin-top: 25px;" class="btn btn-primary" id="cari" type="button" value="Cari">
                </div>
              </div>                  
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Pembelian</th>
                    <th>No. Faktur</th>
                    <th>Nama Obat</th>
                    <th>Tanggal Expired</th>
                    <th>Harga Satuan</th>
                    <th>Kuantiti</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody id="isitbl">
                  @foreach ($pembelian as $key => $p)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $p->tanggalbeli }}</td>
                    <td>{{ $p->nofaktur }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->exp }}</td>
                    <td>{{ 'Rp. '.number_format($p->hargabeli ,2,',','.') }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ 'Rp. '.number_format($p->total ,2,',','.') }}</td>
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

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <div id="print">
            <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
          </div>         
        </div>
      </div>
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




<script type="text/javascript">

    // JS GET TANGGAL
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    var date = new Date();
    
    var thistgl;
    var thisbln = date.getMonth();
    var year = date.getYear();
    var thisthn = (year < 1000) ? year + 1900 : year;

    var thisDay = date.getDay();

    if(thisDay >= 7)
    {
        thisDay = myDays[1];
        thistgl = date.getDate();
    }
    else
    {
        thisDay = myDays[thisDay];
        thistgl = date.getDate();
    }

    var tglnow = thisDay+', '+thistgl+' '+months[thisbln]+' '+thisthn;

    $('#hari').text(tglnow);

    // JS GET PENGIRIM
    $('#nopolisi').change(function(){
      var nopolisi = $('#nopolisi option:selected').val();

       // untuk menghapus jika cuma milih pilih no_polisi
       $('#kapasitas').val("");

      $.ajax({ type: 'GET',
      url: "{{ url('manifest/getnopolisi') }}"+"/"+nopolisi, 
      success: function (data){
        console.log(data);

            $('#kapasitas').val(data['kapasitas']);
      }
    });
  });

    function grandTotal(){ 
      var sum = 0; 
      $(".subtotbiaya").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
          sum += parseFloat(this.value); 
        } 
    }); 
    
    $(".gtotal").val(sum); 
    }

  $(document).on('input','.barang',function(){
    var inputval= $(this).val();
    var satuan= $("datalist option[value='"+inputval+"']").attr('satuan');
    var berat= parseFloat($("datalist option[value='"+inputval+"']").attr('berat'));

    $(this).closest('tr').find('td:nth-child(3)').find('input').val(satuan);
    $(this).closest('tr').find('td:nth-child(5)').find('.divBerat').find('.berat').val(berat);
    kalkulasiSubtotal($(this));
  });

  $(document).on('change','.jumlah,.panjang,.lebar,.tinggi',function(){
    kalkulasiSubtotal($(this));

  });

  function kalkulasiSubtotal(elm)
  {
     var elm = elm;
     var jumlah = parseInt(elm.closest('tr').find('td:nth-child(2)').find('input').val());
     var pilihan = elm.closest('tr').find('td:nth-child(4)').find('select option:selected').val();
     var harga = parseInt($('.tujuan option:selected').attr('harga'));
     var subtotHarga = 0;
     var subtotBerat = 0;
     if(pilihan == 'berat')
     {
        var berat = parseInt(elm.closest('tr').find('td:nth-child(5)').find('.berat').val());
        subtotBerat = jumlah * berat;
        subtotHarga = harga*subtotBerat;
        elm.closest('tr').find('td:nth-child(6)').find('input').val(subtotBerat);
        elm.closest('tr').find('td:nth-child(7)').find('input').val(subtotHarga);
     }
     else
     {
      var panjang = parseInt(elm.closest('tr').find('td:nth-child(5)').find('.divDimensi').find('.panjang').val());
      var lebar = parseInt(elm.closest('tr').find('td:nth-child(5)').find('.divDimensi').find('.lebar').val());
      var tinggi = parseInt(elm.closest('tr').find('td:nth-child(5)').find('.divDimensi').find('.tinggi').val());
      
      subtotBerat = parseFloat(panjang * lebar * tinggi / 4000) * jumlah;
      subtotHarga = harga*subtotBerat;
      elm.closest('tr').find('td:nth-child(6)').find('input').val(subtotBerat);
      elm.closest('tr').find('td:nth-child(7)').find('input').val(subtotHarga);
     }

     grandTotal();
  }

  //===============INPUT FILTER=================//
  $(document).on('change','.checkInput',function(){
      var val = $(this).val();

      if(val == 'berat')
      {
            $(this).closest('tr').find('td:nth-child(5)').find('.divBerat').css('display','inline');
            $(this).closest('tr').find('td:nth-child(5)').find('.divDimensi').css('display','none');
      }
      else
      {
          $(this).closest('tr').find('td:nth-child(5)').find('.divDimensi').css('display','inline');
          $(this).closest('tr').find('td:nth-child(5)').find('.divBerat').css('display','none');
      }
      kalkulasiSubtotal($(this));
  });
  //============================================//

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });

    $(function(){
        var myOpt = [];

        $('#addMore').on('click', function() {
                  var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                  data.find("input").val('');
         });
         $(document).on('click', '.remove', function() {
             var trIndex = $(this).closest("tr").index();
             var barang = $(this).closest('tr').find('td:nth-child(1)').find('select').find(":selected").val();
                if(trIndex>1) {
                 $(this).closest("tr").remove();

                 var removeItem = barang;

                  myOpt = jQuery.grep(myOpt, function(value) {
                    return value != removeItem;
                  });
               } else {
                 var removeItem = barang;

                  myOpt = jQuery.grep(myOpt, function(value) {
                    return value != removeItem;
                  });

                 $(this).closest('tr').find('td:nth-child(1)').find('select').val('');
               }
          });
    });
     //============================================//
      

    // JS GET PENGIRIM
    $('#pengirim').change(function(){
      var pengirim = $('#pengirim option:selected').val();

       // untuk menghapus jika cuma milih pilih pengirim
       $('#alamat').val("");
       $('#tlp').val("");

      $.ajax({ type: 'GET',
      url: "{{ url('notakirim/getpengirim') }}"+"/"+pengirim, 
      success: function (data){
        console.log(data);

            $('#alamat').val(data['alamat']);
            $('#tlp').val(data['no_tlp']); 
      }
    });
  });
</script>

@endsection
@endsection