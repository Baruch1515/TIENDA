<?php

namespace App\Http\Controllers;

use App\Models\create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        $texto = $request->input('texto');
        $creates = create::query()
        ->where('nombre', 'LIKE', "%{$texto}%")
        ->paginate(5);
        return view('productos.index', compact('creates'));
   /*
        $datos['creates']=create::paginate(5);
        return view('productos.index',$datos);
        */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
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
        if($request->hasFile('foto')){
            $datosproductos['foto']=$request->file('foto')->store('foto','public');
        }
        Create::insert($datosproductos);

        return redirect('productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\create  $create
     * @return \Illuminate\Http\Response
     */
    public function show(create $create)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\create  $create
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $productos=create::findOrFail($id);
        return view('productos.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\create  $create
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //

       $datosproductos =request()->except(['_token','_method']);

       if($request->hasFile('foto')){
       $productos=create::findOrFail($id);
       Storage::delete('public/'.$productos->foto);
        $datosproductos['foto']=$request->file('foto')->store('foto','public');
    }

       create::where('id','=',$id)->update($datosproductos);
       $productos=create::findOrFail($id);
        return view('productos.edit', compact('productos'));

      /*
       $datosproductos = request()->except('_token');

       $productos->nombre=$request->input('nombre');
       $productos->descripcion=$request->input('descripcion');

       $productos=create::findOrFail($id);
       $productos->save();
       return redirect()->route('productos.index');
*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\create  $create
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $productos=create::findOrFail($id);

        if(Storage::delete('public/'.$productos->foto)){
         create::destroy($id);
         
        }
        
         return redirect('productos');
    }
}
