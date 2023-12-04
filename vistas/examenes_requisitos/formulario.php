<?php
$id = isset($datos['id'])?$datos['id']:'';
$idExamen = isset($datos['idExamen'])?$datos['idExamen']:'';
$idRequisito = isset($datos['idRequisito'])?$datos['idRequisito']:'';

$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlExamenes_requisitos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Examen:
        <input class="form-control" type="text" name="idExamen" value="<?=$idExamen?>">
        <br>
        Requsito:
        <input class="form-control" type="text" name="idRequisito" value="<?=$idRequisito?>">
        <br>
        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlExamenes_requisitos">Retornar</a>
