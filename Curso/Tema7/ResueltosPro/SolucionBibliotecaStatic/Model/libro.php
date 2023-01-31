<?php

class Libro {
    protected $tituloLibro;
    protected $autorLibro;
	protected $idiomaLibro;
	protected $editorialLibro;  
	  
    public function getTitulo() {return $this->tituloLibro; }
    public function getIdioma() {return $this->idiomaLibro; }
    public function getAutor() {return $this->autorLibro; }
	public function getEditorial() {return $this->editorialLibro;}
  
    
    
    public function __construct($titulo,$autor,$idioma,$editorial) {
        $this->tituloLibro = $titulo;
        $this->autorLibro = $autor;		
		$this->idiomaLibro = $idioma;
        $this->editorialLibro = $editorial;
				
    }
}

?>
