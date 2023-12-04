<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Jurados_trabajo_aplicacion.php';
require_once './assets/Helper.php';

class CtrlJurados_trabajo_aplicacion extends Controlador {
    public function index(){
        # echo "Hola Jurados_trabajo_aplicacion";
        Helper::verificarLogin();
        $obj = new Jurados_trabajo_aplicacion;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('jurados_trabajo_aplicacion/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Jurado de proyecto',
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
        $obj =new Jurados_trabajo_aplicacion ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        /* $msg='';
        $datos= [
            'titulo'=>'Nuevo Jurados_trabajo_aplicacion',
            'contenido'=>$this->mostrar('Jurados_trabajo_aplicacions/formulario.php',null,true),
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */

    $this->mostrar('jurados_trabajo_aplicacion/formulario.php');
        
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Jurados_trabajo_aplicacion($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'datos'=>$data['data'][0]
        ];
        /* $home = $this->mostrar('Jurados_trabajo_aplicacions/formulario.php',$datos,true);

         $datos= [
            'titulo'=>'Editar Jurados_trabajo_aplicacion',
            'contenido'=>$home,
            'menu'=>$_SESSION['menu'],
            'msg'=>$msg
        ];
    $this->mostrar('./plantilla/home.php',$datos); */
    $this->mostrar('jurados_trabajo_aplicacion/formulario.php',$datos);
        
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $idTrabajo = $_POST['idTrabajo'];
        $idJurado = $_POST['idJurado'];
        $notaJurado = $_POST['notaJurado'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Jurados_trabajo_aplicacion ($id, $idTrabajo, $idJurado, $notaJurado);

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