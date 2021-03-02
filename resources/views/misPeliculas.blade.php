<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
$contador=0 ?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            {{ __('Mis peliculas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                <h2 style="color:white">>Seleccione una pelicula para ver más detalles:</h2>
                    <br>
                    @foreach($listado as $p)
                    <div class="p-3 bg-white border-b border-gray-400" style="background-color: black">
                        <h2 style="color:white"><a href="{{url('peliculas/detalles',[$p->id])}}"> {{ $p->titulo }}</a></h2>
                    </div>
                    <!--{{$contador++}}-->
                    @endforeach

                    @if($contador==0)
                        <h2 style="color:white">No dispone de ninguna pelicula ¡Añada su primera pelicula!</h2>
                        <br>
                    @endif
                    <br><a href="{{url('peliculas/nueva',[$propietario_id])}}"><input type="button" id="bt_nuevaPelicula" value="Nueva pelicula"
                    style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
