<?php
class Producto {
  private $cod;
  private $nombre;
  private $precio;
  private $familia;  
  function __construct($cod, $nombre,$precio,$familia) {
    $this->cod = $cod;
    $this->nombre = $nombre;
	$this->precio = $precio;
    $this->familia = $familia;
  
  }
  public function getCod() {
    return $this->cod;
  }
  public function getNombre() {
    return $this->nombre;
  }
   public function getPrecio() {
    return $this->precio;
  }
  public function getFamilia() {
    return $this->familia;
  }
  }  
  ?>