@extends('layouts.app-admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<body>
<br><br>
<center>
    <h1>Footer</h1>
    <br>
    <br>
    <form  action="{{url('/footer')}}" method="post">
     @csrf
    <h5><span>Facebook</span></h5>
    <input style="width: 50%;" type="text" placeholder="Link Facebook"  class="form-control" name="facebook" id="recipient-name"><br>
    
    <h5><span>Twitter</span></h5>
    <input style="width: 50%;" type="text" placeholder="Link Twitter"  class="form-control" name="twitter" id="recipient-name"><br>

    <h5><span>Correo de la empresa</span></h5>
    <input style="width: 50%;" type="text" placeholder="Correo"  class="form-control" name="correo" id="recipient-name"><br>

    <h5><span>Direccion</span></h5>
    <input style="width: 50%;" type="text" placeholder="Direccion"  class="form-control" name="direccion" id="recipient-name"><br>


    <h5><span>Telefono</span></h5>
    <input style="width: 50%;" type="text" placeholder="Telefono"  class="form-control" name="telefono" id="recipient-name"><br>

    <input type="submit" class="btn btn-success" value="Guardar">
   
    </form>
</center>
</body>
</html>
@endsection