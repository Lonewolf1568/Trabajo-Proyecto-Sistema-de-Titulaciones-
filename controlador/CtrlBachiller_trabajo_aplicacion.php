<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Bachiller_trabajo_aplicacion.php';
require_once './assets/Helper.php';

class CtrlBachiller_trabajo_aplicacion extends Controlador {
    public function index(){
        # echo "Hola Bachiller_trabajo_aplicacion";
        Helper::verificarLogin();
        $obj = new Bachiller_trabajo_aplicacion;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('bachiller_trabajo_aplicacion/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Bachiller_trabajo_aplicacion',
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
        $obj =new Bachiller_trabajo_aplicacion ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";

    $this->mostrar('bachiller_trabajo_aplicacion/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Bachiller_trabajo_aplicacion($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
    $this->mostrar('bachiller_trabajo_aplicacion/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $idBachiller = $_POST['idBachiller'];
        $idTrabajo = $_POST['idTrabajo'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Bachiller_trabajo_aplicacion ($id, $idBachiller, $idTrabajo);

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