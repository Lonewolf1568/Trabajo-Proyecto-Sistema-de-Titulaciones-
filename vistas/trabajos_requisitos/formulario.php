<?php
$id = isset($datos['id'])?$datos['id']:'';
$idTrabajo = isset($datos['idTrabajo'])?$datos['idTrabajo']:'';
$idRequisito = isset($datos['idRequisito'])?$datos['idRequisito']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlTrabajos_requisitos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Proyecto:
        <input class="form-control" type="text" name="idTrabajo" value="<?=$idTrabajo?>">
        <br>
        Requisito:
        <input class="form-control" type="text" name="idRequisito" value="<?=$idRequisito?>">
        <br>
        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlTrabajos_requisitos">Retornar</a>
