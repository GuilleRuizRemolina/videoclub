<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use App\Models\Pelicula;
use App\Models\Director;
use App\Models\User;
use App\Models\Prestamo;
use App\Models\Comentario;

class peliculasController extends Controller
{
    //funcion encargada de listar las peliculas, si le llega director_id=0 lista todas, si le llega cualquier otro director_id
    //listara las peliuculas de ese director
    public function listarPeliculas($director_id=0) //valor por defecto 0 para listarlas todas
    {
        $nombreDirector = "";
        //calcular nombre de director
        if($director_id!=0)
        {
            $directores = Director::all();

            foreach($directores as $d)
            {
                if($d->id == $director_id)
                {
                    $nombreDirector = $d->nombre;
                }
            }
        }

        $peliculas = Pelicula::all();

        return view('listaPeliculas',['listado' => $peliculas,
                                      'director_id' => $director_id,
                                      'director_nombre' => $nombreDirector]);
    }

    //funcion que proporciona los detalles de una pelicula identificada por su id, tambien carga sus comentarios
    public function detallePelicula($id)
    {
        $peliculas = Pelicula::all();
        $directores = Director::all();
        $propietarios = User::all();
        $prestamos = Prestamo::all();
        $comentarios = Comentario::all();

        foreach($peliculas as $p)
        {
            if($p->id == $id)
            {
                $resultado = $p;

                //hallar director
                foreach($directores as $d)
                {
                    if($d->id == $p->director_id)
                    {
                        $nombreDirector = $d->nombre;
                    }
                }

                //hallar propietario
                foreach($propietarios as $u)
                {
                    if($u->id == $p->propietario_id)
                    {
                        $nombrePropietario = $u->nombre;
                    }
                }

                //hallar personas que tiene esta pelicula prestada
                $personasConMiPelicula = array();
                $usuario_id;
                foreach($prestamos as $pre)
                {
                    if($pre->pelicula_id == $id)
                    {
                        $usuario_id = $pre-> usuarioRecibe_id;
                        //calcular el nombre de esa persona
                        foreach($propietarios as $p)
                        {
                            if($p->id == $usuario_id)
                            {
                                array_push($personasConMiPelicula, $p->nombre);
                            }
                        }
                    }
                }

                //hallar los comentarios de esa pelicula
                $arrayComentarios = array();

                foreach($comentarios as $c)
                {
                    if($c->pelicula_id == $id)
                    {
                        //calcular nombre
                        foreach($propietarios as $u)
                        {
                            if($u->id == $c->usuario_id)
                            {
                                $comentario = [
                                    "nombre" => $u->nombre,
                                    "contenido" => $c->contenido
                                ];
                            }
                        }
                        array_push($arrayComentarios,$comentario);
                    }
                }
            }
        }

        return view('peliculas/detalles',['resultado' => $resultado ,
                                         'nombreDirector' => $nombreDirector,
                                         'nombrePropietario' => $nombrePropietario,
                                         'listaPersonasConMiPelicula' => $personasConMiPelicula,
                                         'comentarios' => $arrayComentarios]);
    }

    //funcion que lista todos los directores
    public function listarDirectores()
    {
        $directores = Director::all();

        return view('listaDirectores',['listado' => $directores]);
    }

    //funcion que carga el listado de las peliculas que tiene un usuario por su usuario_id
    public function calcularListadoMisPelis($usuario_id)
    {
        $peliculas = Pelicula::all();

        $misPeliculas = array();

        foreach($peliculas as $p)
        {
            if($p->propietario_id == $usuario_id)
            {
                array_push($misPeliculas, $p);
            }
        }

        return $misPeliculas;
    }

    //funcion que muestra dicho listado calculado en la funcion anterior
    public function listarMisPelis($usuario_id) 
    {
        return view('misPeliculas',['listado' => peliculasController::calcularListadoMisPelis($usuario_id),
                                    'propietario_id' => $usuario_id]);
        
    }

    //funcion encargada de abrir el formulario para añadir una pelicula
    public function abrirAnadir($usuario_id)
    {
        return view('peliculas/nueva',['propietario_id' => $usuario_id]);
    }

