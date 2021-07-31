<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\footer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{

    public function index()
    {
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = footer::all();

        return view('productos.empresa', compact('categorias', 'empresas', 'tipos', 'footers'));
    }

    public function empresa()
    {
        $categorias = Categoria::all();
        $creates = Producto::all();
        $empresas = Empresa::all();
        $tipos = Tipo::all();
        $footers = Footer::all();

        return view('empresa-vista', compact('empresas', 'categorias', 'creates', 'tipos', 'footers'));
    }

    public function store(Request $request)
    {
        $datosproductos = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosproductos['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Empresa::insert($datosproductos);

        return redirect('productos');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $datosempresas = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $empresas = Empresa::findOrFail($id);
            Storage::delete('public/' . $empresas->foto);
            $datosempresas['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Empresa::where('id', '=', $id)->update($datosempresas);
        $empresas = Empresa::findOrFail($id);
        return back();
    }

    public function destroy($id)
    {
    }
}
