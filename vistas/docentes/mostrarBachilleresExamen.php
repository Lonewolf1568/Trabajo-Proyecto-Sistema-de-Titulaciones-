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
    tr:nth-child(even){
      background-color: #ca3b09;
    }
</style>
</html>
    
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            
            <th>Programa Estud.</th>
            <th>Nota Teoria</th>
            <th>Nota Práctica</th>
            <th>Opciones</th>
        </tr>
<?php
if (is_array($datos))
foreach ($datos as $d) {
    ?>
<tr>
    <td>
        <?=$d['id']?>
    </td>
    <td><?=$d['nombres']?></td>
    <td><?=$d['apellidos']?></td>
    
    <td><?=$d['programaEst']?></td>
    <td><?=$d['notaTeoriaJur']?></td>
    <td><?=$d['notaPracticaJur']?></td>
    <td>
        <a href="?ctrl=CtrlDocente&accion=poneNota&idJuradoExamen=<?=$d['idJuradoExamen']?>&nombre=<?=$d['nombres']?> <?=$d['apellidos']?>">
            Poner Nota
        </a>
        
        
    </td>
</tr>

<?php
}
?>

    </table>

    <a href="?">Retornar</a>
