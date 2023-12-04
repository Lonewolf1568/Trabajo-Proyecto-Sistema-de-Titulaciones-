<?php
$id = isset($datos['id'])?$datos['id']:'';
$idExamen = isset($datos['idExamen'])?$datos['idExamen']:'';
$idJurado = isset($datos['idJurado'])?$datos['idJurado']:'';
$notaTeoria = isset($datos['notaTeoria'])?$datos['notaTeoria']:'';
$notaPractica = isset($datos['notaPractica'])?$datos['notaPractica']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlJurados_examen_suficiencia&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Examen:
        <input class="form-control" type="text" name="idExamen" value="<?=$idExamen?>">
        <br>
        Jurados:
        <input class="form-control" type="text" name="idJurado" value="<?=$idJurado?>">
        <br>
        Nota teorica:
        <input class="form-control" type="text" name="notaTeoria" value="<?=$notaTeoria?>">
        <br>
        Nota practica:
        <input class="form-control" type="text" name="notaPractica" value="<?=$notaPractica?>">
        <br>

        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlJurados_examen_suficiencia">Retornar</a>
