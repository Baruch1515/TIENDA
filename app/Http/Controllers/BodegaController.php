<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\footer;
use App\Models\Bodega;


use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categorias = Categoria::all();
        $creates = Producto::all();
        $empresas = Empresa::all();
        $tipos = Tipo::all();
        $footers = footer::all();
        $bodegas = Bodega::all();


        return view("productos.bodega",compact('categorias','bodegas','creates','empresas','tipos','footers'));
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
        //
        $datosproductos = request()->except('_token');
        Bodega::insert($datosproductos);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $bodegas = Bodega::find($id);
        $bodegas->nombre = $request->nombre;
        $bodegas->descripcion = $request->descripcion;
        $bodegas->lugar = $request->lugar;
        $bodegas->supervisor = $request->supervisor;


        $bodegas->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
