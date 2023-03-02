<?php
require_once('producto.php');
require_once('linea.php');
require_once('ventas.php');

class base
{
        protected static function conexion()
        {
                $con = new mysqli('localhost', 'root', '', 'parte2');
                $con->set_charset("utf8");
                return $con;
        }
        protected static function EjecutaConsulta($sql)
        {
                return (self::conexion()->query($sql));

        }
        public static function obtieneLineas()
        {
                //devuelve un array de lineas para el combo inicial

                $arrayLineas = array();
                $sql = "SELECT * FROM lineas";
                $resultado = self::EjecutaConsulta($sql);
                while ($fila = $resultado->fetch_assoc()) {
                        $linea = new linea($fila['cod_linea'], $fila['desc_linea'], $fila['ubicacion']);
                        $arrayLineas[] = $linea;
                }
                return $arrayLineas;



        }
        public static function obtieneProductos($linea)
        {
                //devuelve un array de productos de la linea seleccionada en el combo inicial
                $arrayProductos = array();
                $sql = "SELECT * FROM productos WHERE linea_producto = $linea";
                $resultado = self::EjecutaConsulta($sql);

                while ($fila = $resultado->fetch_assoc()) {

                        echo "<pre>";
                        print_r($fila);
                        echo "</pre>";
                        $producto = new producto($fila['cod_producto'], $fila['descripcion'], $fila['precio'], $fila['linea_producto']);
                        $arrayProductos[] = $producto;
                }

                return $arrayProductos;
        }

        public static function obtieneVentas($producto)
        {
                // devuelve un array de ventas del producto recibido como parámetro
                $arrayVentas = array();
                $sql = "SELECT * FROM ventas WHERE cod_producto = $producto";
                $resultado = self::EjecutaConsulta($sql);
                while ($fila = $resultado->fetch_assoc()) {
                        $venta = new cod_producto($fila['nif'], $fila['cod_producto'], $fila['unidades'], $fila['fecha']);
                        $arrayVentas[] = $venta;
                }

                return $arrayVentas;
        }
        public static function obtieneCampoTabla($campo, $tabla, $clave, $valor)
        {
                /*devuelve el valor de la columna $campo de la tabla $tabla cuya columna primary key $clave tiene el valor $valor   
                ejemplos: obtieneCampoTabla("nombre","clientes","nif","28282828T") devuelve "Pedro Cortés"
                obtieneCampoTabla("descripcion","productos","cod_producto",2222) devuelve "EQUIPO SONY GHY-999"
                
                */
                $sql = "SELECT $campo FROM $tabla WHERE $clave = '$valor'";
                $resultado = self::EjecutaConsulta($sql);
                $fila = $resultado->fetch_assoc();
                return $fila[$campo];
        }

}