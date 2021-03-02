<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Prestamo;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            {{ __('Prestamos que he solicitado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                    <table style="border-color:black;border-width: 3px;text-align: center;background-color: black;color:white">
                        @if(count($listado)==0)
                            <h2 style="color:white">No ha solicitado ningún préstamo</h2>
                        @else
                            <tr>
                                <th>&nbsp;&nbsp;<u>Titulo</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;<u>Propietario</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;<u>Fecha</u>&nbsp;&nbsp;</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                            
                                @foreach($listado as $p)
                                    <tr>
                                        <td>&nbsp;&nbsp;<h2>{{ $p['titulo'] }}</h2>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;{{ $p['nombrePro'] }}&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;{{ $p['fecha'] }}&nbsp;&nbsp;</td>
                                        <td>
                                            <a href="{{route('prestamos.eliminar',[ 'prestamo_id' => $p['prestamo']->id , 'pelicula_id' => $p['prestamo']->pelicula_id])}}">
                                            <input type="button" id="bt_devolver" value="Devolver" style="background-color: #440720;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>&nbsp;&nbsp;&nbsp;
                                            <br>
                                        </td>
                                    </tr>
                                @endforeach
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
