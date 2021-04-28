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
    <form  action="{{url('/empresa')}}" method="post" enctype="multipart/form-data">
    @csrf
        <h4><label for="nombre">Nombre de la empresa</label></h4>
        <input class="form-control" value="" type="text" placeholder="Nombre del producto" name="nombre" required>
        <br>

        <h4><label for="nombre">Descripcion de la empresa</label></h4>
        <textarea class="form-control" value="" type="text" placeholder="Descripcion..." name="descripcion" required></textarea>
        <br>

        <div class="form-group shadow-textarea">
            <h4> <label for="">Foto</label></h4>
            <input value="" class="form-control form-control-lg" accept="image/*" name="foto" id="formFileLg" type="file" / required>
        </div>
        <br>

        <input style="margin:15px;" type="submit" class="btn btn-success" value="Guardar">
    </form>
</body>

</html>
@endsection