<?php
require_once './core/Modelo.php';

class Jurados_trabajo_aplicacion extends Modelo {
    private $id;
    private $idTrabajo;
    private $idJurado;
    private $notaJurado;
    private $_tabla='jurados_trabajo_aplicacion';

    public function __construct($id=null,$idTrabajo=null,$idJurado=null,$notaJurado=null){
        $this->id = $id;
        $this->idTrabajo=$idTrabajo;
        $this->idJurado=$idJurado;
        $this->notaJurado=$notaJurado;

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
            'idJurado'=>"'$this->idJurado'",
            'notaJurado'=>"'$this->notaJurado'",
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
            'idJurado'=>"'$this->idJurado'",
            'notaJurado'=>"'$this->notaJurado'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}