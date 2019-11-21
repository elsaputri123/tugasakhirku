<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      History Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('jadwalpengiriman')); ?>" class="active"><i class="fa fa-dashboard"></i> History Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title text-center">Data History Pengiriman</h3>
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
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" width="10px">No</th>
                  <th class="text-center">Tanggal </th>
                  <th class="text-center">Supir </th>
                  <th class="text-center">Kendaraan </th>
                  <th class="text-center">Status </th>
                  <th class="text-center">Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($value->tanggal); ?></td>
                  <td><?php echo e($value->karyawan); ?></td>
                  <td><?php echo e($value->kendaraan." - ".$value->no_polisi); ?></td>
                  <td>
                    <?php if($value->status==0): ?>
                         Belum Dikirim
                    <?php elseif($value->status==1): ?>
                          Pengiriman Ke Kantor Cabang Tujuan
                    <?php else: ?>
                          Sampai Di Kantor Cabang Tujuan
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?php echo action('HistoryController@show',$value->id); ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>

                    <?php if($value->status==0): ?>
                    <a href="<?php echo action('HistoryController@kirim',$value->id); ?>" class="btn btn-sm btn-success">
                      <i class="fa fa-check"></i>
                      Kirim
                    </a>
                    <?php endif; ?>
                    <?php if($value->status==1): ?>
                    <a href="<?php echo action('HistoryController@sampai',$value->id); ?>" class="btn btn-sm btn-success">
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