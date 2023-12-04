<?php
$id = isset($datos['id'])?$datos['id']:'';
$idTrabajo = isset($datos['idTrabajo'])?$datos['idTrabajo']:'';
$idJurado = isset($datos['idJurado'])?$datos['idJurado']:'';
$notaJurado = isset($datos['notaJurado'])?$datos['notaJurado']:'';

$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlJurados_trabajo_aplicacion&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Proeycto:
        <input class="form-control" type="text" name="idTrabajo" value="<?=$idTrabajo?>">
        <br>
        Jurado:
        <input class="form-control" type="text" name="idJurado" value="<?=$idJurado?>">
        <br>
        Nota:
        <input class="form-control" type="text" name="notaJurado" value="<?=$notaJurado?>">
        <br>
        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlJurados_trabajo_aplicacion">Retornar</a>
