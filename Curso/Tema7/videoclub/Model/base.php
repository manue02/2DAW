<?php

require_once ("personaje.php");
require_once ("trabajo.php");
class miclase {

    protected static function conexion() {

        //Devuelve un Objeto PDO
        try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion= new PDO("mysql:host=localhost;dbname=videoclub","root","",$opciones);
        }
        catch (PDOException $e)
        {
            die ("Error:".$e->getMessage());
        }
        return $conexion;
    }



    //solo select
    protected static function ejecutaQuery($sql) {

        try {
            $conexion = self::conexion();
            $resultSet = $conexion->query($sql);
        } catch (PDOException $e) {
            die("Error:".$e->getMessage());
        }
        return $resultSet;
    }

    //update,delete,insert
    protected static function ejecutaExec($sql) {

        try {
            $conexion = self::conexion();
            $resultSet = $conexion->exec($sql);
        } catch (PDOException $e) {
            die("Error:".$e->getMessage());
        }
        return $resultSet;
    }



    public static function obtenerTareas() {
      
	/*Devuelve un array con todos los valores distintos de la columna tarea existentes en la tabla trabajo para las etiquetas
	en la introducción de datos*/
    $sql = "SELECT DISTINCT tarea FROM `trabajo` ORDER BY tarea";
    $resultado = self::ejecutaQuery($sql);
    while($fila = $resultado->fetch(PDO::FETCH_ASSOC))
    {
        $arrayTareas[] = $fila;   
    }

    return $arrayTareas;

    }

    public static function obtenerPersonas($tarea) {
        $str = substr($tarea, 0,5);


        $arrayPersonas = array();
        $sql = "SELECT nombre_persona FROM `personaje` WHERE TRUE";
        
        if($str == "Actor")
        {
            $sql .= " AND sexo_persona = 'H'";
            
        }

        if($str == "Actri")
        {
            $sql .= " AND sexo_persona = 'M'";
        }

           
            $resultado = self::ejecutaQuery($sql);
            while($fila = $resultado->fetch(PDO::FETCH_ASSOC))
            {
                $arrayPersonas[] = $fila;   
            }
            return $arrayPersonas;

    }
	
/*Devuelve un array  de  objetos Personaje para los combos en la introduccion de datos 
Para los actores(principal y secundario) deben salir los hombres y para las actrices (principal y secundaria) las mujeres
*/
        

public static function insertDatos($nombrepeli,$tareas,$personas){

/* insertara los datos en las tablas peliculas y trabajo 
*/
        $insertartitulo = "INSERT INTO `peliculas`( `titulo`) VALUES ('" . $nombrepeli . "')";
        $resultadoInsercion = self::ejecutaExec($insertartitulo);
        $selectTitulo = "SELECT numpelicula from peliculas WHERE titulo ='" . $nombrepeli . "'";
        $resultadoTitulo = self::ejecutaQuery($selectTitulo);
        while ($fila = $resultadoTitulo->fetch(PDO::FETCH_ASSOC)){
            $idpelicula = $fila;
        }
        foreach($idpelicula as $numero)
                {
                    $peli = $numero;
                }
        foreach($personas as $key => $valor){
            if($valor != 0)
            {
                $buscaridpersonas = "SELECT numero FROM `personaje` WHERE nombre_persona ='" . $valor . "'";
              
                $resultado = self::ejecutaQuery($buscaridpersonas);
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $idpersona = $fila;
                }
                foreach($idpersona as $numero)
                {
                    $personita = $numero;
                }

                $tareaRealizar = $tareas[$key];
                
                $insertTotal = "INSERT INTO `trabajo`(`cip`, `persona`, `tarea`) VALUES ('".$peli."','".$personita."','".$tareaRealizar."')";
                $arrayprueba[] = $insertTotal;
              
                $resultadoInsercion = self::ejecutaExec($insertTotal);
            }
        }
        return $resultadoInsercion;

	}
}