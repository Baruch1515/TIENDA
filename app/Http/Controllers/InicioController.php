<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\footer;
use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $tipos = Tipo::all();
        $footers = footer::all();
        $creates['creates'] = Producto::paginate(2);
        $texto = $request->input('texto');
        $creates = Producto::query()
            ->where('nombre', 'LIKE', "%{$texto}%")
            ->orderBy('id', 'desc')
            ->paginate(16);
        return view('welcome', compact('creates', 'footers', 'categorias', 'empresas', 'tipos'));
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

    public function categoria(categoria $categoria)
    {
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = Footer::all();

        $productos = Producto::where('id_categoria', $categoria->id)
            ->paginate('16');
        return view('productos.category', compact('categoria', 'productos', 'categorias', 'empresas', 'tipos','footers'));
    }

    public function tipo(tipo $tipo)
    {
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = Footer::all();

        $productos = Producto::where('id_tipo', $tipo->id)
            ->paginate('16');
        return view('productos.tipo-vista', compact('productos', 'categorias', 'empresas', 'tipos','footers'));

    }

}
