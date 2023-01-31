<?php
require_once ("libro.php");
class Base {
	private $conexion;
    public function __construct() {
try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $this->conexion= new PDO("mysql:host=localhost;dbname=biblioteca","root","",$opciones);
        }
        catch (PDOException $e)
        {
            die ("Error:".$e->getMessage());
        }
        
      
    }
    private function ejecutaQuery($sql) {
    	try {
            
            $resultSet = $this->conexion->query($sql);
        } catch (PDOException $e) {
            die("Error:".$e->getMessage());
        }
        return $resultSet;
        }


	public  function obtenerLibros($sql)
	{
	$resultado=$this->ejecutaQuery($sql);
        $arrayLibros=array();
    while ($fila=$resultado->fetch(PDO::FETCH_ASSOC))
    {
        $arrayLibros[]=new libro($fila["titulo"],$fila["autor"],$fila["idioma"],$fila["editorial"]);
    }
    return $arrayLibros;   	
	}
    public  function obtenerCombo($tabla,$guarda,$muestra) {
    $sql="SELECT ".$guarda.",".$muestra. " FROM ".$tabla;
	$sql.=" ORDER BY ".$muestra;
	$resultado=$this->ejecutaQuery($sql);
	$arrayCombo[-1]=" Seleccione";
	while ($fila=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$indice=$fila[$guarda];
		$valor=$fila[$muestra];
		$arrayCombo[$indice]=$valor;
	}
    return $arrayCombo;  
        
    }



protected  function ejecutaConsultaAccion($instruccion){
	   $bien=true;
	   try {
			
             
            $numero = $this->conexion->exec($instruccion);
        } catch (PDOException $e) {
            $bien=false;
        }
        return $bien;
    }
public  function introducirLibro($autor,$idioma,$editorial,$titulo,$precio)
{
    $sql="INSERT INTO libros VALUES ('',".$autor.",".$idioma;
    $sql.=",".$editorial.",'".$titulo."',".$precio.")";
    $resultado=$this->ejecutaConsultaAccion($sql);
    return ($resultado);
}

	}

