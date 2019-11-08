<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Manifest
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('manifest')); ?>" class="active"><i class="fa fa-dashboard"></i> Detail Manifest</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;">
            <div class="box-header">
              <h3 class="box-title">Detail Manifest</h3>
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
                        <?php $__currentLoopData = $detailatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detailatas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th style="width: 10%;">No. Manifest </th>
                          <td>: <?php echo e($detailatas->nomanifest); ?></td>
                        </tr>                    
                        <tr>
                          <th>Tanggal </th>
                          <td>: <?php echo e($detailatas->tanggal); ?></td>
                        </tr>
                       <tr>
                          <th>Sopir </th>
                          <td>: <?php echo e($detailatas->sopir); ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal berangkat </th>
                          <td>: <?php echo e($detailatas->tglbrgkt); ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal tiba </th>
                          <td>: <?php echo e($detailatas->tgltiba); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
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
                 <?php $__currentLoopData = $dt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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

                   <?php if($status == 0): ?>
                    <tr>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($no); ?></td>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($d->noresi); ?></td> 
                      <?php 
                        $no_resi = $d->noresi;
                        $status=1;
                      ?>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($d->dari); ?></td>
                      <td rowspan="<?php echo e($jmlh); ?>"><?php echo e($d->tujuan); ?></td> 
                      <td><?php echo e($d->namabarang); ?></td>
                      <td class="text-center"><?php echo e($d->jumlah); ?></td>
                      <td class="text-center"><?php echo e($d->satuan); ?></td>
                      <td class="text-center"><?php echo e($d->berat); ?></td>
                      <td class="text-center"><?php echo e($d->totdimensi); ?></td>
                      <td>Rp. <?php echo e(number_format($d->subtotbiaya , 2, ',', '.')); ?></td>
                    </tr>
                    <?php elseif($no_resi == $d->noresi): ?> 
                    <tr>
                      <td><?php echo e($d->namabarang); ?></td>
            					<td class="text-center"><?php echo e($d->jumlah); ?></td>
                      <td class="text-center"><?php echo e($d->satuan); ?></td>
                      <td class="text-center"><?php echo e($d->berat); ?></td>
                      <td class="text-center"><?php echo e($d->totdimensi); ?></td>
                      <td>Rp. <?php echo e(number_format($d->subtotbiaya , 2, ',', '.')); ?></td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php $__currentLoopData = $hitungan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $h2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <td align="right" colspan="9">Total :</td>
                      <td>Rp. <?php echo e(number_format($h2->biaya, 2, ',', '.')); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tr>
                  </tbody>
                </table>
                  <div class="col-md-12">
                   <?php $__currentLoopData = $hitungan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $h1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <td>Jumlah (kuantitas) : <?php echo e($h1->kuantitas); ?></td> <br>
                     <td>Jumlah (berat) : <?php echo e($h1->totalberat); ?></td>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 </div>
                 <div class="col-md-12">
                  <?php $__currentLoopData = $hitungan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $h2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <td>Jumlah (resi) : <?php echo e($h2->jmlh); ?></td>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <p><u><?php echo e($detailatas->pembuat); ?></u></p>
      </div>
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo action('ManifestController@print',$detailatas->id); ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
        </div>
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