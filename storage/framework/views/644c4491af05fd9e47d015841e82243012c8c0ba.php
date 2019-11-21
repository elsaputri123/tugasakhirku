<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Nota Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('notakirim/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Nota Kirim</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Nota Kirim</h3>
              <h4 style="color: green" id="hari" ></h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(session('status')): ?>
                <div style="background-color:green; color:white;font-weight: bold">
                  <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $errors ->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <h4 style="color: red"><?php echo e($error); ?></h4>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <form role="form" action="<?php echo e(url('notakirim')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="token" id="token" value="<?php echo e(csrf_token()); ?>"/>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="col-md-6">
                        <label>No. Resi</label>
                        <input style="width: 30%;" type="text" name="noresi" value="<?php echo e($resi); ?>" class="form-control" readonly="" required>
                        <p class="help-block"></p>
                      </div>
                    </div>
                  </div>

                <div class="form-group">
                <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="col-md-6">
                          <table class="table">
                            <tr>
                              <div class="form-group">
                                <label>Pengirim</label>
                                <select class="form-control" name="pengirim" id="pengirim" required="">
                                  <option value="">--Pilih Pengirim--</option>
                                  <?php $__currentLoopData = $pelanggnas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="" class="form-control" readonly="">
                                <p class="help-block"></p>
                              </div>
                              <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" name="tlp" id="tlp" value="" class="form-control" readonly="">
                                <p class="help-block"></p>
                              </div>
                            </tr>
                          </table>
                        </div>
                        <div class="col-md-6">
                          <table class="table">
                            <tr>
                              <div class="form-group">
                                  <label>Tujuan </label>
                                  <input type="text" name="penerima" class="form-control">
                                  <p class="help-block"></p>
                              </div>
                              <div class="form-group">
                                  <label>Alamat</label>
                                  <input type="text" name="alamat" class="form-control">
                                  <p class="help-block"></p>
                              </div>
                              <div class="form-group">
                                  <label>No. Telpon</label>
                                  <input type="text" name="notlp" class="form-control">
                                  <p class="help-block"></p>
                              </div>

                              <div class="form-group">
                                <label>Kota</label>
                                <select class="form-control tujuan" name="tujuan" id="tujuan" required="">
                                  <option value="">--Pilih Kota Tujuan--</option>
                                  <?php $__currentLoopData = $tarifkm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($t->id); ?>" harga="<?php echo e($t->harga); ?>"><?php echo e($t->tujuan); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div>

                              <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan" required="">
                                  <option value="">--Pilih Kecamatan--</option>
                                  <?php $__currentLoopData = $kecamatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div>

                              <div class="form-group">
                                  <label>Kelurahan</label>
                                  <select class="form-control" name="kelurahan" id="kelurahan" required="">
                                </select>
                              </div>
                            </tr>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label style="margin-right: 10px;">Pembayaran </label>
                  <input type="radio" class="form-radio" name="rd" id="rd1" value="1" checked=""> <label for="rd1">Lunas</label>
                  <input type="radio" class="form-radio" name="rd" value="2" id="rd1"> <label for="rd1">Franco</label>
                  <input type="radio" class="form-radio" name="rd" value="3" id="rd1"> <label for="rd1">Loco</label>
                </div>

                <table  class="table table-hover table-bordered small-text" id="tb">
                  <thead class="btn-success">
                    <tr class="tr-header" >
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama Barang</th>                      
                      <th class="text-center" width="100px">Jmlh</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Opsi</th>
                      <th class="text-center">Berat Satuan (kg) / Dimensi </th>
                      <th class="text-center">Sub Total Berat</th>
                      <th class="text-center">Sub Total Biaya</th>
                      <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
                    </tr>
                  </thead>
                    <tr>

                      <td width="50px">
                        <input type="text" name="no[]" value="1" style="border: none;" class="form-control no" readonly="">
                      </td>

                  <!--     $b->id.' - --> 
             <!--      .' ['.$b->jenis->nama.']' -->
                      <td width="150px">
                        <input  type="text" list="barang" class="form-control barang" name="barang[]" autocomplete="on" required>
                          <datalist id="barang">
                            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($b->id .' - '.$b->nama); ?>" satuan="<?php echo e($b->satuan); ?>" berat="<?php echo e($b->berat); ?>"><?php echo e($b->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </datalist>
                      </td>

                      <td>
                        <input type="number" min="0" name="jumlah[]" value="0" class="form-control jumlah" required>
                      </td>

                      <td width="80px">
                        <input type="text" name="satuan[]" class="form-control satuan">
                      </td>

                      <td>
                        <select class="form-control checkInput">
                          <option value="berat">Berat(Kg) [Default]</option>
                          <option value="dimensi">Dimensi</option>
                        </select>
                      </td>

                      <td>
                        <div class="divBerat" style="display: inline;">
                          Berat : <input type="number" name="berat[]" value="0" class="form-control berat">
                        </div>
                        <div class="divDimensi" style="display: none;">
                          Panjang : <input type="number" min="0" name="panjang[]" value="0" class="form-control panjang">
                          Lebar : <input type="number" min="0" name="lebar[]" value="0" class="form-control lebar">
                          Tinggi : <input type="number" min="0" name="tinggi[]" value="0" class="form-control tinggi">
                        </div>
                      </td>

                      <td width="120px">
                        <input type="number" name="subtotberat[]" value="0" class="form-control subtotberat" required readonly="">
                      </td>
                      <td width="120px">
                        Rp. <input type="number" name="subtotbiaya[]" value="0" class="form-control subtotbiaya" required readonly="">
                      </td>
                      <td>
                        <a href='javascript:void(0);'  class='remove'><i style="font-size: 18px;" class='glyphicon glyphicon-remove'></i></a>
                      </td>
                    </tr>
                    <tfoot>
                      <tr>
                        <td colspan="7" align="right">Grand Total :</td>
                        <td> Rp.  <input type="grandtotal" class="form-control gtotal" name="grandtotal" readonly=""></td>
                      </tr>
                    </tfoot>
                  </table>
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
    <strong>Copyright &copy; 2019 <a href="<?php echo e(url('/')); ?>">CV. Karya Anugerah Ekspedisi</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<?php $__env->startSection('script'); ?>
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
      url: "<?php echo e(url('manifest/getnopolisi')); ?>"+"/"+nopolisi, 
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
    
    $(".gtotal").val(sum.toLocaleString()); 
    }

  var selected = [];
  $(document).on('change','.barang',function(){
    var inputval= $(this).val();
    var satuan= $("datalist option[value='"+inputval+"']").attr('satuan');
    var berat= parseFloat($("datalist option[value='"+inputval+"']").attr('berat'));

    if(selected.includes(inputval) == true)
    {
      $(this).val("");
      alert('Barang Tersebut Telah Dipilih Sebelumnya !');
    }
    else
    {
      selected.push(inputval);
      $(this).closest('tr').find('td:nth-child(4)').find('input').val(satuan);
      $(this).closest('tr').find('td:nth-child(6)').find('.divBerat').find('.berat').val(berat);
      kalkulasiSubtotal($(this));
    }
    console.log(selected);// debug start
  });

  $(document).on('change','.jumlah,.panjang,.lebar,.tinggi,.berat',function(){
    kalkulasiSubtotal($(this));

  });

  function kalkulasiSubtotal(elm)
  {
     var elm = elm;
     var jumlah = parseInt(elm.closest('tr').find('td:nth-child(3)').find('input').val());
     var pilihan = elm.closest('tr').find('td:nth-child(5)').find('select option:selected').val();
     var harga = parseInt($('.tujuan option:selected').attr('harga'));
     var subtotHarga = 0;
     var subtotBerat = 0;
     if(pilihan == 'berat')
     {
        var berat = parseInt(elm.closest('tr').find('td:nth-child(6)').find('.berat').val());
        subtotBerat = jumlah * berat;
        subtotHarga = harga*subtotBerat;
        elm.closest('tr').find('td:nth-child(7)').find('input').val(subtotBerat);
        elm.closest('tr').find('td:nth-child(8)').find('input').val(subtotHarga);
     }
     else
     {
      var panjang = parseInt(elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.panjang').val());
      var lebar = parseInt(elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.lebar').val());
      var tinggi = parseInt(elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.tinggi').val());
      
      subtotBerat = parseFloat(panjang * lebar * tinggi / 4000) * jumlah;
      if(parseInt(subtotBerat) > 50)
      {
          elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.tinggi').val('0');
          elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.panjang').val('0');
          elm.closest('tr').find('td:nth-child(6)').find('.divDimensi').find('.lebar').val('0');
          elm.closest('tr').find('td:nth-child(5)').find('select').val('berat').trigger('change');
      }
      else
      {
          subtotHarga = harga*subtotBerat;
          elm.closest('tr').find('td:nth-child(7)').find('input').val(subtotBerat);
          elm.closest('tr').find('td:nth-child(8)').find('input').val(subtotHarga);
      }
     }

     grandTotal();
  }

  //===============INPUT FILTER=================//
  $(document).on('change','.checkInput',function(){
      var val = $(this).val();

      if(val == 'berat')
      {
            $(this).closest('tr').find('td:nth-child(6)').find('.divBerat').css('display','inline');
            $(this).closest('tr').find('td:nth-child(6)').find('.divDimensi').css('display','none');
      }
      else
      {
          $(this).closest('tr').find('td:nth-child(6)').find('.divDimensi').css('display','inline');
          $(this).closest('tr').find('td:nth-child(6)').find('.divBerat').css('display','none');
      }
      kalkulasiSubtotal($(this));
  });
  //============================================//

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });

  function updateNomor()
  {
  $(".no").each(function () { //untuk semua elemen HTML yang class="no"
        var trIndex = parseInt($(this).closest("tr").index()+1); //ngambil urutan baris dari tabel
        $(this).val(trIndex); //ngeupdate kolom urutan sesuai index baris
      });
}  
  
    $(function(){
        var myOpt = [];

        $('#addMore').on('click', function() {
                  var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                  data.find("input").val('');

                  updateNomor(); // manggil method buat ngupdate nomor 
                  
         });
         $(document).on('click', '.remove', function() {
             var trIndex = $(this).closest("tr").index();
             var barang = $(this).closest('tr').find('td:nth-child(2)').find('input').val();
                if(trIndex>0) {
                 $(this).closest("tr").remove();
                 
               } else {
                 alert('Tidak Dapat Menghapus Baris Ini !');
                 $(this).closest('tr').find('td:nth-child(2)').find('input').val('');
               }
               var item = selected.indexOf(barang);
               selected.splice(item,1);
               updateNomor();
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
      url: "<?php echo e(url('notakirim/getpengirim')); ?>"+"/"+pengirim, 
      success: function (data){
        console.log(data);

            $('#alamat').val(data['alamat']);
            $('#tlp').val(data['no_tlp']); 
      }
    });
  });


    //AJAX UNTUK KELURAHAN
    $("#kecamatan").change(function()
    {

      $.ajax({

            method: "POST",
            url: "<?php echo e(url('nk/tampilkelurahan')); ?>",
            data:
            {
              '_token': $('#token').val(),
              'kecamatan_id': $('#kecamatan').val()
            },

            success: function(data)
            {
              $('#kelurahan').html('');
              $('#kelurahan').html(data);
              console.log("berhasil");
            },
            error: function(data)
            {
              console.log(data);
            }
      });
 });

    function reloadkelurahan()
    {
       $.ajax({

            method: "POST",
            url: "<?php echo e(url('nk/tampilkelurahan')); ?>",
            data:
            {
              '_token': $('#token').val(),
              'kecamatan_id': $('#kecamatan').val()
            },

            success: function(data)
            {
              $('#kelurahan').html('');
              $('#kelurahan').html(data);
              console.log("berhasil");
            },
            error: function(data)
            {
              console.log(data);
            }
      });
     }


    //AJAX UNTUK KECAMATAN
    $("#tujuan").change(function()
    {
      $.ajax({
            method: "POST",
            url: "<?php echo e(url('nk/tampilkecamatan')); ?>",
            data:
            {
              '_token': $('#token').val(),
              'tarifkm_id': $('#tujuan').val()
            },

            success: function(data)
            {
              $('#kecamatan').html('');
              $('#kelurahan').html('');
              $('#kecamatan').html(data);
              reloadkelurahan();
              console.log("berhasil");
            },
            error: function(data)
            {
              console.log(data);
            }
      });
 });
</script>

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>