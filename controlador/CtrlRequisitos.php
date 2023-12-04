<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Requisitos.php';
require_once './modelo/Modalidades.php';
require_once './assets/Helper.php';

class CtrlRequisitos extends Controlador {
    public function index(){
        Helper::verificarLogin();
        # echo "Hola Requisitos";
        $obj = new Requisitos;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('requisitos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Requisitos',
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
        $obj =new Requisitos ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        $obj = new Modalidades();
        $dataCta = $obj->getTodo();

        $obj = new Modalidades();
        $datosReq = $obj->getTodo();
        $datos = [
            
            'modalidades' => $datosReq['data']
        ];
        # var_dump($datos);exit;
        $this->mostrar('requisitos/formulario.php',$datos);
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];  
        # echo "Editando: ".$id;
        $obj = new Requisitos($id);
        $data = $obj->editar();
        # Recuperamos los datos las Cuentas Contables
        $obj = new Modalidades();
        $datosReq = $obj->getTodo();

        # var_dump($data);exit;
        $datos = [
            'datos' => $data['data'][0],
            'modalidades' => $datosReq['data']
        ];
        $this->mostrar('requisitos/formulario.php',$datos);
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $idModalidad = $_POST['idModalidad'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Requisitos($id, $nombre, $idModalidad);

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