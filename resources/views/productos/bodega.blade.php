<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('libs/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fab fa-laravel"></i>
                </div>
                <div class="sidebar-brand-text mx-3">@foreach($empresas as $empresa) {{$empresa->nombre}} @endforeach</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('productos.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productos.create') }}">
                  <i class="fas fa-plus-circle"></i>
                    <span>Nuevo producto</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-store"></i>
                    <span>Bodega</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('bodega')}}">Administrar Bodegas</a>
                        <a class="collapse-item" href="{{url('movimientos')}}">Movimientos</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
                  @if ($empresas->count()>0)
                  <li class="nav-item ">
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Editar Empresa</span></a>        
                  </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('empresa')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Empresa</span></a>
                    </li>
                    @endif


                       @if ($footers->count()>0)
                      <li class="nav-item ">
                      <a href="#" href="#" class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#miModal">
                      <i class="fas fa-book-open"></i>
                        <span>Editar Footer</span>
                      </a>
                      @else
                      <li class="nav-item ">
                      <a href="{{url('footer')}}" class="nav-link" >
                      <i class="fas fa-book-open"></i>
                        <span>Footer</span>
                      </a>
                      @endif


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






            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                      <a href="{{url('categoria')}}"  class="nav-link">
                      <i class="fas fa-list-ul"></i>
                        <span>Categorias</span>
                      </a>
            </li>          

            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                      <a href="{{url('tipo')}}"  class="nav-link">
                      <i class="fas fa-hashtag"></i>
                        <span>Tipos</span>
                      </a>
            </li> 

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                        <form action="{{route('productos.index')}}" method="get">
                            <input type="text" class="form-control bg-light border-0 small"name="texto" placeholder="Buscador de productos..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
</form>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <i class="fas fa-user"></i>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                             
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <h1 style="margin: 15px;">Bodegas</h1>
                <button style="margin: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevabodega">
    Nueva Bodega
  </button>
  <button style="margin: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEntrada">
      Entrada
  </button>
  <button style="margin: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevabodega">
      Salida
  </button>
  <button style="margin: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnuevabodega">
      Traslado
  </button>
           

  <!-- MODAL ENTRADA -->

  <div class="modal fade" id="modalEntrada" tabindex="-1" role="dialog" aria-labelledby="modalEntrada" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Entrada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('movimientos')}}" method="post">
          @csrf
        <div style="text-align: center;" class="form-group shadow-textarea">
                        <h5><label for="">Bodega:</label></h5>
                        <select name="id_bodega" id="" required>
                            <option value="">---ESCOJA UNA BODEGA---</option>
                            @foreach($bodegas as $Bodega)
                            <option value="{{ $Bodega['id'] }}">{{ $Bodega['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div style="text-align: center;" class="form-group shadow-textarea">
                        <h5><label for="">Producto:</label></h5>
                        <select name="id_producto" id="" required>
                            <option value="">---ESCOJA UNA PRODUCTO---</option>
                            @foreach($productos as $Producto)
                            <option value="{{ $Producto['id'] }}">{{ $Producto['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <h5 style="text-align: center;">Stock:</h5>
                   <center> <input style="text-align: center;" type="number" placeholder="Stock" name="stock"><br><br>
                   <input style="text-align: center;" type="submit" class="btn btn-success" value="Guardar"><br></center>

        </form>
      </div>
    </div>
  </div>
</div>
  <!-- MODAL ENTRADA -->



<div class="modal fade" id="modalnuevabodega" tabindex="-1" role="dialog" aria-labelledby="modalnuevabodega" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Nueva Bodega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{url('bodega')}}" method="post">
        @csrf
              <div class="input-group mb-3">
              <div class="input-group-prepend">
</svg></i></span>
            </div>
          <input type="text"  class="form-control" name="nombre" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
        </div>




        <div class="input-group mb-3">
              <div class="input-group-prepend">
</svg></i></span>
            </div>
          <input type="text"  class="form-control" name="descripcion" placeholder="Descripcion" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
              <div class="input-group-prepend">
</svg></i></span>
            </div>
          <input type="text" class="form-control" name="lugar" placeholder="Lugar" aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <div class="input-group mb-3">
              <div class="input-group-prepend">
</svg></i></span>
            </div>
          <input type="text" class="form-control"  name="supervisor" placeholder="Supervisor" aria-label="Username" aria-describedby="basic-addon1">
        </div>



        <input type="submit" class="btn btn-success" value="Guardar">

        </form>
      </div>   
		</div>
	</div>
</div>   
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Bodega</th>
        <th scope="col">Supervisor</th>
        <th scope="col">Lugar</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
        <th scope="col">Ver</th>





      <tr>
    </thead>



    <tbody>
      @foreach($bodegas as $Bodega)
      <tr>
        <td>{{$Bodega->id}}</td>
        <td>{{$Bodega->nombre}}</td>
        <td>{{$Bodega->lugar}}</td>
        <td>{{$Bodega->supervisor}}</td>




        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCategoria{{$Bodega->id}}">
            Editar
          </button>

          <!-- Modal -->
          <div class="modal fade" id="editCategoria{{$Bodega->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{url('bodega',$Bodega->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <b>Nombre:</b><input type="text" value="{{$Bodega->nombre}}" class="form-control" name="nombre" id="recipient-name"><br>
                    <b>Descripcion:</b><input type="text" value="{{$Bodega->descripcion}}" class="form-control" name="descripcion" id="recipient-name"><br>
                    <b>Lugar:</b><input type="text" value="{{$Bodega->lugar}}" class="form-control" name="lugar" id="recipient-name"><br>
                    <b>Supervisor:</b><input type="text" value="{{$Bodega->supervisor}}" class="form-control" name="supervisor" id="recipient-name"><br>



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
      <form action="{{url('bodega',$Bodega->id)}}"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-danger" >Borrar</button>
     </form>
    </td>
      <td>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ver{{$Bodega->id}}">
            Ver mas
          </button>

          <div class="modal fade" id="ver{{$Bodega->id}}" tabindex="-1" role="dialog" aria-labelledby="ver{{$Bodega->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de bodega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Nombre</h5><p>{{$Bodega->nombre}}</p>
        <h5>Descripcion</h5><p>{{$Bodega->descripcion}}</p>
        <h5>Lugar</h5><p>{{$Bodega->lugar}}</p>
        <h5>Supervisor</h5><p>{{$Bodega->supervisor}}</p>




      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

      </td>

        <th>
        <th>

      </tr>
      @endforeach
    </tbody>
  </table>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>

  

</body>

</html>