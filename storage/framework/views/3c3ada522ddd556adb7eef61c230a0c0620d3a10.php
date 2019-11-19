<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail History Pengiriman 
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('jadwalpengiriman')); ?>" class="active"><i class="fa fa-dashboard"></i>Detail History Pengiriman</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box" style="overflow-y: scroll;"> <!-- penting untuk scroll -->
          <div class="box-header">
            <h3 class="box-title text-center">Data Detail History Pengiriman</h3>
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
                  <th class="text-center">No</th>
                  <th class="text-center">Kode Manifest </th>
                  <th class="text-center">Tanggal Manifest </th>
                  <th class="text-center">Daftar Resi  </th>
                  <th class="text-center">Status </th>
                  <th class="text-center">Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($value->manifest->no_manifest); ?></td>
                  <td><?php echo e($value->manifest->tanggal); ?></td>
                  <td style="padding-left: 20px">
                    <?php $__currentLoopData = $value->manifest->notakirims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(" - ".$val->no_resi); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td>
                    <?php $__currentLoopData = $value->manifest->notakirims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($val->status==1): ?>
                      Barang Masuk
                      <?php elseif($val->status==2): ?>
                      Barang Dikemas
                      <?php elseif($val->status==3): ?>
                      Barang Dikirim Ke Kantor Bali
                      <?php elseif($val->status==4): ?>
                      Barang Sampai Di Kantor Bali
                      <?php elseif($val->status==5): ?>
                      Barang Dibawa Kurir
                      <?php elseif($val->status==6): ?>
                      Barang Menuju Ke Alamat Penerima
                      <?php else: ?>
                      Barang Diterima
                      <?php endif; ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td class="text-center">
                    
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                 <form method="POST" action="<?php echo e(url("history/detail")); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>

                  <input type="hidden" name="iddetail">
                  <input type="hidden" name="historypengiriman_id" value="<?php echo e(isset($idhistory) ? $idhistory:null); ?>">
                  <td></td>
                  <td>
                    <input type="text" name="manifest" id="manifest" class="form-control" placeholder="Masukan Kode Manifest ..">
                    <input type="hidden" name="manifest_id" id="manifest_id">
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <button class="btn bnt-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                  </td>
                </form>
              </tr>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
  $('#hapus').click(function(){
    return confirm("Anda yakin untuk menghapus data ini?");
  });
</script>

<script>
  // $(function () {
  //   $('#example1').DataTable({
  //     'paging'      : true,
  //     'lengthChange': true,
  //     'searching'   : true,
  //     'ordering'    : true,
  //     'info'        : true,
  //     'autoWidth'   : true
  //   })

  // })

  $('#manifest').autocomplete({
    source:'<?php echo URL::route('autocomplete'); ?>',
    minlength:1,
    autoFocus:true,
    select:function(e,ui)
    { 
      $('#manifest').val(ui.item.value);
      $('#manifest_id').val(ui.item.id);
    }
  });

</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>