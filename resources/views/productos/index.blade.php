

@extends('layouts.app-admin')     
  @section('content')
      <head>
      
 
      </head>       

  



      <a href="{{url('productos/create')}}" style="margin:15px;">Nuevo Producto</a>
      <a href="{{url('empresa')}}">Empresa</a>
      <!-- Button trigger modal -->
      <a href="{{url('categoria')}}" style="margin:15px;">Categorias</a>

      <form  action="{{route('productos.index')}}" method="get">   
<div class="input-group mb-3" >
  <input type="text" class="form-control"placeholder="Busca aqui" name="texto" style="margin-top: 15px;">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit" style="margin-top: 15px; ">Buscar</button>
  </div>
</div>
        </form>
    <table class="table">
  <thead>
  
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Foto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($creates as $create)
    <tr>
     
      <td>{{$create->id}}</td>
      <th>{{$create->nombre}}</th>
      <td>{{$create->descripcion}}</td>
      <td><img src="{{asset('storage').'/'.$create->foto}}" class="img-fluid img-thumbnail" width="120px"></td>
      <td><a href="{{route('productos.edit',$create->id)}}" class="btn btn-light" style="color:blue;">Editar</a></td>


    <td>
      <form action="{{ url('productos/'.$create->id ) }}"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-light" style="color:red;">Borrar</button>
     </form>
    </td>
    </tr>
   
      @endforeach
  </tbody>
</table>

{!! $creates->links() !!}

                </div>
            </div>
        </div>
    </div>
    
    @endsection