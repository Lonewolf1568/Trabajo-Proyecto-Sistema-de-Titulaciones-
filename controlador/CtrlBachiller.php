<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Bachiller.php';
require_once './assets/Helper.php';

class CtrlBachiller extends Controlador {
    public function index(){
        # echo "Hola Bachiller";
        Helper::verificarLogin();
        $obj = new Bachiller;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('bachilleres/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Bachillers',
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
        $obj =new Bachiller ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        /* $msg='';
        $datos= [
            'titulo'=>'Nuevo Bachiller',
            'contenido'=>$this->mostrar('Bachillers/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */

    $this->mostrar('bachilleres/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Bachiller($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
        /* $home = $this->mostrar('Bachillers/formulario.php',$datos,true);

         $datos= [
            'titulo'=>'Editar Bachiller',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */
    $this->mostrar('bachilleres/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $tieneIdiomaExtranjero = $_POST['tieneIdiomaExtranjero'];
        $culminoEstudios = $_POST['culminoEstudios'];
        $añoTermino = $_POST['añoTermino'];

        $esNuevo = $_POST['esNuevo'];

        $obj = new Bachiller ($id, $tieneIdiomaExtranjero, $culminoEstudios, $añoTermino);


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