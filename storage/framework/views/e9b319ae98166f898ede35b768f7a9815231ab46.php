<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<<<<<<< HEAD
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Data Jadwal Pengiriman
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('jadwalpengiriman/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Data Jadwal Pengiriman</a></li>
      </ol>
    </section>

    <!-- Main content -->
=======
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Input Data Jadwal Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('jadwalpengiriman/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Data Jadwal Pengiriman</a></li>
    </ol>
  </section>

>>>>>>> 12ec09240b2adaeb43cf788594cdf5f754b32f3e
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Data Jadwal Pengiriman</h3>
              <h3 style="color: green" id="hari" ></h3>
<<<<<<< HEAD
             
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
            <form role="form" action="<?php echo e(url('jadwalpengiriman')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

                <div class="form-group">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="col-md-6">

                          <table class="table">
                            <tr>
                              <div class="form-group">
                                <label>Kendaraan</label>
                                <select class="form-control" name="kendaraan" id="kendaraan" required="">
                                <option value=""></option>
                                <?php $__currentLoopData = $kendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k->id); ?>"><?php echo e($k->no_polisi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div>

                               <div class="form-group">
                                <label>Sopir </label>
                                <select class="form-control" name="sopir" id="sopir" required="">
                                <option value=""></option>
                                <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div>   

                              <div class="form-group">
                                <label>Hari </label>
                                <select class="form-control" name="sopir" id="sopir" required="">
                                <option value=""></option>
                                <?php $__currentLoopData = $sopir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($s->id); ?>"><?php echo e($s->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                              </div> 
                                                              
                            </tr>
                          </table>
                    </div>

                      <div class="col-md-6">
                        <table class="table">
                          <tr>
                            <div class="form-group">
                                <label>No. Polisi</label>
                                <select class="form-control" name="nopolisi" id="nopolisi" required="">
                                  <option value="">--Pilih No.Polisi--</option>
                                  <?php $__currentLoopData = $kendaraans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($k->id); ?>"><?php echo e($k->no_polisi); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label>Kapasitas Kendaraan</label>
                                <input type="kapasitas" name="kapasitas" id="kapasitas" class="form-control" readonly="">
                                <p class="help-block"></p>
                            </div>
                          </tr>
                        </table>
                      </div>

                      <div class="box-body">
                        <table class="table table-bordered table-striped" id="tb">
                          <thead class="btn-success">
                          <tr class="tr-header" >
                            <th>No. </th>
                            <th>No. Resi</th>
                            <th>Dari</th>
                            <th>Tujuan</th>
                            <th>Sub. Colly</th>
                            <th>Sub. Berat</th>
                            <th>Total Harga</th>
                            <th>Pembayaran</th>
                            <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
                          </tr>
                          </thead>
                          <tr>

                            <td width="50px">
                              <input type="text" name="no[]" value="1" style="border: none;" class="form-control no" readonly="">
                            </td>

                            <td width="150px">
                              <input list="noresi" class="form-control noresi" name="no_resi[]" autocomplete="off" required>
                              <datalist id="noresi">
                                <?php $__currentLoopData = $detailtabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dt->id_resi.' ['.$dt->noresi.']'); ?>" dari="<?php echo e($dt->dari); ?>" tujuan="<?php echo e($dt->tujuan); ?>" subcol="<?php echo e($dt->subcol); ?>" subberat="<?php echo e($dt->subberat); ?>" alltotharga="<?php echo e($dt->alltotharga); ?>"jenispembayaran="<?php echo e($dt->jenispembayaran); ?>"><?php echo e($dt->noresi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </datalist>
                            </td>

                            <td> 
                              <input type="text" name="dari[]" class="form-control dari" required readonly="">
                            </td>

                            <td>
                              <input type="text" name="tujuan[]" class="form-control tujuan" required readonly="">
                            </td>

                            <td>
                              <input type="subcol" name="subcol[]" class="form-control subcol" required readonly="">
                            </td>

                            <td>
                              <input type="subberat" name="subberat[]" class="form-control subberat" required readonly="">
                            </td>

                            <td>
                              <input type="alltotharga" name="alltotharga[]" class="form-control alltotharga" required readonly="">
                            </td>

                            <td>
                              <input type="jenispembayaran" name="jenispembayaran[]" class="form-control jenispembayaran" required readonly="">
                            </td>

                            <td>
                              <a href='javascript:void(0);'  class='remove'><i style="font-size: 18px;" class='glyphicon glyphicon-remove'></i></a>
                            </td>

                          </tr>
                    
                    </table>
                  </div>

                        <div class="form-group">
                          <td><label name="sisakapasitas[]" class="descSisaKps"></label></td>
                        </div>
                        <div class="form-group">
                          <td><label name="totalresi[]" class="descTotResi"></label></td>
                        </div>
                        <div class="form-group">
                         <td><label name="totalcolly[]" class="descTotColly"></label></td>
                        </div>
                        <div class="form-group">
                         <td><label name="totalberat[]" class="descTotBerat"></label></td>
                        </div>
                        <div class="form-group">
                          <td><label name="thk[]" class="descTotharga"><label></td>
                        </div>
                    </div>
                  </div>
                </div>
              <!-- /.box-body -->

                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="TAMBAH">
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
=======

              <?php if(session('error')): ?>
                  <div class="alert alert-danger">
                      <?php echo e(session('error')); ?>

                  </div>
              <?php endif; ?>
              <?php if(session('success')): ?>
                  <div class="alert alert-success">
                      <?php echo e(session('success')); ?>

                  </div>
              <?php endif; ?>

            </div>
            
            <div class="container-fluid">
              <form method="POST" action="<?php echo e(url("jadwalpengiriman")); ?>">
                <?php echo csrf_field(); ?>

                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                         <label>Hari : </label>
                         <select class="form-control" name="hari" id="hari">
                            <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                         <label>Nama Karyawan : </label>
                         <select class="form-control" name="id_karyawan" id="id_karyawan">
                            <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                         <label>Kendaraan : </label>
                         <select class="form-control" name="kendaraan" id="kendaraan">
                            <?php $__currentLoopData = $kendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama." - ".$value->no_polisi); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                      </div>
                  </div>
                </div>

                <div class="row pull-right">
                  <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-success btn-md" type="submit">Simpan</button>
                      </div>
                  </div>
                </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>

