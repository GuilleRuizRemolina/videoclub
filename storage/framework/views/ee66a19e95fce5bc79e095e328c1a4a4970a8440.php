<!--********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************-->
<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                <?php echo e(__( 'Inicio')); ?>

            </h2>
     <?php $__env->endSlot(); ?>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:black">
                    <h2 style="color:white"><u>>¿Que es MovieShare?</u>
                    <br><br>MovieShare es un lugar donde los antiguos amantes del cine se pueden juntar de nuevo.<br>Conoce a nuevos
                    cinéfilos y descubres nuevas peliculas. En MovieShare puede pedir prestamos<br>de copias físicas de distintas
                    peliculas. También puede compartir sus peliculas para que otros se<br>las pidan. Redescubre el cine como nunca
                    antes con nuestro servicio<br><br></h2><h1 style="color:white">¡Bienvenido/a <?php echo e(Auth::user()->nombre); ?>!<br></h1>
                    <br><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => url('listaPeliculas'),'active' => request()->routeIs('peliculas')]]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(url('listaPeliculas')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('peliculas'))]); ?><input type="button" value="Ver peliculas disponibles"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:58%;"> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <br><br><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => url('listaDirectores'),'active' => request()->routeIs('directores')]]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(url('listaDirectores')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('directores'))]); ?><input type="button" value="Ver lista de directores"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:66%;"> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <br><br><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => url('misPeliculas',[Auth::user()->id]),'active' => request()->routeIs('mPeliculas')]]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(url('misPeliculas',[Auth::user()->id])),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('mPeliculas'))]); ?><input type="button" value="Ver su lista de peliculas"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:74%;"> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <br><br><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.nav-link','data' => ['href' => url('misPrestamos',[Auth::user()->id]),'active' => request()->routeIs('mPrestamos')]]); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(url('misPrestamos',[Auth::user()->id])),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('mPrestamos'))]); ?><input type="button" value="Ver sus prestamos solicitados"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:82%;"> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <img src="<?php echo e(asset('img/fondos/imagen_peliculas.jpg')); ?>" width="380" style="position:absolute;left:62%;top:28%;">
                    <br><br><br>
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
<?php /**PATH C:\xampp2021\htdocs\videoclub\resources\views/dashboard.blade.php ENDPATH**/ ?>