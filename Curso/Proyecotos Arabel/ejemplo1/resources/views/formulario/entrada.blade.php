<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <h1>Formulario de entrada</h1>

    <form action="{{ route('formulario.entrada') }}" method="POST">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" ">
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" ">
        <br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad" ">
   
        <input type="submit" value="Enviar">



    </body>
</html>