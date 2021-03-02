<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use App\Models\Pelicula;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="color:white">
            Nueva pelicula
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color: black">
                    <form action="{{route('peliculas.anadir')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--valor id que se debe pasar oculto para saber el propietario-->
                        <input type="hidden" name="propietario_id" value="{{ $propietario_id }}" />

                        <label for="titulo" style="color:white;position:absolute;left:12%;top:29%">Titulo: </label>
                        <input type="text" name="titulo" maxlength="40"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:370px;height:35px;
                        position:absolute;left:17%;top:28%"/>

                        <br><label for="anio" style="color:white;position:absolute;left:12%;top:35%">Año: </label>
                        <input type="number" name="anio"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:17%;top:34%"/>

                        <br><label style="color:white;position:absolute;left:12%;top:40.5%">Imagen: </label>
                        <input type="file" name="imagen"
                        style="color:white;width:450px;height:35px;
                        position:absolute;left:17%;top:40%"/>

                        <br><label for="director" style="color:white;position:absolute;left:12%;top:46%">Director: </label>
                        <input type="text" name="director" maxlength="22"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:220px;height:35px;
                        position:absolute;left:17%;top:45%"/>

                        <br><label for="pais" style="color:white;position:absolute;left:12%;top:52%">Pais: </label>
                        <input type="text" name="pais" maxlength="22"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:220px;height:35px;
                        position:absolute;left:17%;top:51%"/>

                        <br><label for="duracion" style="color:white;position:absolute;left:50%;top:29%">Duración: </label>
                        <input type="number" name="duracion"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:56%;top:28%"/> m

                        <br><label for="sinopsis" style="color:white;position:absolute;left:50.3%;top:34.5%">Sinopsis: </label>
                        <br><textarea name="sinopsis" style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:400px;height:150px;position:absolute;left:56%;top:34%;resize: none;"></textarea>

                        <br><label for="copias" style="color:white;position:absolute;left:46%;top:57%">Número de copias: </label>
                        <input type="number" name="copias"
                        style="background-color: #121212;border-style: solid;border-width: 2px;color:white;width:90px;height:35px;
                        position:absolute;left:56%;top:56%"/>

                        <br><br><input type="submit" value="Crear pelicula"
                        style="background-color: #063b21;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
