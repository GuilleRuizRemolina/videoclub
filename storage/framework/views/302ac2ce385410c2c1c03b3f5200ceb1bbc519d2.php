<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Prestamo;
?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            <?php echo e(__('Prestamos que he solicitado')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                    <table style="border-color:black;border-width: 3px;text-align: center;background-color: black;color:white">
                        <?php if(count($listado)==0): ?>
                            <h2 style="color:white">No ha solicitado ningún préstamo</h2>
                        <?php else: ?>
                            <tr>
                                <th>&nbsp;&nbsp;<u>Titulo</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;<u>Propietario</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;<u>Fecha</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                            
                                <?php $__currentLoopData = $listado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>&nbsp;&nbsp;<h2><?php echo e($p['titulo']); ?></h2>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;<?php echo e($p['nombrePro']); ?>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;<?php echo e($p['fecha']); ?>&nbsp;&nbsp;</td>
                                        <td>
                                            <a href="<?php echo e(route('prestamos.eliminar',[ 'prestamo_id' => $p['prestamo']->id , 'pelicula_id' => $p['prestamo']->pelicula_id])); ?>">
                                            <input type="button" id="bt_devolver" value="Devolver" style="background-color: #440720;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>&nbsp;&nbsp;&nbsp;
                                            <br>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        <?php endif; ?>
                    </table>
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/listaPrestamos.blade.php ENDPATH**/ ?>