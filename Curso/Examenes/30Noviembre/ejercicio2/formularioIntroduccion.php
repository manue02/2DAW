<?php
include('funciones.php');

$conexion = mysqli_connect("localhost", "root", "", "preparadasb")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");
include("funcionesBD.php");
extract($_POST);

$sql = "SELECT cursos.nombre as Cursos , cursos.id as Clave FROM cursos WHERE true AND cursos.id LIKE '%$ComboCursos%'";

$resultado = mysqli_query($conexion, $sql);



while ($fila = mysqli_fetch_assoc($resultado)) {

    extract($fila);

}

$sql2 = "SELECT alumnos.nombre as Nombre FROM alumnos_cursos inner join alumnos on alumnos.id=alumnos_cursos.id_alumno WHERE true AND alumnos_cursos.id_curso=$Cursos";
$resultado2 = mysqli_query($conexion, $sql2);


cabecera('Alumnos');
echo "<div id=\"contenido\">";
echo "<table align=center border=2 bgcolor='#F0FFFF'>";
echo "<td colspan=2 align=center>Seleccione alumnos para asignar a $Cursos  , Año: $año </td><tr>";

echo "<td colspan= align=center>Alumnos</td>";

echo "<td align=center>Selección</td><tr>";
echo "<form name='modificar' method=\"POST\" action='scriptactualizacion.php'>";

?>



<tr>
    <td colspan=2 align=center><br><input type=submit value='Grabar'>
</tr>



</form>
</table>

</html>