<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Siembra</title>
        <?php include_once './includes/recurso.php'; ?>
    </head>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include_once './includes/section.php';
        include_once './includes/header.php';

        include_once './../modelo/EstanqueDao.php';
        $obj = new EstanqueDao();
        $data_estanque = $obj->ListarTodos($_SESSION["usuario"][0][0]);
        ?>

        <section class="blog_area pb-xl-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <?php include './includes/aside.php'; ?>
                    </div>

                    <div class="col-lg-9">
                        <div class="blog_right_sidebar">
                            <div class="container-fluid">
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="create-tab" data-toggle="tab" href="#mantenimiento" role="tab" aria-controls="profile" aria-selected="false">Mantenimiento</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#listado" role="tab" aria-controls="contact" aria-selected="false">Listado</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#salida" role="tab" aria-controls="contact" aria-selected="false">Salida</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="crear">
                                        <div class="tab-pane fade show active" id="mantenimiento" role="tabpanel" aria-labelledby="profile-tab">


                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje"></div>
                                                    <form id="frmCrear">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Fecha Siembra</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label >Cantidad</label>
                                                                <input type="number" class="form-control" id="cantidad" name="cantidad">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Estaque</label>
                                                                <select class="form-control" name="estanque" id="estanque">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_estanque as $key => $row) : ?>
                                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label >Peso (Gr)</label>
                                                                <input type="number" class="form-control" id="peso" name="peso">
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Especie</label>
                                                                <select class="form-control" name="especie" id="especie">
                                                                    <option value="Truchas">Truchas</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label >Estado</label>
                                                                <select class="form-control" name="estado" id="estado">
                                                                    <option value="En Proceso">En Proceso</option>
                                                                    <option value="Terminado">Terminado</option>
                                                                    <option value="Cancelado">Cancelado</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Procedencia Peces</label>
                                                                <select class="form-control" name="procedencia" id="procedencia">
                                                                    <option value="Nacional">Nacional</option>
                                                                    <option value="Importado">Importado</option>
                                                                </select>

                                                                <br>

                                                                <div>
                                                                    <input type="hidden" name="id_siembra" id="id_siembra">
                                                                    <input type="hidden" name="accion" id="accion" value="crear">
                                                                    <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearSiembra()">Guardar</button>
                                                                    <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarSiembra()">Editar</button>
                                                                    <button type="reset" class="btn btn-danger" onclick="Resetear()">Nuevo</button>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Comentarios</label>
                                                                <textarea class="form-control" id="comentarios" name="comentarios" rows="6"></textarea>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="listado" role="tabpanel" aria-labelledby="listado-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje2"></div>
                                                    <div  id="listadoSiembra"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="salida" role="tabpanel" aria-labelledby="salida-tab" >
                                            Salida
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include './includes/footer.php'; ?>
    </body>
    <script type="text/javascript">
        $(function () {
            Listar();
            $("#btnEditar").hide();
        });

        function Resetear() {
            $("#btnCrear").show();
            $("#btnEditar").hide();
            $("#accion").val("crear");
        }

        function ValidarCampos() {
            var cantidad = $("#cantidad").val();
            var peso = $("#peso").val();
            var estanque = $("#estanque").val();

            if (cantidad === "") {
                Mensaje("mensaje", "danger", "El campo de la cantidad es requerido.");
                return false;
            } else if (parseFloat(cantidad) <= 0) {
                Mensaje("mensaje", "danger", "La cantidad debe ser un valor positivo.");
                return false;
            }

            if (peso === "") {
                Mensaje("mensaje", "danger", "El campo del peso es requerido.");
                return false;
            } else if (parseFloat(peso) <= 0) {
                Mensaje("mensaje", "danger", "El peso debe ser un valor positivo.");
                return false;
            }

            if (parseInt(estanque) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione un estanque.");
                return false;
            }

            return true;
        }


        window.setTimeout(function () {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 10000);

        function Listar() {
            $.ajax({
                type: "GET",
                dataType: 'html',
                url: "./../controlador/ControlSiembra.php?accion=listar",
                success: function (data) {
                    $("#listadoSiembra").html(data);
                }
            });
        }

        function CrearSiembra() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlSiembra.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Siembra creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear estanque.");
                    }
                }, error: function (jqXHR, textStatus, errorThrown) {
                    console.dir(jqXHR);
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }

        function Mensaje(div, estado, msj) {

            $("#" + div).load("./includes/alertas.php #" + estado, "mensaje=" + msj);
        }

        function Eliminar(id) {
            alertify.confirm('Confirmacion', '¿Esta seguro que desea eliminar el registro con el id ' + id + '?', function () {
                $.ajax({
                    type: "GET",
                    data: "id=" + id,
                    url: "./../controlador/ControlSiembra.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "La siembra con el id " + id + " se elimino correctamente!!");
                            Listar();
                        } else {
                            Mensaje("mensaje2", "danger", "No se puede eliminar por una dependencia de llave foranea !");
                        }
                    }
                });
            }, function () {
            });

        }

        function Editar(id) {
            
            $.ajax({
                type: "GET",
                dataType: 'json',
                data: {
                    id: id,
                    accion: "buscarPorId"
                },
                url: "./../controlador/ControlSiembra.php",
                success: function (data) {

                    $("#fecha").val(data.fecha_siembra);
                    $("#especie").val(data.especie_siembra);
                    $("#procedencia").val(data.procedencia_siembra);
                    $("#cantidad").val(data.cantidad_siembra);
                    $("#peso").val(data.peso_siembra);
                    $("#estado").val(data.estado_siembra);
                    $("#comentarios").val(data.observacion_siembra);
                    $("#estanque").val(data.id_estanque);
                    $("#id_siembra").val(id);
                    $("#myTab a:first").parent("li").show();
                    $("#myTab a:first").tab('show');
                    $("#btnCrear").hide();
                    $("#btnEditar").show();
                    $("#accion").val("editar");
                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }

        function EditarSiembra() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlSiembra.php",
                success: function (data) {
                    if (data) {
                        Mensaje("mensaje", "success", "Siembra editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos de la siembra.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>