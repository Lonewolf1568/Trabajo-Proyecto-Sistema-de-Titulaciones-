<?php
require_once './core/Modelo.php';

class Examenes_suficiencia extends Modelo {
    private $id;
    private $notaTeoria;
    private $notaPractica;
    private $fechaSustentacion;
    private $nombre;

    private $_tabla='examenes_suficiencia';

    public function __construct($id=null,$notaTeoria=null,$notaPractica=null,$fechaSustentacion=null,$nombre=null){
        $this->id = $id;
        $this->notaTeoria=$notaTeoria;
        $this->notaPractica=$notaPractica;
        $this->fechaSustentacion=$fechaSustentacion;
        $this->nombre=$nombre;
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
            'notaTeoria'=>"'$this->notaTeoria'",
            'notaPractica'=>"'$this->notaPractica'",
            'fechaSustentacion'=>"'$this->fechaSustentacion'",
            'nombre'=>"'$this->nombre'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'notaTeoria'=>"'$this->notaTeoria'",
            'notaPractica'=>"'$this->notaPractica'",
            'fechaSustentacion'=>"'$this->fechaSustentacion'",
            'nombre'=>"'$this->nombre'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}