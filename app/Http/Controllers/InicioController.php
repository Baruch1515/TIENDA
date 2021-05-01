<?php

namespace App\Http\Controllers;
use App\Models\categoria;
use App\Models\empresa;
use App\Models\create;
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
        //
        $categorias = categoria::all();
        $empresas = empresa::all();
        $creates['creates']=create::paginate(11000);
        $texto = $request->input('texto');
        $creates = create::query()
        ->where('nombre', 'LIKE', "%{$texto}%")
        ->get();
        return view('welcome', compact('creates','categorias','empresas'));
       /*
         $datos['creates']=create::paginate(1);
        return view('welcome',$datos);
        
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

    public function  categoria(categoria $categoria)
    {
        //
        $categorias = categoria::all();
        $empresas = empresa::all();
       $productos = create::where('id_categoria',$categoria->id)
                    ->paginate('16');
                    return view('productos.category',compact('categoria','productos','categorias','empresas'));
    }

}
