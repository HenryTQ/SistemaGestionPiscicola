<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cosecha</title>
        <?php include_once './includes/recurso.php'; ?>
    </head>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include_once './includes/section.php';
        include_once './includes/header.php';

        include_once './../modelo/EstanqueDao.php';
        include_once './../modelo/SiembraDao.php';
        $objEstanque = new EstanqueDao();
        $objSiembra = new SiembraDao();
        $data_estanque = $objEstanque->ListarTodos($_SESSION["usuario"][0][0]);
        $data_siembra = $objSiembra->ListarTodos($_SESSION["usuario"][0][0]);
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
                                    </ul>
                                    <div class="tab-content" id="crear">
                                        <div class="tab-pane fade show active" id="mantenimiento" role="tabpanel" aria-labelledby="profile-tab">


                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje"></div>
                                                    <form id="frmCrear">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Fecha Cosecha</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label >Cantidad</label>
                                                                <input type="number" class="form-control" id="cantidad" name="cantidad">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label >Lote</label>
                                                                <select class="form-control" name="lote_cosecha" id="lote_cosecha">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_siembra as $key => $row) : ?>
                                                                        <option value="<?php echo $row[1] ?>"><?php echo $row[8] . " - " . $row[1]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Especie</label>
                                                                <select class="form-control" name="especie" id="especie">
                                                                    <option value="Trucha Arcoiris">Trucha Arcoiris</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Estaque</label>
                                                                <select class="form-control" name="estanque" id="estanque">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_estanque as $key => $row) : ?>
                                                                        <option value="<?php echo $row[1] ?>"><?php echo $row[1]; ?></option>
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
                                                                <label>Comentarios</label>
                                                                <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <div>
                                                                    <input type="hidden" name="id_cosecha" id="id_cosecha">
                                                                    <input type="hidden" name="accion" id="accion" value="crear">
                                                                    <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearCosecha()">Guardar</button>
                                                                    <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarSiembra()">Editar</button>
                                                                    <button type="reset" class="btn btn-danger" onclick="Resetear()">Nuevo</button>

                                                                </div>
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
                                                    <div class="table-responsive">
                                                        <div  id="listadoCosecha"></div>
                                                    </div>
                                                </div>
                                            </div>
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
                url: "./../controlador/ControlCosecha.php?accion=listar",
                success: function (data) {
                    $("#listadoCosecha").html(data);
                }
            });
        }

        function CrearCosecha() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlCosecha.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Cosecha creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear cosecha.");
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
                    url: "./../controlador/ControlCosecha.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "La cosecha con el id " + id + " se elimino correctamente!!");
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
                url: "./../controlador/ControlCosecha.php",
                success: function (data) {

                    $("#fecha").val(data.fecha_cosecha);
                    $("#especie").val(data.especie_cosecha);
                    $("#cantidad").val(data.cantidad_cosecha);
                    $("#peso").val(data.peso_cosecha);
                    $("#comentarios").val(data.observacion_cosecha);
                    $("#estanque").val(data.estanque_cosecha);
                    $("#lote_cosecha").val(data.lote_cosecha);
                    $("#id_cosecha").val(id);
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
                url: "./../controlador/ControlCosecha.php",
                success: function (data) {
                    if (data) {
                        Mensaje("mensaje", "success", "Cosecha editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos de la cosecha.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>