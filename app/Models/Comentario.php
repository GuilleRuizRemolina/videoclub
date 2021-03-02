<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table='comentarios';

    //definimos la relacion Many to One con la tabla Usuarios
    public function usuario()
    {
        //metodo que devuelve el objeto usuario que ha hecho este comentario
        return $this->belongsTo(User::class,'usuario_id');
    }

    //definimos la relacion Many to One con la tabla Peliculas
    public function pelicula()
    {
        //metodo que devuelve el objeto pelicula del que se ha hecho este comentario
        return $this->belongsTo(Pelicula::class,'pelicula_id');
    }
}
