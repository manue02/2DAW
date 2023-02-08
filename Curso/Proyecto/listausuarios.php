<?php

require_once 'sesiones.php';
require_once 'bd.php';
require_once 'conexion.php';
comprobar_sesion();

extract($_POST);

echo "<h1>Usuario: " . $Cliente . "</h1>";

//mostrar una tabla con todos los pedidos del usuario
$pedidos = cargar_pedidos($Cliente);

if ($pedidos === FALSE) {
    echo "<p>No hay pedidos</p>";
    exit;
}
echo "<h2>Pedidos</h2>";
echo "<table>"; //abrir la tabla
echo "<tr><th>Fecha</th><th>Fecha</th></tr>";
while ($pedido = mysqli_fetch_assoc($pedidos)) {
    $cod = $pedido['Nombre'];
    $fecha = $pedido['FECHA'];

    echo "<pre>";
    print_r($pedido);
    echo "</pre>";
    //print_r($producto);				
    echo "<tr><td>$cod</td><td>$fecha</td>
        <td><form action = 'ver_pedido.php' method = 'POST'>
        
      
        </form></td></tr>";
}

?>