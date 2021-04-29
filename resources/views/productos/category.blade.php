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

  <p style="font-size:25px;text-align: center;"> Categoria {{$categoria->nombre}}</p>
    @foreach($productos as $create)
    <div class="card" style="width: 18rem; margin:25px; float:left; width: 280px; height:350px;">
  <img class="card-img-top" src="{{asset('storage').'/'.$create->foto}}" alt="Card image cap" style="width:254px; height:224px; float:center;">
  <div class="card-body" style="float:left;">
    <h5 class="card-title">{{$create->nombre}}</h5>
    <a href="" class="btn btn-primary">Ver</a>
  </div>
</div>
    @endforeach
</body>
</html>
@endsection