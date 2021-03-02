<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            <?php echo e(__('Editando mi usuario')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                    <form action="<?php echo e(route('usuario.editar')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!--valor id que se debe pasar oculto para saber cual editar-->
                        <input type="hidden" name="id" value="<?php echo e($usuarioEditar->id); ?>" />

                        <label for="Nombre" style="color:white;position:absolute;left:12%;top:29%">Nombre: </label>
                        <input type="text" name="nombre" value="<?php echo e($usuarioEditar->nombre); ?>" maxlength="40"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:280px;height:35px;
                        position:absolute;left:17%;top:28%"/>

                        <br><label for="Apellidos" style="color:white;position:absolute;left:12%;top:35%">Apellidos: </label>
                        <input type="text" name="apellidos" value="<?php echo e($usuarioEditar->apellidos); ?>" maxlength="40"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:280px;height:35px;
                        position:absolute;left:17%;top:34%"/>

                        <br><label for="Email" style="color:white;position:absolute;left:12%;top:41%">Email: </label>
                        <input type="text" name="email" value="<?php echo e($usuarioEditar->email); ?>" maxlength="30"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:280px;height:35px;
                        position:absolute;left:17%;top:40%"/>

                        <br><label style="color:white;position:absolute;left:12%;top:47%">Imagen: </label>
                        <input type="file" name="imagen"
                        style="color:white;width:450px;height:35px;
                        position:absolute;left:17%;top:46.5%"/>
                        <label style="color:white;position:absolute;left:17%;top:52%">No seleccionar una nueva imagen si desea dejar la que ya tiene</label>

                        <br><br><input type="submit" value="Guardar cambios"
                        style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;
                        position:absolute;left:12%;top:60%"/>
                        <br><br><br><br><br><br>
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/usuarioEditar.blade.php ENDPATH**/ ?>