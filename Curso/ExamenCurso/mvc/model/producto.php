<?php
class Producto {
  private $cod_producto;
  private $descripcion;
  private $precio;
  private $linea_producto;  
  function __construct($cod_producto, $descripcion,$precio,$linea_producto) {
    $this->cod_producto = $cod_producto;
    $this->descripcion = $descripcion;
	$this->precio = $precio;
    $this->linea_producto = $linea_producto;
  
  }
  public function getCod_Producto() {
    return $this->cod_producto;
  }
  public function getDescripcion() {
    return $this->descripcion;
  }
   public function getPrecio() {
    return $this->precio;
  }
  public function getLinea_Producto() {
    return $this->linea_producto;
  }
  }  
  ?>