<!-- listapeliculas.php -->
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html>

<head>
	<title> lista peliculas </title>
</head>

<body>
	<h1>Gestión de peliculas</h1>
	<p><a href="peliculas.php">Nueva búsqueda</a></p>
	<?php
    include('funcionesBd.php');
    $searchtext = $_POST['searchtext'];
    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "filmoteca");
    mysqli_set_charset($conexion, "utf8");
    $select = "SELECT  peliculas.id,  peliculas.id_autor, peliculas.id_idioma, peliculas.id_company, peliculas.titulo,peliculas.fecha, personas.nombre as autor,company.nombre as company, idiomas.nombre as idioma ";
    $from = " FROM peliculas inner join personas  on peliculas.id_autor=personas.id";
    $from .= " INNER JOIN idiomas ON peliculas.id_idioma=idiomas.id INNER JOIN company on peliculas.id_company=company.id";
    $where = " WHERE true  ";
    //echo $select.$from.$where;
    if ($aid != 0) {
	    $where .= " AND peliculas.id_autor=$aid";
    }

    if ($eid != 0) {
	    //$select .=", company.CID, NOMBRE";
    	//$from  .= ", company";
    
	    $where .= " AND  peliculas.id_company=$eid";
    }

    if ($lid != 0) { // A
//$select .=", idioma.LID, IDIOMA";
// $from  .= ", idioma";
    	$where .= "  AND peliculas.id_idioma=$lid";
    }
    if ($searchtext != "") {
	    $where .= " AND TITULO LIKE '%$searchtext%'";
    }
    $orderby = " ORDER BY peliculas.titulo, peliculas.fecha";
    $cadenasql = $select . $from . $where . $orderby;
    //echo $cadenasql;
    $resultSet = mysqli_query($conexion, $cadenasql);
    if (!$resultSet) {

	    echo ("<p>Error !<br />" .
	    	"Error: " . mysqli_error($conexion) . "</p>");
	    exit();
    }
    $hay = mysqli_num_rows($resultSet);
    if ($hay > 0) {

	    echo '<table border="1"><tr><th>Título</th><th>Autor</th><th>Idioma</th><th>company-fecha</th></tr>	';
	    $fila = mysqli_fetch_assoc($resultSet);
	    while ($fila) {

		    echo "<tr><td>" . $fila["titulo"] . "</td><td>" . $fila["autor"] . "</td><td>" . $fila["idioma"] . "</td><td>";
		    $tituloAnterior = $fila["titulo"];

		    while ($fila && $tituloAnterior == $fila["titulo"]) {

			    while ($fila && $tituloAnterior == $fila["titulo"]) {
				    echo $fila["company"] . ", " . $fila["fecha"] . "<br>";
				    $fila = mysqli_fetch_assoc($resultSet);
			    }
			    echo "</td>";
		    }
		    echo "</tr>";

	    }
	    echo "</table>";
    } else
	    echo "ningún pelicula cumple las condiciones especificadas";

    //echo "</table>".$select . $from . $where;
    ?>
	</table>
</body>

</html>