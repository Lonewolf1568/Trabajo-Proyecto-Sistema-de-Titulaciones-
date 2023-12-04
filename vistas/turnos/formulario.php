<?php
$id = isset($datos['id'])?$datos['id']:'';
$turno = isset($datos['turno'])?$datos['turno']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlTurnos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Turno:
        <input class="form-control" type="text" name="turno" value="<?=$turno?>">
        <br>
        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlTurnos">Retornar</a>
