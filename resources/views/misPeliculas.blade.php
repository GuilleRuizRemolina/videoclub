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
                    <a href="{{url('peliculas/nueva',[$propietario_id])}}"><input type="button" id="bt_nuevaPelicula" value="Nueva pelicula"
                    style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:40px;position:absolute;top:29%;left:79%"></a>
                    <table style="border-color:black;border-width: 3px;text-align: center;background-color: black;color:white">
                        <tr>
                            <th>&nbsp;&nbsp;<u>Titulo</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;<u>Imagen</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;<u>Copias</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;<u>Año</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;<u>Pais</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;<u>Duración</u>&nbsp;&nbsp;</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                        
                        @foreach($listado as $p)
                        <tr>
                            <td>&nbsp;&nbsp;<h2>{{ $p->titulo }}</h2>&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;<img src="{{ asset('img/imagenesPeliculas/' . $p->imagen) }}" width="125" style="border-color: white;border-width: 2px;">&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;{{ $p->copias }}&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;{{ $p->anio }}&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;{{ $p->pais }}&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;{{ $p->duracion . ' m'}}&nbsp;&nbsp;</td>
                            <td>
                                <a href="{{url('peliculas/detalles',[$p->id])}}">
                                <input type="button" id="bt_detalles" value="Detalles" style="background-color: #440720;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                        
                        <!--{{$contador++}}-->
                        @endforeach
                    </table>

                    @if($contador==0)
                        <h2 style="color:white">No dispone de ninguna pelicula ¡Añada su primera pelicula!</h2>
                        <br>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
