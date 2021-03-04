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
            {{ __('Detalles de ') }} {{ $resultado->titulo}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="background-color:black">
                    <div class="p-3 bg-white border-b border-gray-800" style="background-color:black">
                        <h2 style="color:white">
                            Titulo: {{ $resultado->titulo}}
                            <br><br>Año: {{ $resultado->anio}}
                            <br><br>Sinopsis:<br>

                            <textarea rows="4" cols="80" name="sinopsis" readonly
                            style="background-color: black;border-style: solid;border-color:black;border-width:
                            2px;color:white;resize: none;">{{ $resultado->sinopsis }}</textarea>
                            
                            <br>Duración: {{ $resultado->duracion }} m
                            <br><br>Pais: {{ $resultado->pais }}
                            <br><br>Director: {{ $nombreDirector }}
                            <br><br>Propietario: {{ $nombrePropietario }}
                            <br><br>Copias: {{ $resultado->copias }}
                        </h2>
                        
                        <img src="{{ asset('img/imagenesPeliculas/' . $resultado->imagen) }}" width="300" style="position:absolute;left:67%;top:30%;border-color: white;border-width: 2px;">
                    </div>

                    <!--La pelicula es tuya, te da opcion de eleminar, editar y ver los usuarios que la tiene ahora mismo-->
                    @if($nombrePropietario==Auth::user()->nombre)
                        <a href="{{route('peliculas.abrirEditar',[$resultado->id])}}"><br><input type="button" id="bt_editarPelicula" value="Editar datos"
                        style="background-color: #073844;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        <br>
                        <a href="{{route('peliculas.eliminar',[$resultado->id])}}"><br><input type="button" id="bt_eliminarPelicula" value="Eliminar pelicula"
                        style="background-color: #440707;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                       
                        @if(count($listaPersonasConMiPelicula)!=0)
                            <h2 style="color:white"><br><u>>Esta pelicula esta siendo prestada a:</u></h2>
                            @foreach($listaPersonasConMiPelicula as $p)
                            <h2 style="color:white">{{ $p }}</h2>
                            @endforeach
                        @endif
                    @else <!--Si no es tuya-->
                        <br><a href="{{url('prestamos/crearPrestamo',['usuario_id' => Auth::user()->id , 'pelicula_id' => $resultado->id , 'nCopias' => $resultado->copias])}}">
                        <input type="button" id="bt_PedirPrestada" value="Pedir prestada"
                         style="background-color: #440720;border-style: solid;border-width: 2px;color:white;width:140px;height:35px;"></a>
                        
                    @endif
                    <div class="p-3 bg-white border-b border-gray-800" style="background-color:black"></div>

                    <h2 style="color:white"><br><u>>Comentarios:</u><br></h2>
                    @if(count($comentarios)==0)
                        <h2 style="color:white"><br>¡Sea el primero en comentar esta pelicula!<br></h2>
                    @else
                        @foreach($comentarios as $c)
                        <h2 style="color:yellow"><br>#{{ $c["nombre"] }}:</h2><h2 style="color:white">{{ $c["contenido"]}} <br></h2>
                        @endforeach
                    @endif

                    
                    <br><textarea rows="3" cols="50" name="contenido" form="form_comentar"
                    style="background-color: #121212;border-style: solid;border-width: 2px;color:white"></textarea>
                    <br>
                    
                    <!--Asegurar que se escribe un comentario-->


                    <form action="{{route('peliculas.comentar')}}" method="POST" id=form_comentar>
                    @csrf
                        <?php $usuarioAuth = Auth::user()->id?>
                        <input type="hidden" name="usuario_id" value=" {{ $usuarioAuth }} "/>
                        <input type="hidden" name="pelicula_id" value="{{ $resultado->id }}" />

                        <div>
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </div>
                        
                        <br><input type="submit" id="bt_comentar" value="Publicar"
                        style="background-color: #330744;border-style: solid;border-width: 2px;color:white;width:140px;height:30px;resize: none">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
