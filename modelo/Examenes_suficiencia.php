<?php
require_once './core/Modelo.php';

class Examenes_suficiencia extends Modelo {
    private $id;
    private $notaTeoria;
    private $notaPractica;
    private $idBachiller;
    private $notaFinal;
    private $numeroActa;
    private $acta;
    private $fechaSustentacion;
    private $nombre;

    private $_tabla='examenes_suficiencia';

    public function __construct($id=null,$notaTeoria=null,$notaPractica=null,$idBachiller=null,$notaFinal=null,$numeroActa=null,$acta=null,$fechaSustentacion=null,$nombre=null){
        $this->id = $id;
        $this->notaTeoria=$notaTeoria;
        $this->notaPractica=$notaPractica;
        $this->idBachiller=$idBachiller;
        $this->notaFinal=$notaFinal;
        $this->numeroActa=$numeroActa;
        $this->acta=$acta;
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
            'idBachiller'=>"'$this->idBachiller'",
            'notaFinal'=>"'$this->notaFinal'",
            'numeroActa'=>"'$this->numeroActa'",
            'acta'=>"'$this->acta'",
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
            'idBachiller'=>"'$this->idBachiller'",
            'notaFinal'=>"'$this->notaFinal'",
            'numeroActa'=>"'$this->numeroActa'",
            'acta'=>"'$this->acta'",
            'fechaSustentacion'=>"'$this->fechaSustentacion'",
            'nombre'=>"'$this->nombre'",

        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}