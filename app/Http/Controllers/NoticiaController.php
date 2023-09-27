<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Image;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::with(['user','categoria'])->latest()->get();
        //dd($noticias);
        return view('noticias.index',compact('noticias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'id_usuario' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'contenido' => 'required',
            'imagen' => 'required',
            'id_categoria' => 'required',
        ]);
        $contenidoBinario = file_get_contents($request->file('imagen'));
        $imagen = base64_encode($contenidoBinario);
		$request->merge( array( 'imagen' => $imagen) );
        $datos = array(
            "_token" =>$request->get('_token'),
            "id_usuario" => $request->get('id_usuario'),
            "titulo" => $request->get('titulo'),
            "autor" => $request->get('autor'),
            "contenido" => $request->get('contenido'),
            "id_categoria" => $request->get('id_categoria'),
            "imagen" => $request->get('imagen')
        );
        //dd($datos);
        Noticia::create($datos);
        //dd($request);
        return redirect()->route('noticias.index')
                        ->with('success','Noticia creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        $noticias = Noticia::with(['user','categoria'])->where('id', $noticia->id)->first(); 
        return view('noticias.show',compact('noticias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'id_usuario' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'contenido' => 'required',
            'id_categoria' => 'required',
        ]);
        if(!empty($request->get('imagen'))){
            $contenidoBinario = file_get_contents($request->file('imagen'));
            $imagen = base64_encode($contenidoBinario);
            $request->merge( array( 'imagen' => $imagen) );
            $datos = array(
                "_token" =>$request->get('_token'),
                "id_usuario" => $request->get('id_usuario'),
                "titulo" => $request->get('titulo'),
                "autor" => $request->get('autor'),
                "contenido" => $request->get('contenido'),
                "id_categoria" => $request->get('id_categoria'),
                "imagen" => $request->get('imagen')
            );
        }else{
            $datos = array(
                "_token" =>$request->get('_token'),
                "id_usuario" => $request->get('id_usuario'),
                "titulo" => $request->get('titulo'),
                "autor" => $request->get('autor'),
                "contenido" => $request->get('contenido'),
                "id_categoria" => $request->get('id_categoria')
            );
        }
        //dd($datos);
        $noticia->update($datos);
    
        return redirect()->route('noticias.index')
                        ->with('success','Noticia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
    
        return redirect()->route('noticias.index')
                        ->with('success','Noticia Eliminada exitosamente');
    }
}
