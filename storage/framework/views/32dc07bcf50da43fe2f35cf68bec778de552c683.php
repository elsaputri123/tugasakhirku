<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('karyawan/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Tambah Data Karyawan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Karyawan</h3>
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
            <form role="form" action="<?php echo e(url('karyawan')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

              <div class="box-body">
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input type="text" name="nama" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <select name="jabatan" id="jabatan" class="form-control" required>
                    <option value="" selected="">Pilih Jabatan </option>
                    <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($j->id); ?>"><?php echo e($j->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="text" name="notlp" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tmptlahir" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tgllahir" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                  <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" required>
                  <p class="help-block"></p>
                </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>