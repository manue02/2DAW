<?php
require_once ("persona.php");
require_once ("PersonaConsultada.php");
class Base {

    protected static function conexion() {

        //Devuelve un Objeto PDO
        try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion= new PDO("mysql:host=localhost;dbname=postresfavoritos","root","",$opciones);
        }
        catch (PDOException $e)
        {
            die ("Error:".$e->getMessage());
        }
        return $conexion;
    }




    protected static function ejecutaQuery($sql) {
//para ejecutar SELECT
        try {
            $conexion = self::conexion();
            $resultSet = $conexion->query($sql);
        } catch (PDOException $e) {
            die("Error:".$e->getMessage());
        }
        return $resultSet;
    }


	public static function consultaPrincipal($sql)
	{
		//devuelve un array de objetos PersonaConsultada
    }
        
    
	
    public static function obtenerCombo($tabla,$guarda,$muestra) {
		//array asociativo para los combos, recibe el nombre de la tabla el nombre de la columna que se muestra y el nombre de la columna que se guarda
	}



public static function introducirPersona($unapersona){
	   	
//recibe un objeto persona y mete datos en las tablas
}
	
}

