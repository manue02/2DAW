<?php
require_once ("empleado.php");
require_once ("departamento.php");
class miclase {

    protected static function conexion() {

        //Devuelve un Objeto PDO
        try
        {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $conexion= new PDO("mysql:host=localhost;dbname=examen","root","",$opciones);
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

    protected static function ejecutaExec($sql) {

        try {
            $conexion = self::conexion();
            $registros = $conexion->exec($sql);

        } catch (PDOException $e) {
            die ("Error:".$e->getMessage());
        }
        return $registros;

    }

    public static function obtenerLocalidades() {
        $arrayLocalidades = [];

        $sql = "SELECT DISTINCT localidad FROM empleados";
        $resultado = self::ejecutaQuery($sql);
        $cont = 0;
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $arrayLocalidades[$cont] = $row['localidad'];
            $cont++;
        }
        return $arrayLocalidades;
    }



    public static function obtenerempleados($localidad,$horario) {

        $arrayempleados = [];
		$listaSelect= "SELECT empleados.*, departamentos.nombre as nomdepart FROM empleados inner JOIN departamentos on empleados.coddepart=departamentos.coddep ";
        $where=" WHERE true";
		if ($localidad<>"0")
		{
				$where.=" AND empleados.localidad = '".$localidad."'";
        }
		if ($horario <>"ambas")
		{
					$where.= " AND empleados.horario = '".$horario."'";
		}
			
			
		$orden=" ORDER BY empleados.localidad,empleados.horario, empleados.nombre";
        $sql=$listaSelect.$where.$orden;
        $resultado = self::ejecutaQuery($sql);

        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $empleado = new Empleado($row);
            $arrayempleados[] = $empleado;
        }
        return $arrayempleados;
    }
 public static function obtenerdepto($numero) {

      
		$sql= "SELECT  departamentos.*  FROM  departamentos WHERE departamentos.coddep=".$numero;
		$resultado = self::ejecutaQuery($sql);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $midep = new Departamento($row);    
        return $midep;
    }

    




    public static function InsertarVisita() {
        $dia = date ("j", strtotime(date("Y-m-d")));
		$mes = date ("n", strtotime(date("Y-m-d")));
		$anyo= date ("Y", strtotime(date("Y-m-d")));
		$fecha=date ("Y-m-d", mktime (0, 0, 0, $mes, $dia, $anyo));
		$sql="Insert into visitas(fecha) values ('".$fecha."')";
		 $numerovisitas =0;
        $nada=self::ejecutaExec($sql);	
		$cadenaSql = "SELECT count(*) as numero FROM visitas";
			 $resultado = self::ejecutaQuery($cadenaSql);
			 $fila=$resultado->fetch(PDO::FETCH_ASSOC);
			 $numerovisitas = $fila["numero"];
        return $numerovisitas;
    }
	}
