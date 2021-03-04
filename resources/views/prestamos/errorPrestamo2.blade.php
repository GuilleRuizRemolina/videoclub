<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Pelicula;
use App\Models\Director;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:#330505">
                    <h2 style="color:white">Ya cuenta con un prestamo para esta pelicula</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
