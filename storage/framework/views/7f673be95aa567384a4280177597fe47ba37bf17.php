<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('karyawan')); ?>" class="active"><i class="fa fa-dashboard"></i> Karyawan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Karyawan</h3>
              <?php if(session('status')): ?>
                <div style="background-color:green; color:white;font-weight: bold">
                  <?php echo e(session('status')); ?>

                </div>
              <?php endif; ?>
            </div>
            <!-- /.box-header -->
          <div class="box-body">
      <table id="example1" class="table table-bordered table-striped" style="overflow-x:auto;">
        <thead>
        <tr>
          <th class="text-center" width="10px">No</th>
          <th class="text-center">Foto</th>
          <th class="text-center">Nama Karyawan</th>
          <th class="text-center">Jabatan</th>
          <th class="text-center" width="100px">Alamat</th>
          <th class="text-center">No. Telpon</th>
          <th class="text-center">Tempat Lahir</th>
          <th class="text-center">Tanggal Lahir</th>
          <th class="text-center">Username</th>
          <th class="text-center">Email</th>
          <th class="text-center">Aksi</th>
        </tr>
        </thead>
       <tbody>
       <?php $__currentLoopData = $karyawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($key+1); ?></td>
          <td>
            <img src="<?php echo e(url('images/karyawan/'.$k->foto)); ?>" style="width: 150px; height: 150px;">
          </td>
          <td><?php echo e($k->nama); ?></td>
          <td><?php echo e($k->jabatans->nama); ?></td>
          <td><?php echo e($k->alamat); ?></td>
          <td><?php echo e($k->no_tlp); ?></td>
          <td><?php echo e($k->tmpt_lahir); ?></td>
          <td><?php echo e($k->tgl_lahir); ?></td>
          <td><?php echo e($k->users->username); ?></td>
          <td><?php echo e($k->users->email); ?></td>
          <td>
            <a class="btn btn-sm btn-success" href="<?php echo action('KaryawanController@edit',$k->id); ?>"> 
              <i class="fa fa-pencil"></i>
            </a>
            <form action ="<?php echo e(route('karyawan.destroy',$k->id)); ?>" method="post"><?php echo e(method_field("DELETE")); ?> <?php echo e(csrf_field()); ?> 
            <button class="btn btn-sm btn-danger">
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