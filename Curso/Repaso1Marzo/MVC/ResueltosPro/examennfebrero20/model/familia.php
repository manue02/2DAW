<?php
class Familia {
  private $cod;
  private $nombre;
    
  function __construct($codigo, $titulo) {
    $this->cod = $codigo;
    $this->nombre = $titulo;
  
  }
  public function getCod() {
    return $this->cod;
  }
  public function getNombre() {
    return $this->nombre;
  }
  
  }  
  ?>