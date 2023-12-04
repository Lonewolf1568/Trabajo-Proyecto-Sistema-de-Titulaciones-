<?php
require_once './core/Modelo.php';

class Trabajos_aplicacion_profesional extends Modelo {
    private $id;
    private $titulo;
    private $idAsesor;
    private $fechaSustentacion;
    private $notaFinal;
    private $numeroActa;
    private $acta;
    private $_tabla='trabajos_aplicacion_profesional';

    public function __construct($id=null,$titulo=null,$idAsesor=null,$fechaSustentacion=null,$notaFinal=null,$numeroActa=null,$acta=null){
        $this->id = $id;
        $this->titulo=$titulo;
        $this->idAsesor=$idAsesor;
        $this->fechaSustentacion=$fechaSustentacion;
        $this->notaFinal=$notaFinal;
        $this->numeroActa=$numeroActa;
        $this->acta=$acta;
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
            'titulo'=>"'$this->titulo'",
            'idAsesor'=>"'$this->idAsesor'",
            'fechaSustentacion'=>"'$this->fechaSustentacion'",
            'notaFinal'=>"'$this->notaFinal'",
            'numeroActa'=>"'$this->numeroActa'",
            'acta'=>"'$this->acta'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->id);
    }
    public function actualizar(){
        $datos = [
            'id'=>$this->id,
            'titulo'=>"'$this->titulo'",
            'idAsesor'=>"'$this->idAsesor'",
            'fechaSustentacion'=>"'$this->fechaSustentacion'",
            'notaFinal'=>"'$this->notaFinal'",
            'numeroActa'=>"'$this->numeroActa'",
            'acta'=>"'$this->acta'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
}