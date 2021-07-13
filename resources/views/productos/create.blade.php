@extends('layouts.app-admin')
@section('content')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>

<body>

    <div class="container">
        <h1>Nuevo Producto</h1>
        <br>
        <div class="row">
            <div class="col-xl-l2">

                <form action="{{url('/productos')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- CSS only -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
                    <!-- JavaScript Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

                    <h4><label for="nombre">Nombre</label></h4>
                    <input class="form-control" value="" type="text" placeholder="Nombre del producto" name="nombre" required>
                    <br>

                    <div class="form-group shadow-textarea">
                        <h4> <label for="exampleFormControlTextarea6">Descripcion</label></h4>
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="descripcion" rows="3" placeholder="Escribe una descripcion del producto..." required></textarea>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                        <h4> <label for="">Foto</label></h4>
                        <label for=""></label>

                        <input value="" class="form-control form-control-lg" accept="image/*" name="foto" id="formFileLg" type="file" / required>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                       <h5> <label for="">Referencia</label></h5>

                        <input value="" class="form-control form-control-lg"  name="ref" " type="input" / required>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                       <h5> <label for="">Stock</label></h5>
                        <input value="" class="form-control form-control-lg"  name="stock" " type="number" / required>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                       <h5> <label for="">Ficha Tecnica</label></h5>
                        <input value="" class="form-control form-control-lg"  name="fichatecnica" " type="text" / required>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                       <h5> <label for="">Talla</label></h5>
                        <input value="" class="form-control form-control-lg"  name="talla" " type="text" / required>
                    </div>
                    <br>

                    <div class="form-group shadow-textarea">
                        <h5><label for="">Categoria:</label></h5>
                        <select name="id_categoria" id="" required>
                            <option value="">---ESCOJA UNA CATEGORIA---</option>
                            @foreach($categorias as $Categoria)
                            <option value="{{ $Categoria['id'] }}">{{ $Categoria['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group shadow-textarea">
                        <h5><label for="">Tipo de producto:</label></h5>
                        <select name="id_tipo" id="" required>
                            <option value="">---ESCOJA UN TIPO DE PRODUCTO---</option>
                            @foreach($tipos as $Tipo)
                            <option value="{{ $Tipo['id'] }}">{{ $Tipo['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <input type="submit" class="btn btn-success" value="Guardar">
                </form>


            </div>
        </div>
    </div>


</body>

</html>


</div>
</div>
</div>
</div>
@endsection