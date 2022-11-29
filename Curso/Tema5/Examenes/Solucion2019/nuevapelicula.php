<!-- nuevapelicula.php -->
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html>

<head>
  <title> Añadir nueva pelicula </title>
</head>

<body>
  <?php
  $conexion = mysqli_connect("localhost", "root", "", "filmoteca");
  mysqli_set_charset($conexion, "utf8");
  if (isset($_POST['submit'])) {
    if (empty($_POST['nombre']) || $_POST["lid"] == 0 || $_POST["aid"] == 0 || $_POST["eid"] == 0 and $_POST["fecha"] > 0) {
      echo ("<p>debes rellenar todos los campos .  <a href='nuevapelicula.php'> Vuelve a intentarlo</a></p>");
      exit();
    }
    extract($_POST);
    $cadenaComprueba = "SELECT id,fecha FROM peliculas WHERE id_autor=" . $aid . " AND id_idioma=" . $lid . " AND id_company=" . $eid . " AND titulo='" . $nombre . "'";
    //echo $cadenaComprueba;
  
    $resultComprueba = mysqli_query($conexion, $cadenaComprueba);
    if (mysqli_num_rows($resultComprueba) == 0) {
      $sql = "INSERT INTO peliculas(ID_AUTOR,TITULO,ID_IDIOMA,ID_company,fecha) VALUES ($aid,'$nombre',$lid,$eid,$fecha)";

      if (@mysqli_query($conexion, $sql)) {
        echo ("<p>Ha añadido una nueva pelicula</p>");
      } else {
        echo ("<p>Error : " .
          mysqli_error($conexion) . "</p>");

      }
    } else {
      echo "Ya existe ese pelicula ¿Desea actualizar la fecha?";
      $fila = mysqli_fetch_assoc($resultComprueba);
      echo "<form action='update.php' method ='POST'>";
      echo "<input type='radio' name='accion' value='N' checked>No <br>";
      echo "<input type='radio' name='accion' value='S'>Si<br>";
      echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
      echo "<input type='hidden' name='fecha' value='" . $_POST['fecha'] . "'>";
      echo "<input type='submit' VALUE='enviar'></form>";

    }

  ?>



  <p><a href="nuevapelicula.php">Añadir otra pelicula</a></p>
  <p><a href="admin.html">vuelta a la home</a></p>

  <?php
  } else {


  ?>

  <form method="post">
    <p>Introduzca la nueva pelicula:<br />
    <p>nombre:<br />
      <textarea name="nombre" rows="2" cols="45" wrap>
</textarea>
    </p>

    <p>Autor:
      <?php
    include('funcionesBd.php');
    $conexion = mysqli_connect("localhost", "root", "", "filmoteca");
    mysqli_set_charset($conexion, "utf8");

    $arrayAutores = obtenerArrayOpciones("personas", "ID", "NOMBRE");
    pintarComboMensaje($arrayAutores, "aid", "Seleccione..", 0);

    echo "<br><br>Compañia:";
    $arrayCats = obtenerArrayOpciones("company", "ID", "NOMBRE");
    pintarComboMensaje($arrayCats, "eid", "Seleccione..", 0);

    echo "<br><br>Idioma:";
    $arrayIdiomas = obtenerArrayOpciones("idiomas", "ID", "NOMBRE");
    pintarComboMensaje($arrayIdiomas, "lid", "Seleccione..", 0);

      ?>
      <br><br>
      fecha:<input type="text" name="fecha"><br>
    <p><input type="submit" name="submit" value="ENVIAR"></p>
  </form>
  <?php } ?>
</body>

</html>