<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
$contador=0 ?>
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            <?php echo e(__('Mis peliculas')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                <h2 style="color:white">>Seleccione una pelicula para ver más detalles:</h2>
                    <br>
                    <?php $__currentLoopData = $listado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-3 bg-white border-b border-gray-400" style="background-color: black">
                        <h2 style="color:white"><a href="<?php echo e(url('peliculas/detalles',[$p->id])); ?>"> <?php echo e($p->titulo); ?></a></h2>
                    </div>
                    <!--<?php echo e($contador++); ?>-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($contador==0): ?>
                        <h2 style="color:white">No dispone de ninguna pelicula ¡Añada su primera pelicula!</h2>
                        <br>
                    <?php endif; ?>
                    <br><a href="<?php echo e(url('peliculas/nueva',[$propietario_id])); ?>"><input type="button" id="bt_nuevaPelicula" value="Nueva pelicula"
                    style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/misPeliculas.blade.php ENDPATH**/ ?>