>>>>>>> 12ec09240b2adaeb43cf788594cdf5f754b32f3e
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="<?php echo e(url('/')); ?>">CV. Karya Anugerah Ekspedisi</a>.</strong> All rights
    reserved.
  </footer>
</div>
<<<<<<< HEAD
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
      url: "<?php echo e(url('m/getnopolisi')); ?>"+"/"+nopolisi, 
      success: function (data){
        console.log(data);

            $('#kapasitas').val(data['kapasitas']);
      }
    });
      updateDesc();
  });

  var selected = [];


  var global_statusTambahBaris = 0; //0: bisa nambah || 1: gak bisa nambah(penuh)

  // JS UNTUK DI MENAMPILKAN DATA DI TABEL
  $(document).on('input','.noresi',function(){
    var inputval= $(this).val();

    if(selected.includes(inputval) == true)
    {
      $(this).val("");
      alert('Resi Tersebut Telah Dipilih Sebelumnya !');
    }
    else
    {
      selected.push(inputval);
      var id= $("datalist option[value='"+inputval+"']").attr('id');
      var dari= $("datalist option[value='"+inputval+"']").attr('dari');
      var tujuan= $("datalist option[value='"+inputval+"']").attr('tujuan');
      var subcol= $("datalist option[value='"+inputval+"']").attr('subcol');
      var subberat= $("datalist option[value='"+inputval+"']").attr('subberat');
      var alltotharga= $("datalist option[value='"+inputval+"']").attr('alltotharga');
      var jenispembayaran= $("datalist option[value='"+inputval+"']").attr('jenispembayaran');
      var keterangan_pembayaran = '';

      if(jenispembayaran == '1')
      {
          keterangan_pembayaran = 'Lunas';
      }
      else if(jenispembayaran == '2')
      {
          keterangan_pembayaran = 'Franco';
      }
      else
      {
          keterangan_pembayaran = 'Loco';
      }

      $(this).closest('tr').find('td:nth-child(3)').find('input').val(dari);
      $(this).closest('tr').find('td:nth-child(4)').find('input').val(tujuan);
      $(this).closest('tr').find('td:nth-child(5)').find('input').val(subcol);
      $(this).closest('tr').find('td:nth-child(6)').find('input').val(subberat);
      $(this).closest('tr').find('td:nth-child(7)').find('input').val(alltotharga);
      $(this).closest('tr').find('td:nth-child(8)').find('input').val(keterangan_pembayaran);  

      updateDesc();
    }
  });

  function updateDesc()
  {
      var totalResi = 0;
      var totalColly = 0;
      var totalBerat = 0;
      var totalHarga = 0;
      var kapasitas_awal = parseInt($('#kapasitas').val());
      var kapsAngkutan = kapasitas_awal;


      totalResi = $('.noresi').length;


      $(".subberat").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
          totalBerat += parseFloat(this.value); 
        }
      });//SUM semua field dengan class 'subberat' -> bisa dicari diatas ya ;)

      $(".subcol").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
          totalColly += parseFloat(this.value); 
        }
      });//SUM semua field dengan class 'subcol'

      $(".alltotharga").each(function () {
        if (!isNaN(this.value) && this.value.length != 0) {
          totalHarga += parseFloat(this.value); 
        }
      });//SUM semua field dengan class 'alltotharga'

      kapsAngkutan -= totalBerat;

      if(kapsAngkutan == 0)
      {
          global_statusTambahBaris = 1;
      }

      $('.descSisaKps').text('Sisa Kapasitas Angkutan : '+kapsAngkutan);
      $('.descTotResi').text('Total Resi Pengiriman : '+totalResi);
      $('.descTotBerat').text('Total Berat Angkutan: '+totalBerat);
      $('.descTotColly').text('Total Colly : '+totalColly);
      $('.descTotharga').text('Total Harga Keseluruhan : '+totalHarga);
  }


  // JS PERHITUNGAN DIBAWAH TABEL
  function updateNomor()
  {
  $(".no").each(function () { //untuk semua elemen HTML yang class="no"
        var trIndex = parseInt($(this).closest("tr").index()+1); //ngambil urutan baris dari tabel
        $(this).val(trIndex); //ngeupdate kolom urutan sesuai index baris
      });
}  


  // JS ADD MORE DAN REMOVE
      $('#addMore').on('click', function() {
        updateDesc();
        if(global_statusTambahBaris == 0)
        {
            var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
            data.find("input").val('');

            // data.find(".no").val(data.closest("tr").index());
            updateNomor();
        }
        else
        {
            alert('Maaf, Kapasitas Angkutan Sudah Penuh !');
        }
      });
      $(document).on('click', '.remove', function() {
       var trIndex = $(this).closest("tr").index();
       var noresi = $(this).closest('tr').find('td:nth-child(1)').find('input').val();
       if(trIndex>0) {
         $(this).closest("tr").remove();

       } else {
         
       }
        var item = selected.indexOf(noresi);
        selected.splice(item,1);
        updateNomor();
        updateDesc(); // reset keterangan real time
     });
</script>

<?php $__env->stopSection(); ?>
=======
>>>>>>> 12ec09240b2adaeb43cf788594cdf5f754b32f3e
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>