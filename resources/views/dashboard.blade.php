<!--********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************-->
<x-app-layout >
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                {{ __( 'Inicio') }}
            </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:black">
                    <h2 style="color:white"><u>>¿Que es MovieShare?</u>
                    <br><br>MovieShare es un lugar donde los antiguos amantes del cine se pueden juntar de nuevo.<br>Conoce a nuevos
                    cinéfilos y descubres nuevas peliculas. En MovieShare puede pedir prestamos<br>de copias físicas de distintas
                    peliculas. También puede compartir sus peliculas para que otros se<br>las pidan. Redescubre el cine como nunca
                    antes con nuestro servicio<br><br></h2><h1 style="color:white">¡Bienvenido/a {{Auth::user()->nombre}}!<br></h1>
                    <br><x-nav-link :href="url('listaPeliculas')" :active="request()->routeIs('peliculas')"><input type="button" value="Ver peliculas disponibles"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:58%;"></x-nav-link>
                    <br><br><x-nav-link :href="url('listaDirectores')" :active="request()->routeIs('directores')"><input type="button" value="Ver lista de directores"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:66%;"></x-nav-link>
                    <br><br><x-nav-link :href="url('misPeliculas',[Auth::user()->id])" :active="request()->routeIs('mPeliculas')"><input type="button" value="Ver su lista de peliculas"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:74%;"></x-nav-link>
                    <br><br><x-nav-link :href="url('misPrestamos',[Auth::user()->id])" :active="request()->routeIs('mPrestamos')"><input type="button" value="Ver sus prestamos solicitados"
                    style="background-color: rgb(3, 29, 59);border-style: solid;border-width: 2px;color:white;width:250px;height:35px;
                    position:absolute;left:28%;top:82%;"></x-nav-link>
                    <img src="{{ asset('img/fondos/imagen_peliculas.jpg') }}" width="380" style="position:absolute;left:62%;top:28%;">
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