    //funcion que recoge los datos del formulario y añade la pelicula a la base de datos
    public function anadir(Request $request)
    {
        $existeDirector='false';

        $titulo = $request->input('titulo');
        $anio = $request->input('anio');
        $sinopsis = $request->input('sinopsis');
        $duracion = $request->input('duracion');
        $pais = $request->input('pais');
        $copias = $request->input('copias');
        $propietario_id = $request->input('propietario_id');
        $nombreDirector = $request->input('director');

        //comprobar formulario
        if(peliculasController::comprobarFormulario($titulo,$anio,$nombreDirector,$sinopsis,$duracion,$pais,$copias)==true)
        {
            //imagen

            //si no me ha llegado ninguna imagen ponemos una por defecto
            if($_FILES['imagen']['name']==null)
            {
                $nombreFicheroImagen = 'sin_imagen.png';

                $destino = '../public/img/imagenesPeliculas/' . $nombreFicheroImagen;
            }
            else
            {
                //asegurarnos que el nombre va a ser unico
                $nombreFicheroImagen = time() . '-' . $_FILES['imagen']['name'];

                $destino = '../public/img/imagenesPeliculas/' . $nombreFicheroImagen;

                $origen = $_FILES['imagen']['tmp_name'];

                //mover el fichero de la carpeta temporal a la nuestra
                $moverFicheroImagen = move_uploaded_file($origen,$destino);
            }

            //comprobar si director existe

            $directores = Director::all();

            //aqui debemos contemplar si el director que se ha puesto existe ya en la base de datos o no, en caso de que
            //no exita debemos crear uno nuevo
            foreach($directores as $d)
            {
                //si existe un director
                if($d->nombre == $nombreDirector)
                {
                    $director_id = $d->id;
                    $existeDirector='true';
                }
            }

            if($existeDirector=='false') //si no hay un director con ese nombre
            {
                $director_id = peliculasController::nuevoDirector($nombreDirector);
            }

            DB::insert('INSERT INTO peliculas (titulo, anio,sinopsis,duracion,pais,imagen,copias,propietario_id,director_id)
            values(:titulo,:anio,:sinopsis,:duracion,:pais,:imagen,:copias,:propietario_id,:director_id)',
            [
                'titulo'=>$titulo,
                'anio'=>$anio,
                'sinopsis'=>$sinopsis,
                'duracion'=>$duracion,
                'pais'=>$pais,
                'imagen'=>$nombreFicheroImagen,
                'copias'=>$copias,
                'propietario_id'=>$propietario_id,
                'director_id'=>$director_id
            ]);

            return view('misPeliculas',['listado' => peliculasController::calcularListadoMisPelis($propietario_id),
                                        'propietario_id' => $propietario_id]);
        }
        else
        {
            return view('peliculas/nueva',['propietario_id' => $propietario_id]);
        }
    }

    //funcion que elimina una pelicula por su pelicula_id
    public function eliminar($pelicula_id)
    {
        //no dejar borrar la pelicula si existe prestamos
        $prestamos = Prestamo::all();
        $prestamosExistentes = 'false';

        foreach($prestamos as $pre)
        {
            if($pre->pelicula_id == $pelicula_id)
            {
                $prestamosExistentes = 'true';
            }
        }

        if($prestamosExistentes=='true')
        {
            return view('peliculas/errorBorrarPelicula');
        }
        else
        {
            DB::delete('DELETE FROM peliculas WHERE id = :id', ['id' =>$pelicula_id]);

            return view('peliculas/mensajeEliminar');
        }
    }

    //funcion que abre el fomrulario para editar una pelicula
    public function abrirEditar($pelicula_id)
    {
        $peliculas = Pelicula::all();

        foreach($peliculas as $p)
        {
            if($p->id == $pelicula_id)
            {
                $peliculaEditar = $p;
            }
        }

        return view('peliculas/editar',['peliculaEditar' => $peliculaEditar]);
    }

    //funcion que recoge los datos del formulario y edita dicha pelicula
    public function editar(Request $request)
    {
        $existeDirector='false';

        //llega en el request el valor del nombre del director,
        //buscaremos con el nombre del director su id para hacer el update
        $nombreDirector = $request->director;

        $directores = Director::all();

        //aqui debemos contemplar si el director que se ha puesto existe ya en la base de datos o no, en caso de que
        //no exita debemos crear uno nuevo
        foreach($directores as $d)
        {
            //si existe un director
            if($d->nombre == $nombreDirector)
            {
                $director_id = $d->id;
                $existeDirector='true';
            }
        }

        if($existeDirector=='false') //si no hay un director con ese nombre
        {
            $director_id = peliculasController::nuevoDirector($nombreDirector);
        }
        
        if($_FILES['imagen']['name']!=null) //si se ha metido una nueva imagen
        {
            
            $nombreFicheroImagen = time() . '-' . $_FILES['imagen']['name'];

            //mover el fichero de la carpeta temporal a la nuestra
            $destino = '../public/img/imagenesPeliculas/' . $nombreFicheroImagen;

            $origen = $_FILES['imagen']['tmp_name'];

            $moverFicheroImagen = move_uploaded_file($origen,$destino);

            //actualizar la imagen
            DB::update('UPDATE peliculas SET imagen = :imagen WHERE id =:id ', [
                'id' => $request->id,
                'imagen' => $nombreFicheroImagen
                ]);
        }


        DB::update('UPDATE peliculas SET 
        titulo = :titulo,
        anio= :anio,
        sinopsis = :sinopsis,
        duracion = :duracion,
        pais = :pais,
        copias = :copias,
        director_id = :director_id
        WHERE id =:id ',
        [
        'id' => $request->id,
        'titulo' => $request->titulo,
        'anio' => $request->anio,
        'sinopsis'=> $request->sinopsis,
        'duracion'=> $request->duracion,
        'pais'=> $request->pais,
        'copias'=> $request->copias,
        'director_id'=> $director_id
        ]);

        return view('peliculas/mensajeEditar');
    }

