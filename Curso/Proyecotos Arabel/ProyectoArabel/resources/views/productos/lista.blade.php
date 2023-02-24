
<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

   
<body>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>




<table class="table">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Descripcion</th>
      <th>Precio Compra</th>
      <th>Precio Venta</th>
      <th>Margen</th>
      <th>Stock</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    @php
    $margen = $producto->precio_venta - $producto->precio_compra;
    @endphp
    <tr>
      <td>{{$producto->codigo}}</td>
      <td>{{$producto->descripcion}}</td>
      <td>{{$producto->precio_compra}}</td>
      <td>{{$producto->precio_venta}}</td>
      <td>{{$margen}}</td>
      <td>{{$producto->stock}}</td>
      <td>
        <a href="/productos/eliminar/{{$producto->codigo}}" onclick="return eliminarProducto('Eliminar Producto')" class="btn btn-danger">Eliminar</a>
        <button onclick="window.location.href='/productos/modificar/{{$producto->codigo}}'" class="btn btn-primary">Modificar</button>
        <form action="{{ route('productos.incrementarStock', $producto->codigo) }}" method="POST" style="display: inline;">
          @csrf
          @method('PUT')
          <button type="submit" class="btn btn-success">Entrada</button>
        </form>
        <form action="{{ route('productos.disminuirStock', $producto->codigo) }}" method="POST" style="display: inline;">
          @csrf
          @method('PUT')
          <button type="submit" class="btn btn-warning">Salida</button>
        </form>
        <a href="{{route('productos.create')}}" class="btn btn-dark">Crear Producto</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>


<script>
   
   function eliminarProducto(value){

    action = confirm(value) ? true : event.preventDefault()

   }


</script>


</body>
</html>
