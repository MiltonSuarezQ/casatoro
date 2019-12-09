<?php $__env->startSection('contenido'); ?>
 <h1 class="mt-4">Reporte ventas</h1>
 <?php if(session('unidades')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <?php echo e(session('unidades')); ?>

        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if(session('repuesto')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <?php echo e(session('repuesto')); ?>

        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if(session('precio')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <?php echo e(session('precio')); ?>

        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\casatoro\resources\views/reporte-ventas.blade.php ENDPATH**/ ?>