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

class Director extends Model
{
    use HasFactory;

    protected $table='directores';

    //definimos la relacion One to Many con la tabla Peliculas
    public function peliculas()
    {
        //metodo que devuelve un array de objetos con las pelicualas asociadas a un director
        return $this->hasMany(Pelicula::class);
    }
}
