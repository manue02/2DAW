<?php

// echo "<pre>";
// print_r($contactos);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Listado de contactos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Mis contactos</h1>
        <table border="2">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->apellido }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>{{ $contacto->direccion }}</td>
                    </tr>
                @endforeach
            </tbody>
    
    </body>
</html>