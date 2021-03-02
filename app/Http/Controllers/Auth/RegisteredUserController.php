<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
            'apellidos' => 'required|string|max:255',
        ]);

        //asegurarnos que el nombre va a ser unico
        $nombreFicheroImagen = time() . '-' . $_FILES['imagen']['name'];

        $destino = '../public/img/imagenesPerfiles/' . $nombreFicheroImagen;

        $origen = $_FILES['imagen']['tmp_name'];

        //mover el fichero de la carpeta temporal a la nuestra
        $moverFicheroImagen = move_uploaded_file($origen,$destino);

        Auth::login($user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellidos' => $request->apellidos,
            'imagen' => $nombreFicheroImagen,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
