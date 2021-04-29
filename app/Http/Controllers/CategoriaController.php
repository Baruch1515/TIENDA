<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\create;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = categoria::all();  
        return view('productos.categoria',compact('categorias'));
        
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
        categoria::insert($datosproductos);
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
            $categorias = categoria::find($id);
            $categorias->nombre = $request->nombre;
            $categorias->save();

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

        $categoria = categoria::find($id);
        $producto = create::where('id_categoria',$id)->get();
        //
       
       if($categoria == null || $producto != null){

        return back()->with('info','No puedes eliminar esta categoria ya que esta categoria tiene productos relacionados');
       }
        else{
            categoria::destroy($id);
         }
       
    }
    
    
}
