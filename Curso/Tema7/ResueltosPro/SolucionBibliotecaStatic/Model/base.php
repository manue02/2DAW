<?php


require_once ("libro.php");
class Base {

    protected static function conexion() {

        //Devuelve un Objeto PDO
        try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion= new PDO("mysql:host=localhost;dbname=biblioteca","root","",$opciones);
        }
        catch (PDOException $e)
        {
            die ("Error:".$e->getMessage());
        }
        return $conexion;
    }




    protected static function ejecutaQuery($sql) {

        try {
            $conexion = self::conexion();
            $resultSet = $conexion->query($sql);
        } catch (PDOException $e) {
            die("Error:".$e->getMessage());
        }
        return $resultSet;
    }


	public static function obtenerLibros($sql)
	{
	$arrayLibros=array();
    $conexion = self::conexion();
    $resultado=$conexion->query($sql);
    while ($fila=$resultado->fetch(PDO::FETCH_ASSOC))
    {
        extract($fila);
        $arrayLibros[]=new Libro($titulo,$autor,$idioma,$editorial);
    }
    return $arrayLibros;
	}
    public static function obtenerCombo($tabla,$guarda,$muestra) {
           
        $arrayCombo = array();
        $sql="SELECT $guarda,$muestra FROM $tabla order by $muestra";
        $resultado =self::ejecutaQuery($sql);
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $indice=$row[$guarda];
            $arrayCombo[$indice] =$row[$muestra];
        }
        return $arrayCombo;
    }



public static function insertDatos($instruccion){
	   $bien=true;
	   try {
			
            $conexion = self::conexion();
            $numero = $conexion->exec($instruccion);
        } catch (PDOException $e) {
            $bien=false;
        }
        return $bien;
    }

	}

