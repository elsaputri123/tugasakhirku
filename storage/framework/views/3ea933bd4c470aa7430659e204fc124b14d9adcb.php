<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Nota Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('notakirim')); ?>" class="active"><i class="fa fa-dashboard"></i> Detail Nota Kirim</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;">
            <div class="box-header">
              <h3 class="box-title">Detail Nota Kirim</h3>
              <?php if(session('status')): ?>
                <div style="background-color:green; color:white;font-weight: bold">
                  <?php echo e(session('status')); ?>

                </div>
              <?php endif; ?>
            </div>

            <div class="row invoice-info">
              <div class="col-sm-12 invoice-col">
                <address>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width: 10%;">No. Resi </th>
                          <td>: <?php echo e($notakirims->no_resi); ?></td>
                        </tr>                    
                        <tr>
                          <th>Tanggal </th>
                          <td>: <?php echo e($notakirims->tanggal); ?></td>
                        </tr>
                        <tr>
                          <th>Jenis Pembayaran </th>
                          <?php if($notakirims->jenispembayaran == 1): ?>
                          <td>: Lunas</td>
                          <?php elseif($notakirims->jenispembayaran == 2): ?>
                          <td>: Franco</td>
                          <?php elseif($notakirims->jenispembayaran == 3): ?>
                          <td>: Loco</td>
                          <?php endif; ?>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div class="col-md-6">
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th>Dari </th>
                              <td>: <?php echo e($notakirims->pelanggans->nama); ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td>: <?php echo e($notakirims->pelanggans->alamat); ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td>: <?php echo e($notakirims->pelanggans->no_tlp); ?></td>
                            </tr> 
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th>Tujuan </th>
                              <td>: <?php echo e($notakirims->namapenerima); ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td>: <?php echo e($notakirims->alamatpenerima); ?>

                                <br><?php if(isset($detailalamat->kelurahans->nama)): ?> <?php echo e('Kelurahan '.$detailalamat->kelurahans->nama); ?> <?php endif; ?>
                                <br><?php if(isset($detailalamat->kecamatan)): ?><?php echo e('Kecamatan '.$detailalamat->kecamatan); ?> <?php endif; ?>
                                <br><?php if(isset($detailalamat->tujuan)): ?><?php echo e('Kota '.$detailalamat->tujuan); ?> <?php endif; ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td>: <?php echo e($notakirims->tlppenerima); ?></td>
                            </tr> 
                          </table>
                        </div>
                      </div>
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
          					<th class="text-center">Jenis Barang</th>
                    <th class="text-center">Nama Barang</th>
          					<th class="text-center">Jumlah</th>
                    <th class="text-center">Satuan</th>
          					<th class="text-center">Berat (kg) </th>
                    <th class="text-center">Sub Total Berat (kg)</th>
                    <th class="text-center">Sub Total Biaya</th>
          				</tr>
                  </thead>
                 <tbody>
                 <?php $__currentLoopData = $detailnota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                 <?php 
                  $stharga = $notakirims->tarifkms->harga * $d->jumlah * $d->berat;
                  $stberat = $d->jumlah * $d->berat;
                 ?>

          				<tr>
          					<td class="text-center"><?php echo e($key+1); ?></td>
          					<td><?php echo e($d->jenis); ?></td>
                    <td><?php echo e($d->barang); ?></td>
          					<td class="text-center"><?php echo e($d->jumlah); ?></td>
                    <td class="text-center"><?php echo e($d->satuan); ?></td>

                    <?php if($d->dimensi == null): ?>
                    <td class="text-center"><?php echo e($d->berat); ?></td>
                    <td class="text-center"><?php echo e($stberat); ?></td>
                    <td>Rp. <?php echo e(number_format($stharga, 2, ',', '.')); ?></td>
                    <?php else: ?>
                    <?php
                      $dmnsi = $d->dimensi;
                  
                      $temp = explode('x', $dmnsi);

                      $p=$temp[0];
                      $l=$temp[1];
                      $t=$temp[2];

                      $tberat = $p*$l*$t/4000;

                      $dstberat = $d->jumlah*$tberat;
                      $dstharga = $notakirims->tarifkms->harga * $dstberat;
                    ?>
                    <td class="text-center"><?php echo e($tberat); ?></td>
                    <td class="text-center"><?php echo e($dstberat); ?></td>
                    <td>Rp. <?php echo e(number_format($dstharga, 2, ',', '.')); ?></td>
                    <?php endif; ?>
          				</tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td align="right" colspan="6">Total :</td>
                    <td class="text-center"><?php echo e($totberat->subtotberat); ?> kg</td>
                    <td>Rp. <?php echo e(number_format($notakirims->biaya_kirim, 2, ',', '.')); ?></td>
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
      </div>
      <br><br><br>
      <div align="right" style="margin-right: 5%;">
          <p style="margin-bottom: 50px;">Penanggung Jawab,</p>
          <p><u><?php echo e($notakirims->karyawan); ?></u></p>
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo action('NotakirimController@print',$notakirims->id); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
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
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>


<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>