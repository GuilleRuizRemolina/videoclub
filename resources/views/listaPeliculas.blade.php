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

<x-app-layout>
    <x-slot name="header">
        @if($director_id == 0)
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                {{ __('Peliculas') }}
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
                {{ __('Mostrando peliculas de ') }} {{ $director_nombre}}
            </h2>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                        <!--Buclue para listar todas las peliculas cuando llegue un 0 en director_id y
                            listar solo las de un director cuando llege otro valor-->
                        <h2 style="color:white">>Seleccione una pelicula para ver más detalles:</h2> 
                        @foreach($listado as $p)
                            @if($director_id == 0 || $director_id == $p->director_id)
                                <div class="p-3 bg-white border-b border-gray-400" style= "background-color: black">
                                    <h2 style= "color: white"><a href="{{url('peliculas/detalles',[$p->id])}}"> {{ $p->titulo }}</a><br> </h2>
                                </div>
                                <!--{{$contador++}}-->
                            @endif
                        @endforeach
                        
                        @if($contador==0)
                            <h2 style="color:white"><br>Este director no dispone de ninguna pelicula actualmente</h2>

                            <a href="{{route('director.eliminar',[$director_id])}}"><br><input type="button" id="bt_eliminarDirector" value="Eliminar director"
                            style="background-color: #440707;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
