
      <head>
      
 
      </head>       
      <a href="{{url('productos/create')}}">Nuevo Producto</a>
    <table class="table">
  <thead>
  
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Foto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($creates as $create)
    <tr>
     
      <td>{{$create->id}}</td>
      <th>{{$create->nombre}}</th>
      <td>{{$create->descripcion}}</td>
      <td><img src="{{asset('storage').'/'.$create->foto}}" class="img-fluid img-thumbnail" width="120px"></td>
      <td><a href="{{route('productos.edit',$create->id)}}" class="btn btn-light" style="color:blue;">Editar</a></td>


    <td>
      <form action="{{ url('productos/'.$create->id ) }}"  method="post">
      @csrf
      {{ method_field('DELETE') }}
      <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-light" style="color:red;">Borrar</button>
     </form>
    </td>
    </tr>
   
      @endforeach
  </tbody>
</table>


                </div>
            </div>
        </div>
    </div>