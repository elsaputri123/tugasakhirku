<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manifest
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('manifest')); ?>" class="active"><i class="fa fa-dashboard"></i> Manifest</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title">Data Manifest</h3>
            <?php if(session('status')): ?>
            <div style="background-color:green; color:white;font-weight: bold">
              <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>
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
                <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="text-center"><?php echo e($key+1); ?></td>
                  <td class="text-center"><?php echo e($d->tglmanifest); ?></td>
                  <td class="text-center"><?php echo e($d->nomanifest); ?></td>
                  <td class="text-center"><?php echo e($d->sopir); ?></td>
                  <td class="text-center"><?php echo e($d->updated_at); ?></td>
                  <td class="text-center">
                   <?php if($d->status==0): ?>
                   Belum Dikirim
                   <?php elseif($d->status==1): ?>
                   Pengiriman Ke Kantor Cabang Tujuan
                   <?php else: ?>
                   Sampai Di Kantor Cabang Tujuan
                   <?php endif; ?>
                 </td>
                 <td>
                  <a class="btn btn-success" href="<?php echo action('ManifestController@detail',$d->id); ?>"><i class="fa fa-eye"></i></a>
                  <?php if($d->status==0): ?>
                  <a href="<?php echo action('ManifestController@kirim',$d->id); ?>" class="btn btn-sm btn-primary">
                    <i class="fa fa-check"></i>
                    Kirim
                  </a>
                  <?php endif; ?>
                  <?php if($d->status==1): ?>
                  <a href="<?php echo action('ManifestController@sampai',$d->id); ?>" class="btn btn-sm btn-primary">
                    <i class="fa fa-check"></i>
                    Sampai
                  </a> 
                  <?php endif; ?>
                </td> 
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>