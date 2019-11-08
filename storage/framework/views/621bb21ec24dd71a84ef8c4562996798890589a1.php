<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php if(isset($edit)): ?>
      Edit Data History Pengiriman
      <?php else: ?>
      Input Data History Pengiriman
      <?php endif; ?>
    </h1>
    <ol class="breadcrumb">
      <?php if(isset($edit)): ?>
      <li><a href="<?php echo e(url('HistoryController/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Edit Data History Pengiriman</a></li>
      <?php else: ?>
      <li><a href="<?php echo e(url('HistoryController/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Data History Pengiriman</a></li>
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
            <h3 class="box-title">Form Edit Data History Pengiriman</h3>
            <?php else: ?>
            <h3 class="box-title">Form Input Data History Pengiriman</h3>
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
            <form role="form" action="<?php echo e(route('history.update', $edit->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo e(method_field("PUT")); ?>

              <?php else: ?>
              <form method="POST" action="<?php echo e(url("history")); ?>" method="POST" enctype="multipart/form-data">
                <?php endif; ?>
                <?php echo csrf_field(); ?>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                     <label>Titik Awal : </label>
                     <select class="form-control" name="awal" id="awal">
                      <?php $__currentLoopData = $kecamatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($value->nama=="Surabaya"): ?>
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
                   <label>Titik Akhir : </label>
                   <select class="form-control" name="akhir" id="akhir">
                    <?php $__currentLoopData = $kecamatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                 <label>Nama Kurir : </label>
                 <select class="form-control" name="user_id" id="user_id">
                  <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
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