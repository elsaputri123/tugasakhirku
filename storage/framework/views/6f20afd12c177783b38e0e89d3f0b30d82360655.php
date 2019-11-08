<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nota Kirim
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('notakirim')); ?>" class="active"><i class="fa fa-dashboard"></i> Nota Kirim</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
            <div class="box-header">
              <h3 class="box-title">Nota Kirim</h3>
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
                <th class="text-center">Tanggal Nota</th>
                <th class="text-center">No. Resi</th>
                <th class="text-center">Dari</th>
                <th class="text-center">Tujuan</th>
                <th class="text-center">Biaya Kirim</th>
                <th class="text-center"> Status </th>
                <th class="text-center">Detail</th>
              </tr>
              </thead>
             <tbody>
             <?php $__currentLoopData = $notakirim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="text-center"><?php echo e($key+1); ?></td>
                <td class="text-center"><?php echo e($n->tanggal); ?></td>
                <td class="text-center"><?php echo e($n->no_resi); ?></td>
                <td><?php echo e($n->pelanggans->nama); ?></td>
                <td><?php echo e($n->alamatpenerima); ?></td>
                <td>Rp. <?php echo e(number_format($n->biaya_kirim, 2, ',', '.')); ?></td>
                <td>
                  <?php if($n->status==1): ?>
                      Barang Masuk
                  <?php elseif($n->status==2): ?>
                      Barang Dikemas
                  <?php elseif($n->status==3): ?>
                      Barang Dikirim Ke Kantor Bali
                  <?php elseif($n->status==4): ?>
                      Barang Sampai Di Kantor Bali
                  <?php elseif($n->status==5): ?>
                      Barang Dibawa Kurir
                  <?php elseif($n->status==6): ?>
                      Barang Menuju Ke Alamat Penerima
                  <?php else: ?>
                      Barang Diterima
                  <?php endif; ?>
                </td>
                <td><a class="btn btn-success" href="<?php echo action('NotakirimController@detail',$n->id); ?>"><i class="fa fa-eye"></i></a></td> 
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