<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Turnos.php';
require_once './assets/Helper.php';

class CtrlTurnos extends Controlador {
    public function index(){
        # echo "Hola Turnos";
        Helper::verificarLogin();
        $obj = new Turnos;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('turnos/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Turnoss',
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
        $obj =new Turnos ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        /* $msg='';
        $datos= [
            'titulo'=>'Nuevo Turnos',
            'contenido'=>$this->mostrar('Turnoss/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */

    $this->mostrar('turnos/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Turnos($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
        /* $home = $this->mostrar('Turnoss/formulario.php',$datos,true);

         $datos= [
            'titulo'=>'Editar Turnos',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */
    $this->mostrar('turnos/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $turno = $_POST['turno'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Turnos ($id, $turno);

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