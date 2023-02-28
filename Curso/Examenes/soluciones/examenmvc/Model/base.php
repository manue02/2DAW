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
		$resultado=self::ejecutaQuery($sql);
        $arrayUsuarios=array();
        while ($fila=$resultado->fetch(PDO::FETCH_ASSOC))
        {
        extract($fila);
        $sqlAux="SELECT  postres.nombre FROM postres inner join RELACION on postres.id=RELACION.id_caracteristica WHERE RELACION.id_usuario=$id order by nombre";
        $resultadoAux=self::ejecutaQuery($sqlAux);
        $arrayAux=array();
        while ($filaAux=$resultadoAux ->fetch(PDO::FETCH_ASSOC))
        {
            $arrayAux[]=$filaAux["nombre"];

        }
        $arrayUsuarios[]=new PersonaConsultada($id,$nombre,$nombreEstudio,$arrayAux);
    

    }
    return $arrayUsuarios;    
    }
	
    public static function obtenerCombo($tabla,$guarda,$muestra) {
	$sql="SELECT ".$guarda.",".$muestra. " FROM ".$tabla;
	$sql.=" ORDER BY ".$muestra;
   
	$resultado=self::ejecutaQuery($sql);
	$arrayCombo[-1]=" Seleccione";
	while ($fila=$resultado->fetch(PDO::FETCH_ASSOC))
	{
		$indice=$fila[$guarda];
		$valor=$fila[$muestra];
		$arrayCombo[$indice]=$valor;
	}
    return $arrayCombo;    
    }



public static function introducirPersona($unapersona){
	   	
    $conexion = self::conexion();
	$sql1="INSERT INTO encuesta(nombre,estudia) VALUES ('".$unapersona->getNombre()."',".$unapersona->getTrabajo().")";
    if(!$resultado=$conexion->exec($sql1))
        return false;
    $idNuevo=$conexion->lastInsertId();
        
    foreach ($unapersona->getPostres() as $codPostre)
    {
		$sql2="INSERT INTO relacion VALUES($idNuevo,$codPostre)";
        if (!$resultado2=$conexion->exec($sql2))
            return false;
    }
return true;

}
	
}

