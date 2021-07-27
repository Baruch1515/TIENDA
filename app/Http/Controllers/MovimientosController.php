<?php
namespace App\Http\Controllers;
use App\Models\productos_bodega;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tipo;
use App\Models\footer;
use App\Models\Bodega;
use Illuminate\Http\Request;

class MovimientosController extends Controller
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
        return view("productos.movimientos",compact('categorias','bodegas','creates','empresas','tipos','footers','productos'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $datosproductos = request()->except('_token');
        productos_bodega::insert($datosproductos);
        return back();
    }

    public function sumaStock(Request $request)
    {
        $product = productos_bodega::where('id_bodega', '=', $request->id_bodega)->where('id_producto', '=', $request->id_producto)->first();
            
        if($product){
            $product->update(["stock" => $product->stock + $request->stock]);
            return back();
                    }
        else{
        $datosproductos = request()->except('_token');
        productos_bodega::insert($datosproductos);
        return back();
            }
           $categorias = Categoria::all();
           $creates = Producto::all();
           $empresas = Empresa::all();
           $tipos = Tipo::all();
           $footers = footer::all();
           $bodegas = Bodega::all();
           $productos = Producto::all();
           $product->save();
            return view("productos.bodega",compact('categorias','bodegas','creates','empresas','tipos','footers','productos'));
    }
    public function salidaStock(Request $request)
    {
        $product = productos_bodega::where('id_bodega', '=', $request->id_bodega)->where('id_producto', '=', $request->id_producto)->first();
            
        if($product){
            $product->update(["stock" => $product->stock - $request->stock]);
            return back();
                    }
        else{
        $datosproductos = request()->except('_token');
        productos_bodega::insert($datosproductos);
        return back();
            }
           $categorias = Categoria::all();
           $creates = Producto::all();
           $empresas = Empresa::all();
           $tipos = Tipo::all();
           $footers = footer::all();
           $bodegas = Bodega::all();
           $productos = Producto::all();
           $product->save();
            return view("productos.bodega",compact('categorias','bodegas','creates','empresas','tipos','footers','productos'));
    }




    function trasladoStock(Request $request){
      $product_saliente = productos_bodega::where('id_bodega', '=', $request->id_bodega_saliente)->where('id_producto', '=', $request->id_producto)->first();

      if($product_saliente){
        $product_available = $product_saliente->stock - $request->stock;
          if ($product_available >= 0) {
              $product_saliente->update(["stock" => $product_available]);

              $product_entrante = productos_bodega::where('id_bodega', '=', $request->id_bodega_entrante)->where('id_producto', '=', $request->id_producto)->first();
              if($product_entrante){
                $product_entrante->update(["stock" => $product_entrante->stock + $request->stock]);
              }

              return back();
          } else {

              return back();
          }
      }
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
}
