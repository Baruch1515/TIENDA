@extends('layouts.app')     
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
    @foreach($empresas as $Empresa)
    <h1>{{$Empresa->nombre}}</h1>
    <img src="{{asset('storage').'/'.$Empresa->foto}}" class="img-fluid img-thumbnail" width="500px">
    <p>{{$Empresa->descripcion}}</p>
     @endforeach
</body>
</html>
@endsection