<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\footer;
use App\Models\Tipo;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $footers = footer::all();

        return view('productos.footer', compact('empresas', 'categorias', 'tipos','footers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosproductos = request()->except('_token');
        footer::insert($datosproductos);
        return redirect("productos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $footers = footer::find($id);
        $footers->facebook = $request->facebook;
        $footers->twitter = $request->twitter;
        $footers->correo = $request->correo;
        $footers->direccion = $request->direccion;
        $footers->telefono = $request->telefono;

        $footers->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(footer $footer)
    {
        //
    }
}
