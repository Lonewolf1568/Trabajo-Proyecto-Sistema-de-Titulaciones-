<?php
require_once './core/Controlador.php';
require_once './modelo/ConceptoPago.php';
require_once './modelo/CtaContable.php';
require_once './assets/Helper.php';

class CtrlConceptoPago extends Controlador {
    public function index(){
        Helper::verificarLogin();
        # echo "Hola ConceptoPago";
        $obj = new ConceptoPago;
        $data = $obj->getTodo();

        # var_dump($data);exit;
        $msg=$data['msg'];
        $datos = [
            'titulo'=>'Requisitos',
            'datos'=>$data['data']
        ];

        $this->mostrar('requisitos/mostrar.php',$datos);
    }

    public function eliminar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new ConceptoPago ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        Helper::verificarLogin();
        # echo "Agregando..";
        $obj = new CtaContable();
        $dataCta = $obj->getTodo();
        $datos = [
            'ctasContables'=>$dataCta['data']
        ];
        # var_dump($datos);exit;
        $this->mostrar('requisitos/formulario.php',$datos);
    }
    public function editar(){
        Helper::verificarLogin();
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new ConceptoPago($id);
        $data = $obj->editar();
        # Recuperamos los datos las Cuentas Contables
        $obj = new CtaContable();
        $dataCta = $obj->getTodo();

        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0],
            'ctasContables'=>$dataCta['data']
        ];
        $this->mostrar('requisitos/formulario.php',$datos);
    }
    public function guardar(){
        Helper::verificarLogin();
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $monto = $_POST['monto'];
        $idCta = $_POST['idCta'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new ConceptoPago ($id, $nombre,$monto,$idCta);

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