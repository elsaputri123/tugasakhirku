<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('pelanggan.edit')); ?>" class="active"><i class="fa fa-dashboard"></i> Edit Data Pelanggan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pelanggan</h3>
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

            <form role="form" action="<?php echo e(route('pelanggan.update', $pelanggans->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(method_field("PUT")); ?> 
			        <?php echo e(csrf_field()); ?> 
              <div class="box-body">
				        <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <input style="width: 30%;" type="text" name="nama" class="form-control" value="<?php echo e($pelanggans->nama); ?>"/>
                </div>
                 <div class="form-group">
                  <label>Alamat</label>
                  <input style="width: 30%;" type="text" name="alamat" class="form-control" value="<?php echo e($pelanggans->alamat); ?>"/>
                </div>
                 <div class="form-group">
                  <label>No. Tlp</label>
                  <input style="width: 30%;" type="number" name="notlp" class="form-control" value="<?php echo e($pelanggans->no_tlp); ?>"/>
                </div>
              <!-- /.box-body -->

                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
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
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>