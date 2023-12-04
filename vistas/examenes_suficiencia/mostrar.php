

<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Examen de suficiencia
</a>


    <table class="table">
      <thead>
      <tr>
            <th>Id</th>
            <th>Nota teorica</th>
            <th>nota ptactica</th>
            <th>Bachiller</th>
            <th>Nota final</th>
            <th>Numero de acta</th>
            <th>Acta</th>
            <th>Fecha de sustentacion</th>
            <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
<?php
if (is_array($datos))
foreach ($datos as $d) {
    ?>
<tr>
<td>
        <?=$d['id']?>
    </td>
    <td>
        <?=$d['notaTeoria']?>
    </td>
    <td>
        <?=$d['notaPractica']?>
    </td>
    <td>
        <?=$d['idBachiller']?>
    </td>
    <td>
        <?=$d['notaFinal']?>
    </td>
    <td>
        <?=$d['numeroActa']?>
    </td>
    <td>
        <?=$d['acta']?>
    </td>
    <td>
        <?=$d['fechaSustentacion']?>
    </td>
    <td>
        <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-notaTeoria="<?=$d["notaTeoria"]?>" href="#" class="btn btn-danger eliminar">
          <i class="fa fa-trash"></i>  
          Eliminar
        </a>
        
    </td>
</tr>

<?php
}
?>
      </tbody>
    </table>

    <a href="?">Retornar</a>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cargos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Cargando Cargos...</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script>
        $(()=>{
            
            $('#nuevo').click(function (e) { 
                e.preventDefault();
                // alert('nuevo')

                $('#modal-lg').modal('show')
            });
        });
      </script>

