

<a href="#" class="btn btn-primary nuevo">
    <i class="fa fa-plus"></i> 
    Nuevo Jurados
</a>


    <table class="table">
      <thead>
      <tr>
            <th>Id</th>
            <th>nombre del jurado</th>
            <th>apellidos</th>
            <th>ID del examen</th>
            <th>Nota teorica</th>
            <th>Nota practica</th>
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
        <?=$d['nombres']?>
    </td>
    <td>
        <?=$d['apellidos']?>
    </td>  
    <td>
        <?=$d['idExamen']?>
    </td>
    <td>
        <?=$d['notaTeoria']?>
    </td>
    <td>
        <?=$d['notaPractica']?>
    </td>
    <td>
        <a data-id="<?=$d["id"]?>" href="#" class="btn btn-success editar">
            <i class="fa fa-edit"></i> 
            Editar
        </a>
        <a data-id="<?=$d["id"]?>" data-nombres="<?=$d["nombres"]?>" href="#" class="btn btn-danger eliminar">
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
