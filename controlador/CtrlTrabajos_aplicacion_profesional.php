<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Trabajos_aplicacion_profesional.php';
require_once './assets/Helper.php';

class CtrlTrabajos_aplicacion_profesional extends Controlador {
    public function index(){
        # echo "Hola Trabajos_aplicacion_profesional";
        Helper::verificarLogin();
        $obj = new Trabajos_aplicacion_profesional;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('trabajos_aplicacion_profesional/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Trabajos_aplicacion_profesionals',
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
        $obj =new Trabajos_aplicacion_profesional ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();

    $this->mostrar('trabajos_aplicacion_profesional/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Trabajos_aplicacion_profesional($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];

    $this->mostrar('trabajos_aplicacion_profesional/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $idAsesor = $_POST['idAsesor'];
        $fechaSustentacion = $_POST['fechaSustentacion'];
        $notaFinal = $_POST['notaFinal'];
        $numeroActa = $_POST['numeroActa'];
        $acta = $_POST['acta'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Trabajos_aplicacion_profesional ($id, $titulo, $idAsesor, $fechaSustentacion, $notaFinal, $numeroActa, $acta);

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