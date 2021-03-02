<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class datos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users

        DB::table('users')->insert(array('nombre'=>'Guillermo',
        'apellidos'=>'Ruiz Remolina',
        'password'=>'$2y$10$pjP3T4.i8G0BpUe2rDrpm.9BhDCFLi71Cv/M4ZIdGRVUL5HMOSMwm',
        'email' =>'g@gmail.com',
        'imagen' => '1614685632-admin.png' ) );

        DB::table('users')->insert(array('nombre'=>'Dani',
        'apellidos'=>'Gomez Vazquez',
        'password'=>'$2y$10$pjP3T4.i8G0BpUe2rDrpm.9BhDCFLi71Cv/M4ZIdGRVUL5HMOSMwm',
        'email' =>'d@gmail.com',
        'imagen' => '1608140220-chrome_m05PS6vRit.png' ) );

        DB::table('users')->insert(array('nombre'=>'Susan',
        'apellidos'=>'Etterwood',
        'password'=>'$2y$10$pjP3T4.i8G0BpUe2rDrpm.9BhDCFLi71Cv/M4ZIdGRVUL5HMOSMwm',
        'email' =>'s@gmail.com',
        'imagen' => '1608140623-chrome_tExjbaIHcl.png' ) );

        DB::table('users')->insert(array('nombre'=>'Carol',
        'apellidos'=>'Lusey',
        'password'=>'$2y$10$pjP3T4.i8G0BpUe2rDrpm.9BhDCFLi71Cv/M4ZIdGRVUL5HMOSMwm',
        'email' =>'c@gmail.com',
        'imagen' => '1608141377-chrome_sF996xbvQh.png' ) );

        DB::table('users')->insert(array('nombre'=>'Prueba',
        'apellidos'=>'Shanchez',
        'password'=>'$2y$10$pjP3T4.i8G0BpUe2rDrpm.9BhDCFLi71Cv/M4ZIdGRVUL5HMOSMwm',
        'email' =>'p@gmail.com',
        'imagen' => '1614680783-prueba.jpg' ) );

        //peliculas

        DB::table('peliculas')->insert(array('titulo'=>'Ameli',
        'anio'=>'2000',
        'sinopsis'=>'La película narra la historia de la joven camarera Amélie Poulain, quien el mismo día que se entera de que Lady Di fallece en un accidente de tráfico, descubre que en su baño hay una pequeña caja que contiene juguetes, fotografías y cromos que un chico escondió cuarenta años atrás',
        'duracion' =>'120',
        'pais' => 'Francia',
        'imagen' => '1614366893-8614360105-ameli_foto.jpg',
        'copias' => '4',
        'propietario_id' => '1',
        'director_id' => '1' ) );

        DB::table('peliculas')->insert(array('titulo'=>'El laberinto del fauno',
        'anio'=>'1999',
        'sinopsis'=>'La acción de El laberinto del fauno se desarrolla en la España de 1944. Las tropas nacionales persiguen a sus enemigos, los rebeldes republicanos, que se esconden en el bosque. Su jefe, el capitán Vidal, es un militar fuerte y cruel cuyo objetivo es eliminar esa resistencia matando a los rebeldes sin piedad',
        'duracion' =>'140',
        'pais' => 'España',
        'imagen' => '487956157613-848454546-El_laberinto_del_fauno.jpg',
        'copias' => '6',
        'propietario_id' => '1',
        'director_id' => '2' ) );

        DB::table('peliculas')->insert(array('titulo'=>'El espinazo del diablo',
        'anio'=>'1999',
        'sinopsis'=>'Trascurre el año 1939, recién finalizada la guerra civil. Carlos, un niño de diez años, llega a un orfanato que acoge a huérfanos de víctimas republicanas. Su presencia alterará la rutina diaria de un colegio dirigido por Carmen y cuyo profesor, el señor Casares, simpatiza con la perdida causa republicana. Además le acechará el fantasma de uno de los antiguos ocupantes del orfanato',
        'duracion' =>'90',
        'pais' => 'España',
        'imagen' => '7854521569-elespinzadodeldiablo.jpg',
        'copias' => '3',
        'propietario_id' => '3',
        'director_id' => '2' ) );

        DB::table('peliculas')->insert(array('titulo'=>'Her',
        'anio'=>'2010',
        'sinopsis'=>'En un futuro cercano, Theodore, un escritor solitario con un divorcio traumático a cuestas, adquiere un nuevo sistema operativo para su teléfono y ordenador. Su nombre es Samantha y está basado en un avanzado modelo de Inteligencia Artificial diseñado para satisfacer todas las necesidades del usuario',
        'duracion' =>'120',
        'pais' => 'USA',
        'imagen' => '481503906-Her.jpg',
        'copias' => '7',
        'propietario_id' => '4',
        'director_id' => '3' ) );

        DB::table('peliculas')->insert(array('titulo'=>'Ran',
        'anio'=>'1985',
        'sinopsis'=>'Basada en la obra de Shakespeare El rey Lear y adaptada al Japón de la Edad Media, el film narra la historia de Hidetora Ichimonji (Tatsuya Nakadai), un poderoso hombre que decide dejar el poder y abdicar en sus tres hijos, repartiendo todo su patrimonio y pertenencias. El menor de ellos, Saburo (Daisuke Ryu), se mostrará contrario a la decisión de su padre y la considerará una fuente de futuros problemas que podría causar mucho daño. El padre, ante semejante afrenta, se sentirá traicionado por su desagradecido hijo y tomará una decisión radical: desheredarlo y desterrarlo. El patriarca del clan pronto se dará cuenta del error cometido al comenzar una batalla cruenta y sin piedad en la que sus dos hijos mayores lucharán por alcanzar el poder absoluto que su padre pretendía cederles a ambos',
        'duracion' =>'140',
        'pais' => 'Japon',
        'imagen' => '587728377-Ran.png',
        'copias' => '5',
        'propietario_id' => '2',
        'director_id' => '4' ) );

        DB::table('peliculas')->insert(array('titulo'=>'El color del paraiso',
        'anio'=>'1990',
        'sinopsis'=>'El Color del Paraíso es una película iraní dirigida por Mayid Mayidí que relata el conflicto entre un padre viudo que quiere rehacer su vida y un hijo ciego que supone un obstáculo para sus planes. En ella se puede evidenciar, el sentido de la vida, y la realidad de Dios que se esconde',
        'duracion' =>'90',
        'pais' => 'Irani',
        'imagen' => '8648546416-el-color-del paraiso.jpg',
        'copias' => '1',
        'propietario_id' => '2',
        'director_id' => '5' ) );

        //directortes

        DB::table('directores')->insert(array('nombre'=>'Jean-Pierre Jeunet') );

        DB::table('directores')->insert(array('nombre'=>'Guillermo del Toro') );

        DB::table('directores')->insert(array('nombre'=>'Spike Jonze') );

        DB::table('directores')->insert(array('nombre'=>'Akira Kurosawa') );

        DB::table('directores')->insert(array('nombre'=>'Majid Majidi') );

        //prestamos

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'3',
        'pelicula_id'=>'1' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'2',
        'pelicula_id'=>'1' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'2',
        'pelicula_id'=>'2' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'4',
        'pelicula_id'=>'3' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'3',
        'pelicula_id'=>'4' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'4',
        'pelicula_id'=>'5' ) );

        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'1',
        'pelicula_id'=>'4' ) );
    
        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'1',
        'pelicula_id'=>'5' ) );
    
        DB::table('prestamos')->insert(array(
        'usuarioRecibe_id'=>'1',
        'pelicula_id'=>'3' ) );

        //comentarios

        DB::table('comentarios')->insert(array('contenido'=>'Madre mia con la niña',
        'usuario_id'=>'1',
        'pelicula_id'=>'2' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Ameli es una pelicula que hay que ver más de una vez',
        'usuario_id'=>'2',
        'pelicula_id'=>'1' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Os recomiendo esta pelicula, suspense constante',
        'usuario_id'=>'3',
        'pelicula_id'=>'3' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Me gusto mucho! Muy recomendable',
        'usuario_id'=>'4',
        'pelicula_id'=>'5' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Mi pelicula favorita',
        'usuario_id'=>'1',
        'pelicula_id'=>'1' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Dan ganas de irse a vivir a francia',
        'usuario_id'=>'3',
        'pelicula_id'=>'1' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Muy entretenida y dinamica sin duda!',
        'usuario_id'=>'4',
        'pelicula_id'=>'1' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Madre mia con la niña',
        'usuario_id'=>'1',
        'pelicula_id'=>'2' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Muy buena, se paso volando',
        'usuario_id'=>'3',
        'pelicula_id'=>'2' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Te hace reflexionar sobre muchas cosas',
        'usuario_id'=>'4',
        'pelicula_id'=>'3' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Una pelicula para ver una vez, y otra, y otra más',
        'usuario_id'=>'1',
        'pelicula_id'=>'5' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Una de esas peliculas que nunca olvidas',
        'usuario_id'=>'3',
        'pelicula_id'=>'2' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Suspense continuo',
        'usuario_id'=>'3',
        'pelicula_id'=>'2' ) );

        DB::table('comentarios')->insert(array('contenido'=>'10/10 100% Recomendado!',
        'usuario_id'=>'4',
        'pelicula_id'=>'3' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Intesa y sentimental sin ser empalagosa',
        'usuario_id'=>'3',
        'pelicula_id'=>'4' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Quiero que mis hijos la vean',
        'usuario_id'=>'3',
        'pelicula_id'=>'4' ) );

        DB::table('comentarios')->insert(array('contenido'=>'Es impresionante como te mantiene enganchado a la pantalla',
        'usuario_id'=>'4',
        'pelicula_id'=>'4' ) );
    }
}
