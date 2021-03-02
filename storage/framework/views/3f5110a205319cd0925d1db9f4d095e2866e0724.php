<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Pelicula;
?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color:white">
            Editando <?php echo e($peliculaEditar->titulo); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:black">
                <form action="<?php echo e(route('peliculas.editar')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!--valor id que se debe pasar oculto para saber cual editar-->
                        <input type="hidden" name="id" value="<?php echo e($peliculaEditar->id); ?>" />

                        <label for="titulo" style="color:white;position:absolute;left:12%;top:29%">Titulo: </label>
                        <input type="text" name="titulo" value="<?php echo e($peliculaEditar->titulo); ?>" maxlength="40"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:370px;height:35px;
                        position:absolute;left:17%;top:28%"/>

                        <br><label for="anio" style="color:white;position:absolute;left:12%;top:35%">Año: </label>
                        <input type="number" name="anio" value="<?php echo e($peliculaEditar->anio); ?>"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:17%;top:34%"/>

                        <br><label style="color:white;position:absolute;left:12%;top:40.5%">Imagen: </label>
                        <input type="file" name="imagen"
                        style="color:white;width:450px;height:35px;
                        position:absolute;left:17%;top:40%"/>
                        <label style="color:white;position:absolute;left:17%;top:45%">No seleccionar una nueva imagen si desea dejar la anterior</label>

                        <br><label for="director" style="color:white;position:absolute;left:12%;top:51%">Director: </label>
                        <input type="text" name="director" value="<?php echo e($peliculaEditar->director->nombre); ?>" maxlength="22"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:220px;height:35px;
                        position:absolute;left:17%;top:50%"/>

                        <br><label for="pais" style="color:white;position:absolute;left:12%;top:57%">Pais: </label>
                        <input type="text" name="pais" value="<?php echo e($peliculaEditar->pais); ?>" maxlength="22"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:220px;height:35px;
                        position:absolute;left:17%;top:56%"/>

                        <br><label for="duracion" style="color:white;position:absolute;left:50%;top:29%">Duración: </label>
                        <input type="number" name="duracion" value="<?php echo e($peliculaEditar->duracion); ?>"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:56%;top:28%"/> m

                        <br><label for="sinopsis" style="color:white;position:absolute;left:50.3%;top:34.5%">Sinopsis: </label>
                        <br><textarea name="sinopsis" style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:400px;height:150px;position:absolute;left:56%;top:34%;resize: none;"><?php echo e($peliculaEditar->sinopsis); ?></textarea>

                        <br><label for="copias" style="color:white;position:absolute;left:46%;top:57%">Número de copias: </label>
                        <input type="number" name="copias" value="<?php echo e($peliculaEditar->copias); ?>"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:56%;top:56%"/>

                        <br><br><input type="submit" value="Guardar cambios"
                        style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"/>
                    </form>           
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/peliculas/editar.blade.php ENDPATH**/ ?>