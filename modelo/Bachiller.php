<?php
require_once './core/Modelo.php';

class Bachiller extends Modelo {
    private $id;
    private $tieneIdiomaExtranjero;
    private $culminoEstudios;
    private $añoTermino;
    
    private $_tabla='bachilleres';

    public function __construct($id=null,$tieneIdiomaExtranjero=null,$culminoEstudios=null,$añoTermino=null){
        $this->id = $id;
        $this->tieneIdiomaExtranjero=$tieneIdiomaExtranjero;
        $this->culminoEstudios=$culminoEstudios;
        $this->añoTermino=$añoTermino;
        parent::__construct($this->_tabla);
    }
    public function getTodo(){
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteById($this->id);
    }
    public function guardar(){
        $datos = [
            'id'=>$this->id,
            'tieneIdiomaExtranjero'=>"'$this->tieneIdiomaExtranjero'",
            'culminoEstudios'=>"'$this->culminoEstudios'",
            'añoTermino'=>"'$this->añoTermino'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'tieneIdiomaExtranjero'=>"'$this->tieneIdiomaExtranjero'",
            'culminoEstudios'=>"'$this->culminoEstudios'",
            'añoTermino'=>"'$this->añoTermino'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}