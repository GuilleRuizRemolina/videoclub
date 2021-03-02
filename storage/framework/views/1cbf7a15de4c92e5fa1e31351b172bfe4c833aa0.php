<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Pelicula;
use App\Models\Director;

$contador=0
?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <?php if($director_id == 0): ?>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                <?php echo e(__('Peliculas')); ?>

            </h2>
        <?php else: ?>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                <?php echo e(__('Mostrando peliculas de ')); ?> <?php echo e($director_nombre); ?>

            </h2>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                        <!--Buclue para listar todas las peliculas cuando llegue un 0 en director_id y
                            listar solo las de un director cuando llege otro valor-->
                        <h2 style="color:white">>Seleccione una pelicula para ver más detalles:</h2> 
                        <?php $__currentLoopData = $listado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($director_id == 0 || $director_id == $p->director_id): ?>
                                <div class="p-3 bg-white border-b border-gray-400" style= "background-color: black">
                                    <h2 style= "color: white"><a href="<?php echo e(url('peliculas/detalles',[$p->id])); ?>"> <?php echo e($p->titulo); ?></a><br> </h2>
                                </div>
                                <!--<?php echo e($contador++); ?>-->
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($contador==0): ?>
                            <h2 style="color:white"><br>Este director no dispone de ninguna pelicula actualmente</h2>

                            <a href="<?php echo e(route('director.eliminar',[$director_id])); ?>"><br><input type="button" id="bt_eliminarDirector" value="Eliminar director"
                            style="background-color: #440707;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        <?php endif; ?>
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/listaPeliculas.blade.php ENDPATH**/ ?>