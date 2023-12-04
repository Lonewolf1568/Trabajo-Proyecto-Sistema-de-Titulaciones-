<?php
$id = isset($datos['id'])?$datos['id']:'';
$tieneIdiomaExtranjero = isset($datos['tieneIdiomaExtranjero'])?$datos['tieneIdiomaExtranjero']:'';
$culminoEstudios = isset($datos['culminoEstudios'])?$datos['culminoEstudios']:'';
$añoTermino = isset($datos['añoTermino'])?$datos['añoTermino']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlBachiller&accion=guardar" method="post">
        id:
        <input type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Tiene idioma extrangero:
        <input type="text" name="tieneIdiomaExtranjero" value="<?=$tieneIdiomaExtranjero?>">
        <br>
        A cumlinado sus estudios:
        <input type="text" name="culminoEstudios" value="<?=$culminoEstudios?>">
        <br>
        Año de termino:
        <input type="text" name="añoTermino" value="<?=$añoTermino?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlBachiller">Retornar</a>
