<?php
/********************************
Autor: Guillermo Ruiz Remolina
Fecha creación: 12/02/2021
Última modificación: 02/03/2021
Versión: 1.00
**********************************/
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'apellidos',
        'imagen'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //definimos la relacion One to Many con la tabla Prestamos
    public function prestamos()
    {
        //metodo que devuelve un array de objetos con los prestamos asociadas a un usuario
        return $this->hasMany(Prestamo::class);
    }

    //definimos la relacion One to Many con la tabla peliculas
    public function peliculas()
    {
        //metodo que devuelve un array de objetos con las peliculas que tiene un usuario
        return $this->hasMany(Pelicula::class);
    }

    //definimos la relacion One to Many con la tabla comentarios
    public function comentarios()
    {
        //metodo que devuelve un array de objetos con los comentarios escritos por el usuario
        return $this->hasMany(Comentario::class);
    }
}
