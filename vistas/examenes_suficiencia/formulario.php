<?php
$id = isset($datos['id'])?$datos['id']:'';
$notaTeoria = isset($datos['notaTeoria'])?$datos['notaTeoria']:'';
$notaPractica = isset($datos['notaPractica'])?$datos['notaPractica']:'';
$idBachiller = isset($datos['idBachiller'])?$datos['idBachiller']:'';
$notaFinal = isset($datos['notaFinal'])?$datos['notaFinal']:'';
$numeroActa = isset($datos['numeroActa'])?$datos['numeroActa']:'';
$acta = isset($datos['acta'])?$datos['acta']:'';
$fechaSustentacion = isset($datos['fechaSustentacion'])?$datos['fechaSustentacion']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlExamenes_suficiencia&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Nota teorica:
        <input class="form-control" type="text" name="notaTeoria" value="<?=$notaTeoria?>">
        <br>
        Nota practica:
        <input class="form-control" type="text" name="notaPractica" value="<?=$notaPractica?>">
        <br>
        Bachiller:
        <input class="form-control" type="text" name="idBachiller" value="<?=$idBachiller?>">
        <br>
        Nota final:
        <input class="form-control" type="text" name="notaFinal" value="<?=$notaFinal?>">
        <br>
        Numero de acta:
        <input class="form-control" type="text" name="numeroActa" value="<?=$numeroActa?>">
        <br>
        Acta:
        <input class="form-control" type="text" name="acta" value="<?=$acta?>">
        <br>
        Fecha de sustentacion
        <input class="form-control" type="text" name="fechaSustentacion" value="<?=$fechaSustentacion?>">
        <br>
        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlExamenes_suficiencia">Retornar</a>
