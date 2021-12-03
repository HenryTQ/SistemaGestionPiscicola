<?php
session_start();
include_once './../modelo/MuestreoDao.php';
$obj = new MuestreoDao();
$usuario = $_SESSION["usuario"][0][0];
$data = $obj->ListarTodos($usuario);
?>
<table  id="example" class="table table-striped table-bordered table-responsive-sm table-responsive-lg " >
    <thead>
        <tr>
            <th>Accion</th>
            <th>Fecha</th>
            <th>Lote</th>
            <th>Estanque</th>
            <th>Cantidad</th>
            <th>Mortalidad</th>
            <th>Especie</th>
            <th>Peso</th>
            <th>Talla</th>
            <th>Biomasa</th>  
            <th>Ración</th>
            <th>Etapa</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $row) :
            ?>
            <tr class="text-center">
                <td>
                    <a href="javascript:void(0)" onclick="Editar(<?= $row[11] ?>)" class="btn btn-info btn-sm" title="Editar">
                        <i class="fa fa-edit"> </i>
                    </a>
                    <a href="javascript:void(0)" onclick="Eliminar(<?= $row[11] ?>)" class="btn btn-danger btn-sm" title="Eliminar">
                        <i class="fa fa-trash"> </i>
                    </a>
                </td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><?php echo $row[8]; ?></td>
                <td><?php echo $row[9]; ?></td>
                <td><?php echo $row[10]; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "emptyTable": "<i>No hay datos disponibles en la tabla.</i>",
                "info": "Del _START_ al _END_ de _TOTAL_ ",
                "infoEmpty": "Mostrando 0 registros de un total de 0.",
                "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                "infoPostFix": "(actualizados)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "<span style='font-size:15px;'>Buscar:</span>",
                "searchPlaceholder": "Buscar",
                "zeroRecords": "No se han encontrado coincidencias.",
                "paginate": {
                    "first": "Primera",
                    "last": "Última",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

    });
</script>
