<?php
$id = isset($datos['id'])?$datos['id']:'';
$idBachiller = isset($datos['idBachiller'])?$datos['idBachiller']:'';
$idTrabajo = isset($datos['idTrabajo'])?$datos['idTrabajo']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlBachiller_trabajo_aplicacion&accion=guardar" method="post">
        id:
        <input type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        id del bachiller
        <input type="text" name="idBachiller" value="<?=$idBachiller?>">
        <br>
        id de su trabajo:
        <input type="text" name="idTrabajo" value="<?=$idTrabajo?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlBachiller_trabajo_aplicacion&accion">Retornar</a>
