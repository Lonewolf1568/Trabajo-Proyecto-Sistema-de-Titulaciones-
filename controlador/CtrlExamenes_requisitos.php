<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Examenes_requisitos.php';
require_once './assets/Helper.php';

class CtrlExamenes_requisitos extends Controlador {
    public function index(){
        # echo "Hola Examenes_requisitos";
        Helper::verificarLogin();
        $obj = new Examenes_requisitos;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('examenes_requisitos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Requisitos para el examen',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos);

    }

    public function eliminar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new Examenes_requisitos ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();


    $this->mostrar('examenes_requisitos/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Examenes_requisitos($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];

    $this->mostrar('examenes_requisitos/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $idExamen = $_POST['idExamen'];
        $idRequisito = $_POST['idRequisito'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Examenes_requisitos ($id, $idExamen, $idRequisito);

        switch ($esNuevo) {
            case 0: # Editar
                $data=$obj->actualizar();
                break;
            
            default: # Nuevo
                $data=$obj->guardar();
                break;
        }
        # var_dump($data);exit;
        $this->index();
    }

    
}