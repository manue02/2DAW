<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    {{extract($_POST)}}

        <h1>Formulario salida</h1>

        <p>Nombre: {{ $nombre }}</p>
        <p>Apellidos: {{ $apellidos }}</p>
        <p>Edad: {{ $edad }}</p>

      
    </body>
</html>