<?php 

// echo "<preº>";

// dd($productos);

// echo "</pre>";

?>


<!DOCTYPE html>
<html>
   
<body>

<h3 style="text-align: center;">Modificar el Producto</h3>

<form action method="POST">

<p>Codigo: <input type="text" name="codigo" value="{{$producto->codigo}}" readonly></p>
<p>Descripcion: <input type="text" name="descripcion" value="{{$producto->descripcion}}"></p>
<p>Precio Compra: <input type="text" name="precio_compra" value="{{$producto->precio_compra}}"></p>
<p>Precio Venta: <input type="text" name="precio_venta" value="{{$producto->precio_venta}}"></p>
<p>Stock: <input type="text" name="stock" value="{{$producto->stock}}"></p>

<input type="submit" name="enviar" value="Envio">


</form>


<a href="{{route('productos.index')}}">Volver al listado</a>


</body>
</html>
