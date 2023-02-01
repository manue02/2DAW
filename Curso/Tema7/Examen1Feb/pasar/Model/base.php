<?php
require_once("persona.php");
require_once("PersonaConsultada.php");
class Base
{

    protected static function conexion()
    {

        //Devuelve un Objeto PDO
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion = new PDO("mysql:host=localhost;dbname=postresfavoritos", "root", "", $opciones);
        } catch (PDOException $e) {
            die("Error:" . $e->getMessage());
        }
        return $conexion;
    }




    protected static function ejecutaQuery($sql)
    {
        //para ejecutar SELECT
        try {
            $conexion = self::conexion();
            $resultSet = $conexion->query($sql);
        } catch (PDOException $e) {
            die("Error:" . $e->getMessage());
        }
        return $resultSet;
    }


    public static function consultaPrincipal($sql)
    {
        //devuelve un array de objetos PersonaConsultada
        $resultSet = self::ejecutaQuery($sql);
        $arrayPersonas = array();
        while ($fila = $resultSet->fetch(PDO::FETCH_ASSOC)) {


            $arrayPersonas[] = new PersonaConsultada($fila["id"], $fila["nombre"], $fila["denominacion"], $fila["nombrepostre"]);

        }
        return $arrayPersonas;

    }



    public static function obtenerCombo($tabla, $guarda, $muestra)
    {
        //array asociativo para los combos, recibe el nombre de la tabla el nombre de la columna que se muestra y el nombre de la columna que se guarda

        $array = array();
        $sql = "SELECT $guarda,$muestra FROM $tabla";
        $resultSet = self::ejecutaQuery($sql);
        while ($fila = $resultSet->fetch(PDO::FETCH_ASSOC)) {
            $array[$fila[$guarda]] = $fila[$muestra];
        }
        return $array;

    }



    public static function introducirPersona($unapersona)
    {

        //recibe un objeto persona y mete datos en las tablas

        $sql = "INSERT INTO encuesta (id ,nombre,estudia) VALUES ('" . "','" . $unapersona->getNombre() . "','" . $unapersona->getTrabajo() . "')";
        $conexion = self::conexion();
        $conexion->exec($sql);
        echo $sql;
        $id = $conexion->lastInsertId();
        $arrayPostres = array();
        $arrayPostres = $unapersona->getPostres();
        // $sql2 = "INSERT INTO relacion (id_usuario,id_caracteristica) VALUES ('" . $id . "','" . $unapersona->getPostres() . "')";
        //$conexion->exec($sql2);
        //echo $sql2;


    }



}