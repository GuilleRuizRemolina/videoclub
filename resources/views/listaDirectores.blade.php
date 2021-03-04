<!--********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style= "color: white">
            {{ __('Directores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                <h2 style="color:white">>Seleccione un director para ver sus peliculas:</h2>
                <table style="border-color:black;border-width: 3px;text-align: center;background-color: black;color:white">
                    <tr><th>&nbsp;&nbsp;<u></u>&nbsp;&nbsp;</th></tr>
                    @foreach($listado as $d)
                    <tr>
                        <td>
                            <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                                <h2 style="color:white"><a href="{{url('listaPeliculas',[$d->id])}}"> {{ $d->nombre }}</a></h2>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