    //funcion que se ejecuta automaticamente cuando el usuario crea una pelicula con un nuevo editor o cuando al añadin una pelicula
    //introduce un director que no existe en al base de datos
    public function nuevoDirector($nombreDirector)
    {
        DB::insert('INSERT INTO directores (nombre)
        values(:nombre)',
        [
            'nombre'=>$nombreDirector
        ]);

        $directores = Director::all();

        //hallar el id del nuevo director creado para incluirlo en el update de la pelicula
        foreach($directores as $d)
        {
            if($d->nombre == $nombreDirector)
            {
                $director_id = $d->id;
            }
        }

        return $director_id;
    }

    //funcion encargada de listar los prestamos solicitados por un usuario
    public function listarPrestamosSolicitados($usuario_id)
    {
        $arrayDatos = array();
        $dato = array();

        $prestamos = Prestamo::all();

        $peliculas = Pelicula::all();

        $usuarios = User::all();

        foreach($prestamos as $pre)
        {
            if($pre->usuarioRecibe_id == $usuario_id)
            {
                $fecha = $pre-> fecha;

                //hallar nombre pelicula
                foreach($peliculas as $p)
                {
                    if($p->id == $pre->pelicula_id) //si la pelicula la tienes en tus prestamos
                    {
                        $titulo = $p->titulo;
                        
                        //hallar usuario propietario
                        foreach($usuarios as $u)
                        {
                            if($p->propietario_id == $u->id)
                            {
                                $nombrePro = $u->nombre;
                            }
                        }
                    }
                }

                $dato = ["fecha" => $fecha,
                "titulo" => $titulo,
                "nombrePro" => $nombrePro,
                "prestamo" => $pre]; //este es para luego poder pasar la id a la hora de eliminar

                array_push($arrayDatos, $dato);
            }
        }

        //print_r($arrayDatos);

        return view('listaPrestamos',['listado' => $arrayDatos]);
    }

    //funcion que crea un prestamo de forma automatica al pedir un rpestamo en una pelicula
    public function crearPrestamo($usuario_id,$pelicula_id,$nCopias)
    {   
        if($nCopias!=0) //cotrolar que haya copias para ahcer un prestamo
        {
            //controlar que no tengas ya una copia de esa pelicula con este usuario
            $prestamoRepetido = 'false';
            $prestamos = Prestamo::all();

            foreach($prestamos as $pre)
            {
                if($pre->pelicula_id == $pelicula_id && $pre->usuarioRecibe_id == $usuario_id)  //si se tiene un prestamo con la pelicula que se esta pidiendo
                {
                    $prestamoRepetido = 'true';
                }
            }

            if($prestamoRepetido=='false')
            {
                DB::insert('INSERT INTO prestamos (fecha, usuarioRecibe_id,pelicula_id)
                values(:fecha,:usuarioRecibe_id,:pelicula_id)',
                [
                    'fecha'=> date("Y-m-d G:i:s"),
                    'usuarioRecibe_id'=>$usuario_id,
                    'pelicula_id'=>$pelicula_id
                ]);
        
                //quitar una copia de esa pelicula
                DB::update('UPDATE peliculas SET 
                    copias = :copias
                WHERE id =:id ',
                [
                'id' => $pelicula_id,
                'copias'=> ($nCopias - 1)
                ]);
        
                return view('prestamos/crearPrestamo');
            }
            elseif($prestamoRepetido=='true')
            {
                return view('prestamos/errorPrestamo2');
            }
        }
        else
        {
            return view('prestamos/errorPrestamo1');
        }
    }

