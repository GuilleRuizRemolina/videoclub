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

class Pelicula extends Model
{
    use HasFactory;

    protected $table='peliculas';

    //definimos la relacion Many to One con la tabla Directores
    public function director()
    {
        //metodo que devuelve el director de la pelicula
        return $this->belongsTo(Director::class,'director_id');
    }

    //definimos la relacion Many to One con la tabla Usuarios
    public function usuario()
    {
        //metodo que devuelve el usuario propietario de la pelicula
        return $this->belongsTo(User::class,'propietario_id');
    }

    //definimos la relacion One to Many con la tabla Prestamos
    public function prestamos()
    {
        //metodo que devuelve un array de objetos con los prestamos asociadas a una pelicula
        return $this->hasMany(Prestamo::class);
    }

    //definimos la relacion One to Many con la tabla Comentarios
    public function comentarios()
    {
        //metodo que devuelve un array de objetos con los comentarios asociadas a una pelicula
        return $this->hasMany(Comentario::class);
    }
    
}
