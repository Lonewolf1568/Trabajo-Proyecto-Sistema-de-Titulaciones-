<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Trabajos_requisitos.php';
require_once './assets/Helper.php';

class CtrlTrabajos_requisitos extends Controlador {
    public function index(){
        # echo "Hola Trabajos_requisitos";
        Helper::verificarLogin();
        $obj = new Trabajos_requisitos;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('trabajos_requisitos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Trabajos_requisitos',
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
        $obj =new Trabajos_requisitos ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";

    $this->mostrar('trabajos_requisitos/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Trabajos_requisitos($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
        /* $home = $this->mostrar('Trabajos_requisitoss/formulario.php',$datos,true);

         $datos= [
            'titulo'=>'Editar Trabajos_requisitos',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */
    $this->mostrar('trabajos_requisitos/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $idTrabajo = $_POST['idTrabajo'];
        $idRequisito = $_POST['idRequisito'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Trabajos_requisitos ($id, $idTrabajo, $idRequisito);

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