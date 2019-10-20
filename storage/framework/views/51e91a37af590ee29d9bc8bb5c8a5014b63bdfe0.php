<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Rute Pengiriman
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('Rute')); ?>" class="active"><i class="fa fa-dashboard"></i> Rute Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title">Rute Pengiriman</h3>
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
                  <th>No</th>
                  <th>Kecamatan</th>
                  <th>Nama Rute</th>
                  <td>X (longitude)</td>
                  <td>Y (latitude)</td>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($value->kecamatan->nama); ?></td>
                  <td><?php echo e($value->nama); ?></td>
                  <td><?php echo e($value->koordinat_x); ?></td>
                  <td><?php echo e($value->koordinat_y); ?></td>
                  <td>
                    <a href="<?php echo action('RuteController@edit', $value->id); ?>" class="btn btn-warning">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action ="<?php echo e(route('rute.destroy', $value->id)); ?>" method="post"><?php echo e(method_field("DELETE")); ?> <?php echo e(csrf_field()); ?>

                      <button class="btn btn-danger">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
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