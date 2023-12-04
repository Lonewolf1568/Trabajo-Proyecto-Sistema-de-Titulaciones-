<?php
require_once './core/Modelo.php';

class Turnos extends Modelo {
    private $id;
    private $turno;

    private $_tabla='turnos';

    public function __construct($id=null,$turno=null){
        $this->id = $id;
        $this->turno=$turno;
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
            'turno'=>"'$this->turno'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'turno'=>"'$this->turno'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}