<h1>Opciones para el modulo de titulacion</h1>

<html>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #000000;
    } 

     tr:hover {
        background-color: #47cf3c;
    } 
/*     tr:nth-child(even){
      background-color: #ca3b09;
    } */
</style>
</html>
<table class="table">
<tr>
    <th>Módulo</th>
    <th>Perfil</th>
    <th>Opciones</th>
</tr>


<?php 
foreach ($data as $d) : ?>
    
<tr>
    <td><?=$d['modulo']?></td>
    <td><?=$d['perfil']?></td>
    <td>
    <a href="?ctrl=CtrlPersona&accion=accederModulo&id=<?=$d['idpersona']?>&idModulo=<?=$d['idmodulo']?>&idPerfil=<?=$d['idperfil']?>">Acceder</a>
    </td>
</tr>


<?php
    endforeach;
?>
</table>