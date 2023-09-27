<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use App\Models\User;
use App\Models\Noticia;

class AuthController extends Controller
{
    /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
		$noticias = Noticia::with(['user','categoria'])->latest()->first();
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {
	
			$iduser = Auth::id(); 
            //SE CONSULTA EL USUARIO LOGUEADO
            $users = User::where('id', $iduser)->paginate(5);
	        // Si está logado le mostramos la vista de logados
			

	        return view('logados', compact('users','noticias'));
	    }
	//
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('login', compact('noticias'));
	}
	
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
	{
		$noticias = Noticia::with(['user','categoria'])->latest()->take(1)->get(); 
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
	    return redirect("/")->with('noticias')->with('success','Los datos introducidos no son correctos');
	}
	
	public function register(){
		return view('registrese');
	}

	public function postRegister(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required',
            'usuario' => 'required',
            'id_rol' => 'required',
			'password' => 'required',
        ]);
        $password = $request->get('password');
		//Input::replace(['password' => bcrypt($password)]);
		$request->merge( array( 'password' => bcrypt($password) ) );
		//SE CONSULTA SI NO EXISTE EL USUARIO
		$usuario = $request->get('usuario');
		$users = User::where('usuario', $usuario)->first();
		if(!empty($users)){
			return redirect()->route('register')->with('alert-danger','El usuario ya se encuentra registrado favor verfique');
		}else{
        	User::create($request->all());
		}
		//dd($request);
        return redirect()->route('home')->with('alert-success','Usuario creado exitosamente!');
    }

	public function logout(){
        Session::flush();
        return redirect()->route('home')->with('alert-success', 'HAS CERRADO SESI&Oacute;N CON &Eacute;XITO.!');
	}
	/**
	* Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
	* con un mensaje de error
	*/
	public function logados()
	{
		
	    if (Auth::check()) {
            /*$iduser = Auth::id(); 
			//SE CONSULTA PARA SABER EL ROL DEL USUARIO
			$users = User::where('id', $iduser)->first(); 
            //SE CONSULTA EL USUARIO LOGUEADO
			if($users->id_rol ==1){
            	$users = User::paginate(5); 
			}

			$noticias = Noticia::with(['user','categoria'])->latest()->take(1)->get();
	        return view('logados', compact('users','noticias'));*/
			$noticias = Noticia::with(['user','categoria'])->latest()->get();
			//dd($noticias);
			return view('noticias.index',compact('noticias'))
				->with('i', (request()->input('page', 1) - 1) * 5);
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
