<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
use Illuminate\Support\Facades\Route;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Pelicula;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Director;
use App\Models\Comentario;

use App\Http\Controllers\peliculasController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('listaPeliculas/{id?}', [peliculasController::class,'listarPeliculas'] 
)->middleware(['auth'])->name('peliculas');

Route::get('listaDirectores', [peliculasController::class,'listarDirectores']
)->middleware(['auth'])->name('directores');

Route::get('misPeliculas/{id?}', [peliculasController::class,'listarMisPelis']
)->middleware(['auth'])->name('mPeliculas');

Route::get('misPrestamos/{id?}', [peliculasController::class,'listarPrestamosSolicitados']
)->middleware(['auth'])->name('mPrestamos');

Route::get('/peliculas/detalles/{id?}', [peliculasController::class,'detallePelicula']
)->middleware(['auth'])->name('peliculas.detalles');

Route::get('/peliculas/nueva/{id?}', [peliculasController::class,'abrirAnadir']
)->middleware(['auth'])->name('peliculas.nueva');

Route::post('/peliculas/anadir', [peliculasController::class,'anadir']
)->middleware(['auth'])->name('peliculas.anadir');

Route::get('/peliculas/eliminar/{id?}', [peliculasController::class,'eliminar']
)->middleware(['auth'])->name('peliculas.eliminar');

Route::get('/peliculas/abrirEditar/{id?}', [peliculasController::class,'abrirEditar']
)->middleware(['auth'])->name('peliculas.abrirEditar');

Route::post('/peliculas/editar/{pelicula?}', [peliculasController::class,'editar']
)->middleware(['auth'])->name('peliculas.editar');

Route::get('/prestamos/crearPrestamo/{usuario_id}/{pelicula_id}/{nCopias}', [peliculasController::class,'crearPrestamo']
)->middleware(['auth'])->name('prestamos.crear');

Route::get('/prestamos/crearPrestamo/{prestamo_id}/{pelicula_id}', [peliculasController::class,'eliminarPrestamo']
)->middleware(['auth'])->name('prestamos.eliminar');

Route::post('/peliculas/comentar', [peliculasController::class,'comentario']
)->middleware(['auth'])->name('peliculas.comentar');

Route::get('/director/eliminar/{id?}', [peliculasController::class,'eliminarDirector']
)->middleware(['auth'])->name('director.eliminar');

Route::get('/usuario/abrirEditar/{id?}', [peliculasController::class,'abrirEditarUsuario']
)->middleware(['auth'])->name('usuario.abrirEditar');

Route::post('/usuario/editar/{usuario?}', [peliculasController::class,'editarUsuario']
)->middleware(['auth'])->name('usuario.editar');

Route::post('/peliculas/buscar/{nombre?}', [peliculasController::class,'buscarPelicula']
)->middleware(['auth'])->name('peliculas.buscar');

require __DIR__.'/auth.php';
