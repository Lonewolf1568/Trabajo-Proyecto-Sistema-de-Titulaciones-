<?php
require_once './core/Modelo.php';

class Jurados_examen_suficiencia extends Modelo {
    private $id;
    private $idExamen;
    private $notaTeoria;
    private $notaPractica; 
    private $nombres;
    private $apellidos;
    private $_tabla='jurados_examen_suficiencia';
    private $_vista='v_alumnosnotas4';

    public function __construct($id=null,$idExamen=null,$notaTeoria=null,$notaPractica=null,$nombres=null,$apellidos=null){
        $this->id = $id;
        $this->idExamen=$idExamen;
        $this->notaTeoria=$notaTeoria;
        $this->notaPractica=$notaPractica;
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
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
            'idExamen'=>"'$this->idExamen'",
            'notaTeoria'=>"'$this->notaTeoria'",
            'notaPractica'=>"'$this->notaPractica'",
            'nombres'=>"'$this->nombres'",
            'apellidos'=>"'$this->apellidos'",
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
            'notaTeoria'=>"'$this->notaTeoria'",
            'notaPractica'=>"'$this->notaPractica'",
            'nombres'=>"'$this->nombres'",
            'apellidos'=>"'$this->apellidos'",
        ];
        $wh = "id=$this->id";
        return $this->update($wh,$datos);
    }
    public function getnotas($id){
        $sql = "Select * from v_alumnosnotas4 where idEstudiante=$id";
        $this->setSql($sql);
        return $this->ejecutarSQL();
    }
}