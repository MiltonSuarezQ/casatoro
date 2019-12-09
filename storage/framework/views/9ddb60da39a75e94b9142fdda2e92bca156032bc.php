<?php $__env->startSection('contenido'); ?>
 <h1 class="mt-4 mb-4">Stock</h1>
 <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre repuesto</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $repuestos ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <th scope="row"><?php echo e($item->id); ?></th>
            <td><?php echo e($item->nombre_repuesto); ?></td>
            <td><?php echo e($item->precio); ?></td>
            <td><?php echo e($item->created_at); ?></td>
        </tr>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\casatoro\resources\views/inventario.blade.php ENDPATH**/ ?>