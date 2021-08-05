<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\footer;
use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;


class InicioController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::content();
        //dd($cart);
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
        return view('welcome', compact('creates', 'footers', 'categorias', 'empresas', 'tipos','cart'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
    
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }

    public function categoria(categoria $categoria)
    {
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = Footer::all();

        $productos = Producto::where('id_categoria', $categoria->id)
            ->paginate('16');
        return view('productos.category', compact('categoria', 'productos', 'categorias', 'empresas', 'tipos', 'footers'));
    }

    public function tipo(tipo $tipo)
    {
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $empresas = Empresa::all();
        $footers = Footer::all();

        $productos = Producto::where('id_tipo', $tipo->id)
            ->paginate('16');
        return view('productos.tipo-vista', compact('productos', 'categorias', 'empresas', 'tipos', 'footers'));
    }
}
