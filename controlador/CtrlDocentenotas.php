<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Examenes_suficiencia';
require_once './assets/Helper.php';

class CtrlDocentenotas extends Controlador {
    public function index(){
        # echo "Hola Examenes_suficiencia";
        Helper::verificarLogin();
        $obj = new Examenes_suficiencia;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('DOCnotas/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Examenes de suficiencia',
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
        $obj =new Examenes_suficiencia ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        /* $msg='';
        $datos= [
            'titulo'=>'Nuevo Examenes_suficiencia',
            'contenido'=>$this->mostrar('Examenes_suficiencias/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */

    $this->mostrar('DOCnotas/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Examenes_suficiencia($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
 
    $this->mostrar('DOCnotas/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $notaTeoria = $_POST['notaTeoria'];
        $notaPractica = $_POST['notaPractica'];
        $fechaSustentacion = $_POST['fechaSustentacion'];
        $nombre = $_POST['nombre'];

        $esNuevo = $_POST['esNuevo'];

        $obj = new Examenes_suficiencia ($id, $notaTeoria, $notaPractica,$fechaSustentacion,$nombre );


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