<?php
class cod_producto
{
  private $nif;
  private $nombre;
  private $unidades;
  private $fecha;
  function __construct($codigo, $titulo, $fecha, $unidades)
  {
    $this->nif = $codigo;
    $this->nombre = $titulo;
    $this->unidades = $unidades;
    $this->fecha = $fecha;
  }
  public function getNif()
  {
    return $this->nif;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function getUnidades()
  {
    return $this->unidades;
  }
  public function getFecha()
  {
    return $this->fecha;
  }
}
?>