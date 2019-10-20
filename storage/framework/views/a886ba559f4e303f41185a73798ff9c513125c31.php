<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php if(isset($edit)): ?>
      Edit Data Jadwal Pengiriman
      <?php else: ?>
      Input Data Jadwal Pengiriman
      <?php endif; ?>
    </h1>
    <ol class="breadcrumb">
      <?php if(isset($edit)): ?>
      <li><a href="<?php echo e(url('jadwalpengiriman/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Edit Data Jadwal Pengiriman</a></li>
      <?php else: ?>
      <li><a href="<?php echo e(url('jadwalpengiriman/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Data Jadwal Pengiriman</a></li>
      <?php endif; ?>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <?php if(isset($edit)): ?>
            <h3 class="box-title">Form Edit Data Jadwal Pengiriman</h3>
            <?php else: ?>
            <h3 class="box-title">Form Input Data Jadwal Pengiriman</h3>
            <?php endif; ?>
            <h3 style="color: green" id="hari" ></h3>

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
            <?php if(isset($edit)): ?>
            <form role="form" action="<?php echo e(route('jadwalpengiriman.update', $edit->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(method_field("PUT")); ?>

              <?php else: ?>
              <form method="POST" action="<?php echo e(url("jadwalpengiriman")); ?>" method="POST" enctype="multipart/form-data">
                <?php endif; ?>
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
                    <?php if(isset($edit) and $value->id==$edit->id): ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
                    <?php endif; ?>
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

<footer class="main-footer">
  <strong>Copyright &copy; 2019 <a href="<?php echo e(url('/')); ?>">CV. Karya Anugerah Ekspedisi</a>.</strong> All rights
  reserved.
</footer>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>