<?php $__env->startSection('contenido'); ?>

<?php if(!session('mensaje')): ?>
    <h2 class="mt-4">Confirmar venta </h2>
    <?php $__currentLoopData = $repuestos ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="mt-4"><strong>Repuesto:</strong> <?php echo e($item->nombre_repuesto); ?></p>
    <p class="mb-4"><strong>Precio:</strong> $ <?php echo e($item->precio); ?></p>
    <div class="input-group mb-3 col-sm-2" style="padding-left: 0px!important;">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Unidades</label>
    </div>    
    <form action="<?php echo e(route('venta.confirmar', $item->nombre_repuesto)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo e(csrf_field()); ?>     
        <select class="custom-select " id="inputGroupSelect01" name="unidades"> 
            <?php for($i = 1; $i <= $item->unidades; $i++): ?>
                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
            <?php endfor; ?>        
        </select>
        </div>
        <input type="hidden" name="precio" value="<?php echo e($item->precio); ?>">        
        <button class="btn btn-success" type="submit">Confirmar venta</button>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('mensaje')): ?>
    <div id="imp1">
        <h2 class="mt-4">Factura de venta</h2>
        <p class="mt-4 mb-4"><strong>Repuesto:</strong> <?php echo e($repuestos->nombre_repuesto); ?></p>
        <p class="mb-4"><strong>Precio unitario:</strong> <?php echo e($repuestos->precio); ?></p>
        <p class="mb-4"><strong>Unidades:</strong> 
            <?php if(session('unidades')): ?>
                <?php echo e(session('unidades')); ?>

            <?php endif; ?>
        </p>  
        <p class="mb-4"><strong>Precio total:</strong> <?php echo e($repuestos->precio); ?></p> 
    </div>  
    <button class="btn btn-success" type="submit" onclick="javascript:imprim1(imp1);">Imprimir factura</button>
    <a href="<?php echo e(route('inventario')); ?>" class="btn btn-secondary">Volver al inventario</a>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\casatoro\resources\views/repuesto/venta.blade.php ENDPATH**/ ?>