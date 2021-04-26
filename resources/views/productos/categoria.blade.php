
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
 Nueva Categoria
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('categoria')}}" method="post">
        @csrf
        <input type="text" class="form-control" name="nombre" id="recipient-name">
        <br>
        <input type="submit" class="btn btn-success"value="Guardar">

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
<th scope="col">Categoria</th>
<th scope="col">Acciones</th>


<tr>
</thead>



    <tbody>
    @foreach($categorias as $categoria)
    <tr>
    <td>{{$categoria->id}}</td>
    <td>{{$categoria->nombre}}</td>

   
    <td>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCategoria{{$categoria->id}}">
 Editar
</button>

<!-- Modal -->
<div class="modal fade" id="editCategoria{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('categoria',$categoria->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" value="{{$categoria->nombre}}" class="form-control" name="nombre" id="recipient-name">
        <br>
        <input type="submit"  class="btn btn-success"value="Guardar">
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
    </td>
    

      <th><th>
    
    </tr>
@endforeach
    </tbody>
</table>

</body>
</html>
@endsection






