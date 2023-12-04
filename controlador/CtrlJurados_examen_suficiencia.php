<?php
session_start();
require_once './core/Controlador.php';
require_once './modelo/Jurados_examen_suficiencia.php';
require_once './modelo/Docente.php';
require_once './assets/Helper.php';

class CtrlJurados_examen_suficiencia extends Controlador {
    public function index(){
        Helper::verificarLogin();
        # echo "Hola Jurados_examen_suficiencia";
        $obj = new Jurados_examen_suficiencia;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            
            'datos'=>$data['data']
        ];

        $home = $this->mostrar('jurados_examen_suficiencia/mostrar.php',$datos,true);

        $datos= [
            'titulo'=>'Jurados_examen_suficiencia',
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
        $obj =new Jurados_examen_suficiencia ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        $obj = new Docente();
        $dataCta = $obj->getTodo();

        $obj = new Docente();
        $datosReq = $obj->getTodo();
        $datos = [
            
            'docentes' => $datosReq['data']
        ];
        # var_dump($datos);exit;
        $this->mostrar('jurados_examen_suficiencia/formulario.php',$datos);
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];  
        # echo "Editando: ".$id;
        $obj = new Jurados_examen_suficiencia($id);
        $data = $obj->editar();
        # Recuperamos los datos las Cuentas Contables
        $obj = new Docente();
        $datosReq = $obj->getTodo();

        # var_dump($data);exit;
        $datos = [
            'datos' => $data['data'][0],
            'docentes' => $datosReq['data']
        ];
        $this->mostrar('jurados_examen_suficiencia/formulario.php',$datos);
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $idExamen = $_POST['idExamen'];
        $notaTeoria = $_POST['notaTeoria'];
        $notaPractica = $_POST['notaPractica'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];

        $obj = new Jurados_examen_suficiencia($id, $idExamen, $notaTeoria, $notaPractica, $nombres, $apellidos);

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