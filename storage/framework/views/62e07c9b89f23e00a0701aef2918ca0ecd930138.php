<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php if(isset($edit)): ?>
      Edit Data Rute Pengiriman
      <?php else: ?>
      Input Data Rute Pengiriman
      <?php endif; ?>
    </h1>
    <ol class="breadcrumb">
      <?php if(isset($edit)): ?>
      <li><a href="<?php echo e(url('rute/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Edit Data Rute Pengiriman</a></li>
      <?php else: ?>
      <li><a href="<?php echo e(url('rute/create')); ?>" class="active"><i class="fa fa-dashboard"></i> Input Data Rute Pengiriman</a></li>
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
            <h3 class="box-title">Form Edit Data Rute Pengiriman</h3>
            <?php else: ?>
            <h3 class="box-title">Form Input Data Rute Pengiriman</h3>
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

            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
              <ul>
               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li><?php echo e($error); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
           </div>
           <?php endif; ?>

         </div>
         
         <div class="container-fluid">
          <?php if(isset($edit)): ?>
          <form role="form" action="<?php echo e(route('rute.update', $edit->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(method_field("PUT")); ?>

            <?php else: ?>
            <form method="POST" action="<?php echo e(url("rute")); ?>" method="POST" enctype="multipart/form-data">
              <?php endif; ?>
              <?php echo csrf_field(); ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                   <label>Kecamatan </label>
                   <select class="form-control" name="kecamatan" id="kecamatan">
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
                  <label>Jenis Rute : </label>
                  <select name="jenis" id="jenis" class="form-control">
                    <option> -- Pilih Jenis --</option>
                    <option value="1">Kecamatan</option>
                    <option value="2">Jalan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Rute  </label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Rute (Opotional)" 
                  value="<?php if(isset($edit)): ?> <?php echo e($edit->nama); ?>  <?php endif; ?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                 <label>Koordinat X (longitude) </label>
                 <input type="text" name="koordinat_x" id="koordinat_x" class="form-control" required="required" placeholder="Masukan Longitude" value="<?php if(isset($edit)): ?> <?php echo e($edit->koordinat_x); ?>  <?php endif; ?>" >
               </div>
             </div>
           </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
               <label>Koordinat Y (latitude) </label>
               <input type="text" name="koordinat_y" id="koordinat_y" class="form-control" required="required" placeholder="Masukan Latitude" value="<?php if(isset($edit)): ?> <?php echo e($edit->koordinat_y); ?>  <?php endif; ?>">
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

<?php $__env->startSection("script"); ?>
<script type="text/javascript">
  <?php if(isset($edit->jenis)): ?>
    $("#jenis").val('<?php echo e($edit->jenis); ?>');
  <?php endif; ?>

  <?php if(isset($edit->kecamatan_id)): ?>
    $("#kecamatan").val('<?php echo e($edit->kecamatan_id); ?>');
  <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>