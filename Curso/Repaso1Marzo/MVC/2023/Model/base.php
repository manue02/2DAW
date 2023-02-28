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

        $resultado = self::ejecutaQuery($sql);
        $arrayPersonas = array();

        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

            echo "<pre>";
            print_r($row);
            echo "</pre>";

            $id = $row["id"];
            $nombre = $row["nombre"];
            $estudia = $row["denominacion"];
            $postres = "prueba";
            $persona = new PersonaConsultada($id, $nombre, $estudia, $postres);
            $arrayPersonas[] = $persona;
        }

        return $arrayPersonas;

    }



    public static function obtenerCombo($tabla, $guarda, $muestra)
    {
        //array asociativo para los combos, recibe el nombre de la tabla el nombre de la columna que se muestra y el nombre de la columna que se guarda

        $sql = "SELECT $guarda,$muestra FROM $tabla ORDER BY $muestra";
        $resultado = self::ejecutaQuery($sql);
        $arrayCombo[-1] = " Seleccione";
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {

            $indice = $row[$guarda];
            $arrayCombo[$indice] = $row[$muestra];

        }

        return $arrayCombo;


    }



    public static function introducirPersona($unapersona)
    {
        //recibe un objeto persona y mete datos en las tablas
        $sql = "INSERT INTO encuesta (nombre,estudia) VALUES ('" . $unapersona->getNombre() . "','" . $unapersona->getTrabajo() . "')";
        echo $sql;
        $resultado = self::ejecutaQuery($sql);
        $id = self::conexion()->lastInsertId();
        $postres = $unapersona->getPostres();
        foreach ($postres as $postre) {
            $sql = "INSERT INTO relacion (id_usuario,id_caracteristica) VALUES ($id,$postre)";
            echo $sql;
            $resultado = self::ejecutaQuery($sql);
        }
    }

}