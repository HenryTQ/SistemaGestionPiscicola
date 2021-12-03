<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Alimentación</title>
        <?php include_once './includes/recurso.php'; ?>
    </head>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include_once './includes/section.php';
        include_once './includes/header.php';

        include_once './../modelo/EstanqueDao.php';
        include_once './../modelo/SiembraDao.php';

        $objEst = new EstanqueDao();
        $objSiem = new SiembraDao();
        $data_estanque = $objEst->ListarTodos($_SESSION["usuario"][0][0]);
        $data_siembra = $objSiem->ListarTodos($_SESSION["usuario"][0][0]);
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
                                                                <label>Fecha</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label >Marca</label>
                                                                <input type="text" class="form-control" id="marca" name="marca">
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
                                                                <label >Lote alimento</label>
                                                                <select class="form-control" name="lote_alimento" id="lote_alimento">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <option value="IA2021-01">IA2021-01</option>
                                                                    <option value="IA2021-02">IA2021-02</option>
                                                                    <option value="IA2021-03">IA2021-03</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Tipo de alimento</label>
                                                                <input type="text" class="form-control" id="tipo_alimento" name="tipo_alimento">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Cantidad de alimento</label>
                                                                <input type="text" class="form-control" id="cantidad" name="cantidad">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Lote siembra</label>
                                                                <select class="form-control" name="lote_siembra" id="lote_siembra">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_siembra as $key => $row) : ?>
                                                                        <option value="<?php echo $row[1] ?>"><?php echo $row[8]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>

                                                                <br>

                                                                <div>
                                                                    <input type="hidden" name="id_alimentacion" id="id_alimentacion">
                                                                    <input type="hidden" name="accion" id="accion" value="crear">
                                                                    <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearAlimentacion()">Guardar</button>
                                                                    <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarAlimentacion()">Editar</button>
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
                                                        <div  id="listadoAlimentacion"></div>
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
            var marca = $("#marca").val();
            var estanque = $("#estanque").val();
            var lote_alimento = $("#lote_alimento").val();
            var tipo_alimento = $("#tipo_alimento").val();
            var lote_siembra = $("#lote_siembra").val();
            var cantidad = $("#cantidad").val();

            if (marca === "") {
                Mensaje("mensaje", "danger", "El campo de la marca es requerido.");
                return false;
            }

            if (tipo_alimento === "") {
                Mensaje("mensaje", "danger", "El campo del tipo de alimento es requerido.");
                return false;
            }

            if (parseInt(estanque) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione un estanque.");
                return false;
            }

            if (parseInt(lote_alimento) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione un lote de alimento.");
                return false;
            }

            if (parseInt(lote_siembra) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione un lote de siembra.");
                return false;
            }

            if (cantidad === "") {
                Mensaje("mensaje", "danger", "El campo de la cantidad es requerido.");
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
                url: "./../controlador/ControlAlimentacion.php?accion=listar",
                success: function (data) {
                    $("#listadoAlimentacion").html(data);
                }
            });
        }

        function CrearAlimentacion() {
            if (!ValidarCampos()) {
                return;
            }
            console.dir( $("#frmCrear").serialize());
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlAlimentacion.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Alimentación creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear alimentación.");
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
                    url: "./../controlador/ControlAlimentacion.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "La alimentación con el id " + id + " se elimino correctamente!!");
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
                url: "./../controlador/ControlAlimentacion.php",
                success: function (data) {
                    $("#lote_alimento").val(data.lote_alimento);
                    $("#fecha").val(data.fecha_alimento);
                    $("#marca").val(data.marca_alimento);
                    $("#cantidad").val(data.cantidad_alimento);
                    $("#estanque").val(data.estanque_alimentacion);
                    $("#lote_siembra").val(data.lote_siembra_alimentado); 
                    $("#tipo_alimento").val(data.tipo_alimento);
                    $("#id_alimentacion").val(id);
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

        function EditarAlimentacion() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlAlimentacion.php",
                success: function (data) {
                    console.dir(data);
                    if (data) {
                        Mensaje("mensaje", "success", "Alimentación editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos de la alimentación.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>