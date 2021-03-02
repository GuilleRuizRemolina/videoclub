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
            <?php echo e(__('Detalles de ')); ?> <?php echo e($resultado->titulo); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:black">
                    <div class="p-3 bg-white border-b border-gray-800" style="background-color:black">
                        <h2 style="color:white">
                            Titulo: <?php echo e($resultado->titulo); ?>

                            <br><br>Año: <?php echo e($resultado->anio); ?>

                            <br><br>Sinopsis:<br>

                            <textarea rows="4" cols="80" name="sinopsis" readonly
                            style="background-color: black;border-style: solid;border-color:black;border-width:
                            2px;color:white;resize: none;"><?php echo e($resultado->sinopsis); ?></textarea>
                            
                            <br>Duración: <?php echo e($resultado->duracion); ?> m
                            <br><br>Pais: <?php echo e($resultado->pais); ?>

                            <br><br>Director: <?php echo e($nombreDirector); ?>

                            <br><br>Propietario: <?php echo e($nombrePropietario); ?>

                            <br><br>Copias: <?php echo e($resultado->copias); ?>

                        </h2>
                        
                        <img src="<?php echo e(asset('img/imagenesPeliculas/' . $resultado->imagen)); ?>" width="300" style="position:absolute;left:67%;top:30%;border-color: white;border-width: 2px;">
                    </div>

                    <!--La pelicula es tuya, te da opcion de eleminar, editar y ver los usuarios que la tiene ahora mismo-->
                    <?php if($nombrePropietario==Auth::user()->nombre): ?>
                        <a href="<?php echo e(route('peliculas.abrirEditar',[$resultado->id])); ?>"><br><input type="button" id="bt_editarPelicula" value="Editar datos"
                        style="background-color: #073844;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        <br>
                        <a href="<?php echo e(route('peliculas.eliminar',[$resultado->id])); ?>"><br><input type="button" id="bt_eliminarPelicula" value="Eliminar pelicula"
                        style="background-color: #440707;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                       
                        <?php if(count($listaPersonasConMiPelicula)!=0): ?>
                            <h2 style="color:white"><br><u>>Esta pelicula esta siendo prestada a:</u></h2>
                            <?php $__currentLoopData = $listaPersonasConMiPelicula; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h2 style="color:white"><?php echo e($p); ?></h2>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php else: ?> <!--Si no es tuya-->
                        <br><a href="<?php echo e(url('prestamos/crearPrestamo',['usuario_id' => Auth::user()->id , 'pelicula_id' => $resultado->id , 'nCopias' => $resultado->copias])); ?>">
                        <input type="button" id="bt_PedirPrestada" value="Pedir prestada"
                         style="background-color: #440720;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        
                    <?php endif; ?>
                    <div class="p-3 bg-white border-b border-gray-800" style="background-color:black"></div>

                    <h2 style="color:white"><br><u>>Comentarios:</u><br></h2>
                    <?php if(count($comentarios)==0): ?>
                        <h2 style="color:white"><br>¡Sea el primero en comentar esta pelicula!<br></h2>
                    <?php else: ?>
                        <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2 style="color:yellow"><br>#<?php echo e($c["nombre"]); ?>:</h2><h2 style="color:white"><?php echo e($c["contenido"]); ?> <br></h2>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
                    <br><textarea rows="3" cols="50" name="contenido" form="form_comentar"
                    style="background-color: #121212;border-style: solid;border-width: 2px;color:white"></textarea>
                    <br>

                    <form action="<?php echo e(route('peliculas.comentar')); ?>" method="POST" id=form_comentar>
                    <?php echo csrf_field(); ?>
                        <?php $usuarioAuth = Auth::user()->id?>
                        <input type="hidden" name="usuario_id" value=" <?php echo e($usuarioAuth); ?> "/>
                        <input type="hidden" name="pelicula_id" value="<?php echo e($resultado->id); ?>" />

                        <br><input type="submit" id="bt_comentar" value="Publicar"
                        style="background-color: #330744;border-style: solid;border-width: 2px;color:white;width:140px;height:30px;resize: none">
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/peliculas/detalles.blade.php ENDPATH**/ ?>