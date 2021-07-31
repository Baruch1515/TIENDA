<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@foreach($empresas as $Empresa) {{$Empresa->nombre}} @endforeach</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('libs/principalview/css/styles.css')}}" rel="stylesheet" />
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
                    <ul class="navbar-nav ml-auto" style="position: relative; left: 500px;">
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
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($empresas as $Empresa)
                <div class="container">
                    <h1 style="text-align: center;">{{$Empresa->nombre}}</h1>
                    <img src="{{asset('storage').'/'.$Empresa->foto}}" class="img-fluid img-thumbnail" style="width: 1000px;">
                    <p>{{$Empresa->descripcion}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
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
                        <h5><b style="color:white;">Telefono</b></h5>
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>