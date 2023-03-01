<html>

<head>
    <title> Gestión de aulas </title>
</head>

<body>
    <h1>Gestión de aulas</h1>
    <p>

        <?php

        include("funcionesBD.php");

        //saldran las aulas libres que no tienen en un radiobutton 
        
        echo "<form method='POST' action='actualiza.php'>";
        echo '<br><input type="submit" name="submit" value="Enviar" /></form>';
        ?>