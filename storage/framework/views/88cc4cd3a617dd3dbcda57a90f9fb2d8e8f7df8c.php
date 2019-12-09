<?php $__env->startSection('contenido'); ?>
    <div id="imp1">
        <h2 class="mt-4">Factura de venta</h2>
        <p class="mt-4 mb-4"><strong>Repuesto:</strong> 
            <?php if(session('repuesto')): ?>
                <?php echo e(session('repuesto')); ?>

            <?php endif; ?>
        </p>
        <p class="mb-4"><strong>Precio unitario:</strong> 
            <?php if(session('precio')): ?>
                $ <?php echo e(session('precio')); ?>

            <?php endif; ?>
        </p>
        <p class="mb-4"><strong>Unidades:</strong> 
            <?php if(session('unidades')): ?>
                <?php echo e(session('unidades')); ?>

            <?php endif; ?>
        </p>  
        <p class="mb-4"><strong>Precio total:</strong> 
            <?php if(session('total')): ?>
                $ <?php echo e(session('total')); ?>

            <?php endif; ?>
        </p> 
    </div>  
    <button class="btn btn-success" type="submit" onclick="javascript:imprim1(imp1);">Imprimir factura</button>
    <a href="<?php echo e(route('inventario')); ?>" class="btn btn-secondary">Volver al inventario</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\casatoro\resources\views/factura.blade.php ENDPATH**/ ?>