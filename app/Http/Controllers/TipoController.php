<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\footer;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    public function index()
    {
        
        $empresas = Empresa::all();
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $footers = footer::all();
        


        return view('productos.tipo', compact('empresas', 'categorias', 'tipos', 'footers'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
        $datosproductos = request()->except('_token');
        Tipo::insert($datosproductos);
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
        
        $tipos = Tipo::find($id);
        $tipos->nombre = $request->nombre;
        $tipos->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        $tipo = Tipo::find($id);
        $producto = Producto::where('id_tipo', $id)->first();

        if ($tipo == null || $producto != null) {

            return back()->with('info', 'Para eliminar este tipo borra los productos que lo contienen');
        } else {
            Tipo::destroy($id);
            return back()->with('infogood', 'El tipo se elimino correctamente');
        }
    }
}
