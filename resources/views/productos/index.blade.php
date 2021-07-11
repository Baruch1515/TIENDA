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
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#miModal">
  Editar Footer
</button>
@else

<a href="{{url('footer')}}" style="margin:15px;">Footer</a>
@endif

<a href="{{url('tipo')}}" style="margin:15px;">Tipo de producto</a>



<!-- Modal del footer -->

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Editar Footer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      @foreach($footers as $footer)
        <form action="{{url('footer',$footer->id)}}" method="post">
        @csrf
       @method('PUT')
              <div class="input-group mb-3">
              <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg></i></span>
            </div>
          <input type="text" value="{{$footer->facebook}}" class="form-control" name="facebook" placeholder="Facebook" aria-label="Username" aria-describedby="basic-addon1">
        </div>




        <div class="input-group mb-3">
              <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg></i></span>
            </div>
          <input type="text" value="{{$footer->twitter}}" class="form-control" name="twitter" placeholder="Twitter" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
              <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></i></span>
            </div>
          <input type="text" value="{{$footer->correo}}" class="form-control" name="correo" placeholder="Correo Electronico" aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <div class="input-group mb-3">
              <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg></i></span>
            </div>
          <input type="text" class="form-control" value="{{$footer->direccion}}" name="direccion" placeholder="Direccion" aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <div class="input-group mb-3">
              <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg></i></span>
            </div>
          <input type="text" value="{{$footer->telefono}}" class="form-control" name="telefono" placeholder="Telefono de la empresa" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        

        <input type="submit" class="btn btn-success" value="Guardar">

        </form>
@endforeach
      </div>   
		</div>
	</div>
</div>





<!-- Modal de empresa -->
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
    <button type="button" style="color:green;" class="btn btn-link" data-toggle="modal" data-target="#ver{{$Producto->id}}">
      Ver mas 
      </button>
    </td>


      <td>
        <form action="{{ url('productos/'.$Producto->id ) }}" method="post">
          @csrf
          {{ method_field('DELETE') }}
          <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-light" style="color:red;">Borrar</button>
        </form>
      </td>
    </tr>


<!-- Modal del footer -->

<div class="modal fade" id="ver{{$Producto->id}}" tabindex="-1" role="dialog" aria-labelledby="verLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Vista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h5>Nombre:</h5>{{$Producto->nombre}} <br><br>
        <h5>Descripcion:</h5>{{$Producto->descripcion}}<br><br>
        <h5>Foto:</h5>
        <img src="{{asset('storage').'/'.$Producto->foto}}" class="img-fluid img-thumbnail" width="120px">
        <h5>Categoria</h5>
        

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



    @endforeach
  </tbody>
</table>

{!! $productos->links() !!}

</div>
</div>
</div>
</div>

@endsection