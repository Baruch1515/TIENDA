@extends('layouts.app-admin')
@section('content')

<head>


</head>





<a href="{{url('productos/create')}}" style="margin:15px;">Nuevo Producto</a>




@if ($empresas->count()>0)
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
  Editar Empresa
</button>
@else

<a href="{{url('empresa')}}" style="margin:15px;">Empresa</a>
@endif





@if ($footers->count()>0)
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
  Editar Footer
</button>
@else

<a href="{{url('footer')}}" style="margin:15px;">Footer</a>
@endif





<a href="{{url('tipo')}}" style="margin:15px;">Tipo de producto</a>



<!-- Modal edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <div class="modal-body">
        @foreach($empresas as $empresa)
        <form action="{{url('empresa',$empresa->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <input type="text" placeholder="Nombre de la empresa..." value="{{$empresa->nombre}}" class="form-control" name="nombre" id="recipient-name"><br>
          <textarea class="form-control" value="" type="text" placeholder="Descripcion..." name="descripcion" required> {{$empresa->descripcion}}</textarea>
          <br>
          <img src="{{asset('storage').'/'.$empresa->foto}}" width="120px">
          <input value="" class="form-control form-control-lg" accept="image/*" name="foto" id="formFileLg" type="file">
          <br>
          @endforeach
          <input type="submit" class="btn btn-success" value="Guardar">

        </form>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<a href="{{url('categoria')}}" style="margin:15px;">Categorias</a>

<form action="{{route('productos.index')}}" method="get">
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Busca aqui" name="texto" style="margin-top: 15px;">
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
    @foreach($productos as $Producto)
    <tr>

      <td>{{$Producto->id}}</td>
      <th>{{$Producto->nombre}}</th>
      <td>{{$Producto->descripcion}}</td>
      <td><img src="{{asset('storage').'/'.$Producto->foto}}" class="img-fluid img-thumbnail" width="120px"></td>
      <td><a href="{{route('productos.edit',$Producto->id)}}" class="btn btn-light" style="color:blue;">Editar</a></td>


      <td>
        <form action="{{ url('productos/'.$Producto->id ) }}" method="post">
          @csrf
          {{ method_field('DELETE') }}
          <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-light" style="color:red;">Borrar</button>
        </form>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

{!! $productos->links() !!}

</div>
</div>
</div>
</div>

@endsection