<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return view('logados');
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('login');
	}
	
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
	{
       
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'usuario' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('usuario', 'password');
	    //dd($credentials);
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::attempt($credentials)) {
	        return redirect()->intended('logados')
	            ->withSuccess('Logado Correctamente');
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect("/")->withSuccess('Los datos introducidos no son correctos');
	}
	
	/**
	* Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
	* con un mensaje de error
	*/
	public function logados()
	{
	    if (Auth::check()) {
            $iduser = Auth::id();
            //SE CONSULTA EL USUARIO LOGUEADO
            $users = User::where('id', $iduser)->paginate(5);
	        return view('logados', compact('users'));
	    }
	
	    return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->usuario(), 'password');
    }
}
