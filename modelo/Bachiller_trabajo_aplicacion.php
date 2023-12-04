<?php
require_once './core/Modelo.php';

class Bachiller_trabajo_aplicacion extends Modelo {
    private $id;
    private $idBachiller;
    private $idTrabajo;
    
    private $_tabla='bachiller_trabajo_aplicacion';

    public function __construct($id=null,$idBachiller=null,$idTrabajo=null){
        $this->id = $id;
        $this->idBachiller=$idBachiller;
        $this->idTrabajo=$idTrabajo;
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
            'idBachiller'=>"'$this->idBachiller'",
            'idTrabajo'=>"'$this->idTrabajo'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'idBachiller'=>"'$this->idBachiller'",
            'idTrabajo'=>"'$this->idTrabajo'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}