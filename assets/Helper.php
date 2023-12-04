<?php
abstract class Helper
{
    public static function verificarLogin(){
        if (!isset($_SESSION['usuario'])){
            header("Location: ?ctrl=CtrlPersona");
            exit();
        }
    }
    public static function getMenu($idM,$idP){

        switch ($idM) {
            case 1:   # Tramite Documentario
                switch ($idP) {
                    case 1:   #Administrador
                        $menu=self::getMenuTramiteAdmin();
                        break;
                    case 2:   #Docente
                        $menu=self::getMenuTramiteDocente();
                        break;
                    case 3:   #Estudiante
                        $menu=self::getMenuTramiteEstudiante();
                        break;
                    case 4:   #Coordinador
                        $menu=self::getMenuTramiteCoordinador();
                        break;
                    
                    default:    #Visitante
                        $menu=self::getMenuTramiteVisitante();
                        break;
                }    
            
                break;
            case '2':   # Caja
                switch ($idP) {
                    case '1':   #Administrador
                        $menu=self::getMenuCajaAdmin();
                        break;
                    case '2':   #Docente
                        $menu=self::getMenuCajaDocente();
                        break;
                    case '3':   #Estudiante
                        $menu=self::getMenuCajaEstudiante();
                        break;
                    case '4':   #Administrativo
                        $menu=self::getMenuCajaAdministrativo();
                        break;
                    
                    default:    #Visitante
                        $menu=self::getMenuCajaVisitante();
                        break;
                }   
                break;
            
            default:
                # code...
                break;
        }
        
        return $menu;
    }
    private static function getMenuTramiteAdmin(){
        return [
/*              'CtrlCargo'=>'Cargos',
            'CtrlEstado'=>'Estados', */
           #  'CtrlFactorForma'=>'Factores de Forma',
/*             'CtrlCtaContable'=>'Cuentas Contables',
            'CtrlConceptoPago'=>'Conceptos de Pago', */
            'CtrlEstudiante'=>'Estudiante',
            'CtrlBachiller'=>'Bachilleres',
            'CtrlTurnos'=>'turno',
            'CtrlBachiller_trabajo_aplicacion'=>'Bachiller_trabajo_aplicacion',
            'CtrlModalidades'=>'Modalidades',
            'CtrlExamenes_requisitos'=>'requisitos de examen',
            'CtrlExamenes_suficiencia'=>'Examenes de suficiencia',
            'CtrlJurados_examen_suficiencia'=>'Jurados de Examen',
            'CtrlJurados_trabajo_aplicacion'=>'Jurados de  Proyecto',
            'CtrlRequisitos'=>'Requisitos por modalidad',
            'CtrlTrabajos_aplicacion_profesional'=>'Proyectos',
            'CtrlTrabajos_requisitos'=>'Requisitos que presento',
            'CtrlRequisitosEst'=>'AAAAAAAAA',
            'CtrlDocentenotas'=>'bbbbbbbbbbbbbb',
            
            
            
        ]; 
    }
    private static function getMenuTramiteAdministrativo(){
        return [
           #  'CtrlFactorForma'=>'Factores de Forma',
            'CtrlCtaContable'=>'Cuentas Contables',
            'CtrlConceptoPago'=>'Conceptos de Pago',
            'CtrlEstudiante'=>'Estudiante',
        ]; 
    }
    private static function getMenuTramiteDocente(){
        return [
            'CtrlDocente&accion=juradoExamen'=>'Bach. x Examen',
            'CtrlDocente&accion=juradoTrabajo'=>'Bach. x Trabajo',
           
        ]; 
    }
    private static function getMenuTramiteEstudiante(){
        return [
            
            'CtrlRequisitosEst'=>'Requisitos de titulacion',
            'CtrlNotas_estudiantes'=>'notas del estudiante',
           
        ]; 
    }
    private static function getMenuTramiteCoordinador(){
        return [
        ]; 
    }
    private static function getMenuCajaAdmin(){
        return [
            /* 'CtrlCargo'=>'Cargos', */
            'CtrlEstado'=>'Estados',
           #  'CtrlFactorForma'=>'Factores de Forma',
            'CtrlCtaContable'=>'Cuentas Contables',
            'CtrlConceptoPago'=>'Conceptos de Pago',
            'CtrlEstudiante'=>'Estudiante',
        ]; 
    }
    private static function getMenuCajaAdministrativo(){
        return [
           #  'CtrlFactorForma'=>'Factores de Forma',
            'CtrlCtaContable'=>'Cuentas Contables',
            'CtrlConceptoPago'=>'Conceptos de Pago',
            'CtrlEstudiante'=>'Estudiante',
        ]; 
    }
    private static function getMenuCajaDocente(){
        return [
            'CtrlCargo'=>'Cargos',
            'CtrlEstado'=>'Estados',
           
        ]; 
    }
    private static function getMenuCajaEstudiante(){
        return [
            
            'CtrlEstado'=>'Estados',
           
        ]; 
    }
    private static function getMenuCajaVisitante(){
        return [
        ]; 
    }

}