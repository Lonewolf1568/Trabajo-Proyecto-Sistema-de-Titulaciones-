<?php
require_once './core/Modelo.php';

class Requisitos extends Modelo {
    private $id;
    private $nombre;
    private $idModalidad;
    private $_tabla='requisitos';
    private $_vista='v_requisitos';

    public function __construct($id=null,$nombre=null,$idModalidad=null){
        $this->id = $id;
        $this->nombre=$nombre;
        $this->idModalidad=$idModalidad;
        parent::__construct($this->_tabla);
    } 
    public function getTodo(){
        $this->setTabla($this->_vista);
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteById($this->id);
    }
    public function guardar(){
        $datos = [
            'id'=>$this->id,
            'nombre'=>"'$this->nombre'",
            'idModalidad'=>"'$this->idModalidad'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'nombre'=>"'$this->nombre'",
            'idModalidad'=>"'$this->idModalidad'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}