    //funcion encargada de eliminar un prestamo cunado el usuario devuelve una pelicula
    public function eliminarPrestamo($prestamo_id,$pelicula_id)
    {         
        DB::delete('DELETE FROM prestamos WHERE id = :id', ['id' =>$prestamo_id]);

        //hallar el numero de copias para actualizarlo
        $peliculas = Pelicula::all();

        foreach($peliculas as $p)
        {
            if($p->id == $pelicula_id)
            {
                $nCopias = $p->copias;
            }
        }

        DB::update('UPDATE peliculas SET 
                    copias = :copias
                    WHERE id =:id ',
                    [
                    'id' => $pelicula_id,
                    'copias'=> ($nCopias + 1)
                    ]);

        return view('prestamos/prestamoDevuelto');
    }

    //funcion que se encarga de la creación de comentarios
    public function comentario(Request $request)
    {
        $contenido = $request->input('contenido');
        $usuario_id = $request->input('usuario_id');
        $pelicula_id = $request->input('pelicula_id');

        DB::insert('INSERT INTO comentarios (contenido, usuario_id,pelicula_id)
        values(:contenido,:usuario_id,:pelicula_id)',
        [
            'contenido'=> $contenido,
            'usuario_id'=>$usuario_id,
            'pelicula_id'=>$pelicula_id
        ]);

        return view('peliculas/mensajeComentario');
    }

    //funcion que se ejecuta cuando se elimina un director sin peliculas
    public function eliminarDirector($director_id)
    {
        DB::delete('DELETE FROM directores WHERE id = :id', ['id' =>$director_id]);

        return view('dashboard');
    }

    //funcion encargada de abrir el formulario de editar usuario
    public function abrirEditarUsuario($usuario_id)
    {
        $usuarios = User::all();

        foreach($usuarios as $u)
        {
            if($u->id == $usuario_id)
            {
                $usuarioEditar = $u;
            }
        }

        return view('usuarioEditar',['usuarioEditar' => $usuarioEditar]);
    }

    //funcion encargaa de recoger los datos y editar dicho usuario
    public function editarUsuario(Request $request)
    {
        $usuario_id = $request->id;

        if($_FILES['imagen']['name']!=null) //si se ha metido una nueva imagen
        {
            
            $nombreFicheroImagen = time() . '-' . $_FILES['imagen']['name'];

            //mover el fichero de la carpeta temporal a la nuestra
            $destino = '../public/img/imagenesPerfiles/' . $nombreFicheroImagen;

            $origen = $_FILES['imagen']['tmp_name'];

            $moverFicheroImagen = move_uploaded_file($origen,$destino);

            //actualizar la imagen
            DB::update('UPDATE users SET imagen = :imagen WHERE id =:id ', [
                'id' => $usuario_id,
                'imagen' => $nombreFicheroImagen
                ]);
        }

        DB::update('UPDATE users SET 
        nombre = :nombre,
        email = :email,
        apellidos = :apellidos
        WHERE id = :id ',
        [
        'id' => $usuario_id,
        'nombre' => $request->nombre,
        'email' => $request->email,
        'apellidos' => $request->apellidos
        ]);

        return view('mensajeEditarUsuario');
    }

    //funcion para comprobar un formulario
    public function comprobarFormulario($titulo,$anio,$nombreDirector,$sinopsis,$duracion,$pais,$copias)
    {
        $error=false;

        if($titulo==null)
        {
            ?><script>alert('Porfavor rellene el campo titulo');</script><?php
            $error=true;
        }
        elseif($anio==null)
        {
            ?><script>alert('Porfavor rellene el campo año');</script><?php
            $error=true;
        }
        elseif($anio<=0 || $anio>=9999)
        {
            ?><script>alert('El año introducido es invalido');</script><?php
            $error=true;
        }
        elseif($nombreDirector==null)
        {
            ?><script>alert('Porfavor rellene el campo director');</script><?php
            $error=true;
        }
        elseif($pais==null)
        {
            ?><script>alert('Porfavor rellene el campo pais');</script><?php
            $error=true;
        }
        elseif($duracion==null)
        {
            ?><script>alert('Porfavor establezca una duración');</script><?php
            $error=true;
        }
        elseif($duracion<=0 || $duracion>=9999)
        {
            ?><script>alert('La duración introducida es invalida');</script><?php
            $error=true;
        }
        elseif($sinopsis==null)
        {
            ?><script>alert('Porfavor rellene el campo sinopsis');</script><?php
            $error=true;
        }
        elseif($copias==null)
        {
            ?><script>alert('Porfavor establezca un número de copias');</script><?php
            $error=true;
        }
        elseif($copias<=0 || $copias>=9999)
        {
            ?><script>alert('El número de copias introducido es invalido');</script><?php
            $error=true;
        }

        if($error==true)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
