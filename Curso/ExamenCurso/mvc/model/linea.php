<?php
class Linea {
  private $cod_linea;
  private $nombre;
  private $ubicacion; 
  function __construct($codigo, $titulo,$ubicacion) {
    $this->cod_linea = $codigo;
    $this->nombre = $titulo;
	$this->ubicacion=$ubicacion;
  
  }
  public function getCodigo() {
    return $this->cod_linea;
  }
  public function getNombre() {
    return $this->nombre;
  }
   public function getUbicacion() {
    return $this->ubicacion;
  }
  }  
  ?>