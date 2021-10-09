<?php
session_start();
include_once './../modelo/EstanqueDao.php';
$obj = new EstanqueDao();
$usuario =  $_SESSION["usuario"][0][0];
$data = $obj->ListarTodos($usuario);
?>
<table  id="example" class="table table-striped table-bordered table-responsive">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Forma</th>
            <th>Area</th>
            <th>Volumen</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $key => $row) :
            ?>
            <tr class="text-center">
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="Eliminar(<?= $row[0] ?>)" class="btn btn-danger btn-sm" title="Eliminar">
                        <i class="fa fa-trash"> </i>
                    </a>
                </td>
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
