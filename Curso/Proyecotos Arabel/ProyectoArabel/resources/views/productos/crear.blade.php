<?php 

// echo "<preº>";

// dd($productos);

// echo "</pre>";

?>

<!DOCTYPE html>
<html>
   
<body>

<h3 style="text-align: center;">Crear el Producto</h3>

<form action="{{route('productos.store')}}" method="POST">

<p>Codigo: <input type="text" name="codigo" value="" readonly></p>
<p>Descripcion: <input type="text" name="descripcion" value=""></p>
<p>Precio Compra: <input type="text" name="precio_compra" value=""></p>
<p>Precio Venta: <input type="text" name="precio_venta" value=""></p>
<p>Stock: <input type="text" name="stock" value=""></p>

<input type="submit" name="enviar" value="Envio">



</form>


<a href="{{route('productos.index')}}">Volver al listado</a>


</body>
</html>
