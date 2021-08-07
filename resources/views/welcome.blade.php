<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@foreach($empresas as $Empresa) {{$Empresa->nombre}} @endforeach</title>
    <!-- Favicon-->

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{asset('libs/principalview/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">@foreach($empresas as $Empresa) {{$Empresa->nombre}} @endforeach</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('empresa-vista') }}">Quienes Somos</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categorias as $Categoria)
                            <li><a class="dropdown-item" href="{{route('productos.category',$Categoria)}}">{{$Categoria->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tipos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($tipos as $Tipo)
                            <li><a class="dropdown-item" href="{{route('productos.tipo-vista',$Tipo)}}">{{$Tipo->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form method="get" action="{{route('welcome')}}" style="position: relative; left: 15px;">
                            <input type="text" class="form-control" placeholder="Busca aqui..." name="texto" aria-label="Username" aria-describedby="basic-addon1">
                        </form>
                    </li>
                    <div>
                        <h5 style="position: relative; left: 30px; top: 1px;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">
                        <i class="bi bi-cart-fill"></i> Carrito({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})
                        </button></h5>
                    </div>

                    <ul class="navbar-nav ml-auto" style="position: relative; left: 225px;">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href=" {{ route('productos.index') }}">

                                    {{ __('Panel de control') }}
                                </a>
                            </div>
                        </li>
                        @endguest

                    </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">@foreach($empresas as $Empresa) {{$Empresa->nombre}} @endforeach</h1>
            </div>
        </div>
    </header>
    @if(session('addcart'))
    {{session('addcart')}}
    @endif

 
    
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($creates as $Producto)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{asset('storage').'/'.$Producto->foto}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$Producto->nombre}}</h5>
                                <!-- Product price-->
                                <div class="text-center">
                                    <!-- Product name-->
                                    <!-- Product price-->
                                    $r{{$Producto->price}}
                                </div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a href="{{url('productos',$Producto->id)}}" type="button" class="btn btn-outline-dark mt-auto" data-toggle="modal" data-target="#editCategoria{{$Producto->id}}">
                                    Vista Previa
                                </a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($creates as $Producto)

                <div class="modal fade" id="editCategoria{{$Producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$Producto->nombre}}</h5>
                            </div>
                            <div class="modal-body">
                                <img style=" float: left;" class="card-img-top" src="{{asset('storage').'/'.$Producto->foto}}" alt="Card image cap" style="width:254px; height:224px; float:center;">
                                <p>{{$Producto->descripcion}}</p>
                            </div>
                            <div class="modal-footer">
                                @if($cart->where('id',$Producto->id)->count())
                                <p style="text-align: center;">Este producto ya esta agregado</p>
                                @else
                            <form action="{{route('cart.store')}}" method="POST" >
                                    @csrf
                                    <input  type="number"
                                    value="1"
                                    name="quantity"
                               class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                               style="width: 50px"/>
                                    <input type="hidden" name="product_id" value="{{$Producto->id}}">
                                    <button  type="submit" class="btn btn-primary" data-toggle="modal" ><i style="color:blcak;" class="bi bi-cart-fill"></i>Agregar al carrito</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito de compras</h5>
      </div>
      <div class="modal-body">
      @foreach(Cart::content() as $row) 
        <p>Producto <strong><?php echo $row->name; ?></strong></p>
        <p>Precio <b>$</b><strong><?php echo $row->price; ?></strong></p>
        <p>
        <form action="{{route('cart.delete', $row->rowId)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$row->id}}" >
                <button type="submit" class="btn btn-link btn-sm">Eliminar del carrito</button>
            </form>
        </p>

        </p>

        <hr>
      
        @endforeach
        <p>Total  <b>$</b><strong>{{Cart::total()}}</strong></p>
        
        <br><br>
        @if (Auth::guest())
        <p>No has iniciado sesion</p>          
                @else
                <a  target="_blank" href="https://wa.me/573023342189?text=Hola%20buenas%20me%20llamo%20{{auth()->user()->name}}%20y%20estoy%20interesado%20en%20comprar%20los%20siguientes%20productos%20 @foreach(Cart::content() as $row) {{$row->name}} @endforeach Gracias">Completar compra</a>
                @endif
      </div>
    </div>
  </div>
</div>
        @endforeach
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        @foreach($footers as $footer)
        <footer>
            <div class="container__footer">
                <div class="box__footer">
                    <div class="logo">
                    </div>
                    <div class="terms">
                        <p>
                        <h5><b style="color:white;">Direccion</b></h5>

                        {{$footer->direccion}}
                        <p>
                        <h5><b>Telefono</b></h5>
                        {{$footer->telefono}}

                        </p>
                    </div>
                </div>
                <div class="box__footer">
                    <h2 style="color:white;">Redes Sociales</h2>
                    <a style="color:white;" href="{{$footer->facebook}}"> <i class="fab fa-facebook-square"></i> Facebook</a>
                    <a style="color:white;" href="{{$footer->twitter}}"><i class="fab fa-twitter-square"></i> Twitter</a>
                    <a style="color:white;" href="mailto:{{$footer->correo}}"><i class="fab fa-linkedin"></i> Correo Electronico</a>
                </div>

            </div>

            <div class="box__copyright">
                <hr>

            </div>
        </footer>
        @endforeach

        <style>
            footer {
                width: 100%;
                padding: 50px 0px;
                background-image: url(../Images/background-footer.svg);
                background-size: cover;

                /*background-color: #d0f0f8;
    -webkit-mask-image: url("../Images/background-footer.svg");
    mask-image: url("../Images/background-footer.svg");
    -webkit-mask-size: cover;
    mask-size: cover;*/
            }

            .container__footer {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                max-width: 1200px;
                margin: auto;
                margin-top: 15px;
            }

            .box__footer {
                display: flex;
                flex-direction: column;
                padding: 4px;
            }

            .box__footer .logo img {
                width: 180px;
            }

            .box__footer .terms {
                max-width: 350px;
                margin-top: 20px;
                font-weight: 500;
                color: #7a7a7a;
                font-size: 18px;
            }

            .box__footer h2 {
                margin-bottom: 30px;
                color: #343434;
                font-weight: 700;
            }

            .box__footer a {
                margin-top: 10px;
                color: #7a7a7a;
                font-weight: 600;
            }

            .box__footer a:hover {
                opacity: 0.8;
            }

            .box__footer a .fab {
                font-size: 20px;
            }

            .box__copyright {
                max-width: 1200px;
                margin: auto;
                text-align: center;
                padding: 0px 40px;
            }

            .box__copyright p {
                margin-top: 20px;
                color: #7a7a7a;
            }

            .box__copyright hr {
                border: none;
                height: 1px;
                background-color: #7a7a7a;
            }
        </style>
    </footer>
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>