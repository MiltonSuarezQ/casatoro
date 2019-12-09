<?php $__env->startSection('contenido'); ?>
<?php if(session('mensaje')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <?php echo e(session('mensaje')); ?>

        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex">
                <H1>Stock</H1>
                <button type="button" class="btn btn-success ml-auto" data-toggle="modal" data-target="#exampleModalLong">
                    <i class="fas fa-plus"></i> Agregar repuesto
                </button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
 <table class="table table-striped mt-4 table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Repuesto</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Ubicación</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $repuestos ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($item->nombre_repuesto); ?></th>
            <td> $ <?php echo e($item->precio); ?></td>
            <td><?php echo e($item->unidades); ?></td>
            <td><?php echo e($item->ubicacion); ?></td>
            <td class="text-center">
            <a href="<?php echo e(route('repuesto.venta', $item->nombre_repuesto)); ?>" class="btn btn-dark">Vender</a>
            </td>
        </tr>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo repuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo e(route('agregar')); ?>" method="POST">
      <div class="modal-body mt-4 mb-4">        
            <?php echo e(csrf_field()); ?>


            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El campo nombre es obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El campo precio es obligatorio
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <input type="text" name="nombre" placeholder="Nombre repuesto" class="form-control mb-2" value="<?php echo e(old('nombre')); ?>" required>
            <input type="number" name="precio" placeholder="Precio" class="form-control mb-2" value="<?php echo e(old('precio')); ?>" required>        
      </div><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-dark" type="submit">Agregar repuesto</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\casatoro\resources\views/inventario.blade.php ENDPATH**/ ?>