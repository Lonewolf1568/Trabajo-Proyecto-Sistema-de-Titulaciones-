<?php
$id = isset($datos['id'])?$datos['id']:'';
$nombre = isset($datos['nombre'])?$datos['nombre']:'';
$idModalidad = isset($datos['idModalidad'])?$datos['idModalidad']:'';
$esNuevo = isset($datos['id'])?0:1;
?>
    <form action="?ctrl=CtrlRequisitos&accion=guardar" method="post">
        id:
        <input class="form-control" type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Requisito:
        <input class="form-control" type="text" name="nombre" value="<?=$nombre?>">
        <br>
        Modalidad:
        <select name="idModalidad" id="">
            <?php
            $esSeleccionado=null;
            if (is_array ($modalidades))
            foreach ($modalidades as $c) { 
                $esSeleccionado='';
                if($idModalidad==$c['id'])
                    $esSeleccionado='selected';
            ?>
                
                <option <?=$esSeleccionado?> value="<?=$c['id']?>"> <?=$c['nombre']?></option>
            <?php
            }
            ?>

        </select>
        <br>

        <input class="btn btn-primary mb-3" type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlRequisitos">Retornar</a>
