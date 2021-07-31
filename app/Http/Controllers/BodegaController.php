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
    public function index()
    {
        $categorias = Categoria::all();
        $creates = Producto::all();
        $empresas = Empresa::all();
        $tipos = Tipo::all();
        $footers = footer::all();
        $bodegas = Bodega::all();
        $productos = Producto::all();

        return view("productos.bodega", compact('categorias', 'bodegas', 'creates', 'empresas', 'tipos', 'footers', 'productos'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
        $datosproductos = request()->except('_token');
        Bodega::insert($datosproductos);
        return back();
    }

    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        
        $bodegas = Bodega::find($id);
        $bodegas->nombre = $request->nombre;
        $bodegas->descripcion = $request->descripcion;
        $bodegas->lugar = $request->lugar;
        $bodegas->supervisor = $request->supervisor;

        $bodegas->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        
    }
}
