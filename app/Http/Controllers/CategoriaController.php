<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\footer;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  
    public function index()
    {
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = footer::all();

        return view('productos.categoria', compact('categorias', 'empresas', 'footers'));
    }

    public function create()
    {
    

    }

    public function store(Request $request)
    {
        
        $datosproductos = request()->except('_token');
        Categoria::insert($datosproductos);
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
        $categorias = Categoria::find($id);
        $categorias->nombre = $request->nombre;
        $categorias->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $producto = Producto::where('id_categoria', $id)->first();
        if ($categoria == null || $producto != null) {

            return back()->with('info', 'No puedes eliminar esta categoria ya que esta categoria tiene productos relacionados');
        } else {
            Categoria::destroy($id);
            return back()->with('infogood', 'La categoria se elimino correctamente');
        }
    }
}
