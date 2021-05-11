@extends('layouts.app-admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

<h1 style="padding:15px;">Tipo De producto</h1>


@if(session('info'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('info')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('infogood'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('infogood')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    Nuevo Tipo
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo tipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('tipo')}}" method="post">
            @csrf
            <input type="text" class="form-control" name="nombre" id="recipient-name">
            <br>
            <input type="submit" class="btn btn-success" value="Guardar">

          </form>
        </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo</th>
        <th scope="col">Acciones</th>


      <tr>
    </thead>



    <tbody>
      @foreach($tipos as $Tipo)
      <tr>
        <td>{{$Tipo->id}}</td>
        <td>{{$Tipo->nombre}}</td>


        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edittipo{{$Tipo->id}}">
            Editar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="edittipo{{$Tipo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{url('tipo',$Tipo->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{$Tipo->nombre}}" class="form-control" name="nombre" id="recipient-name">
                    <br>
                    <input type="submit" class="btn btn-success" value="Guardar">
                  </form>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>
        </td>
      <td>
      <form action="{{url('tipo',$Tipo->id)}}"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-danger" >Borrar</button>
     </form>
    </td>
      </td>

        <th>
        <th>

      </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
@endsection