<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\footer;
use App\Models\Tipo;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $footers = footer::all();

        return view('productos.footer', compact('empresas', 'categorias', 'tipos', 'footers'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $datosproductos = request()->except('_token');
        footer::insert($datosproductos);
        return redirect("productos");
    }

    public function show(footer $footer)
    {
    }

    public function edit(footer $footer)
    {
    }

    public function update(Request $request, $id)
    {
        $footers = footer::find($id);
        $footers->facebook = $request->facebook;
        $footers->twitter = $request->twitter;
        $footers->correo = $request->correo;
        $footers->direccion = $request->direccion;
        $footers->telefono = $request->telefono;

        $footers->save();

        return redirect()->back();
    }

    public function destroy(footer $footer)
    {
    }
}
