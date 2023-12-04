<?php
require_once './core/Modelo.php';

class Trabajos_requisitos extends Modelo {
    private $id;
    private $idTrabajo;
    private $idRequisito;
    private $_tabla='trabajos_requisitos';

    public function __construct($id=null,$idTrabajo=null,$idRequisito=null){
        $this->id = $id;
        $this->idTrabajo=$idTrabajo;
        $this->idRequisito=$idRequisito;
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
            'idTrabajo'=>"'$this->idTrabajo'",
            'idRequisito'=>"'$this->idRequisito'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'idTrabajo'=>"'$this->idTrabajo'",
            'idRequisito'=>"'$this->idRequisito'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}