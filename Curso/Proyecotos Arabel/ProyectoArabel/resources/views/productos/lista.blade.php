<?php 

// echo "<preº>";

// dd($productos);

// echo "</pre>";

?>


<!DOCTYPE html>
<html>
   
<body>


<table border="1">
<tr><th colspan="1">Codigo</th><th>Descripcion</th><th colspan="1">Precio Compra</th><th colspan="1">Precio Venta</th><th colspan="1">Margen</th><th colspan="1">Stock</th> <th colspan="4">Acciones</th></tr>


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

<button onclick="window.location.href='/productos/eliminar/{{$producto->codigo}}'">Eliminar</button> 
<button onclick="window.location.href='/productos/modificar/{{$producto->codigo}}'">Modificar</button>  
<button onclick="window.location.href='/productos/eliminar/{{$producto->codigo}}'">Entrada</button>  
<button onclick="window.location.href='/productos/eliminar/{{$producto->codigo}}'">Salida</button>  



</td>

</tr>


@endforeach


</body>
</html>
