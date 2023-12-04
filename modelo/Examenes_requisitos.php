<?php
require_once './core/Modelo.php';

class Examenes_requisitos extends Modelo {
    private $id;
    private $idExamen;
    private $idRequisito;
    private $_tabla='examenes_requisitos';

    public function __construct($id=null,$idExamen=null,$idRequisito=null){
        $this->id = $id;
        $this->idExamen=$idExamen;
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
            'idExamen'=>"'$this->idExamen'",
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
            'idExamen'=>"'$this->idExamen'",
            'idRequisito'=>"'$this->idRequisito'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}