<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Estanque</title>
        <?php include_once './includes/recurso.php'; ?>
    </head>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include_once './includes/section.php';
        include_once './includes/header.php';
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
                                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#mantenimiento" role="tab" aria-controls="profile" aria-selected="false">Mantenimiento</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#listado" role="tab" aria-controls="contact" aria-selected="false">Listado</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#salida" role="tab" aria-controls="contact" aria-selected="false">Salida</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="mantenimiento" role="tabpanel" aria-labelledby="profile-tab">


                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje"></div>
                                                    <form id="frmCrear">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="nombre">Nombre</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="inputPassword4">Area (m2)</label>
                                                                <input type="number" class="form-control" id="area" name="area">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="tipo">Tipo</label>
                                                                <select class="form-control" name="tipo" id="tipo">
                                                                    <option value="Cemento">Cemento</option>
                                                                    <option value="Jaula">Jaula</option>
                                                                    <option value="Tierra">Tierra</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="volumen">Volumen agua (m3)</label>
                                                                <input type="number" class="form-control" id="volumen" name="volumen">
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="tipo">Forma</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="forma" id="gridRadios1" value="Circular" checked>
                                                                    <label class="form-check-label" for="gridRadios1">
                                                                        Circular
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="forma" id="gridRadios2" value="Rectangular">
                                                                    <label class="form-check-label" for="gridRadios2">
                                                                        Rectangular
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="forma" id="gridRadios3" value="Cuadrado">
                                                                    <label class="form-check-label" for="gridRadios3">
                                                                        Cuadrado
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="estado">Estado</label>
                                                                <select class="form-control" name="estado" id="estado">
                                                                    <option value="Libre">Libre</option>
                                                                    <option value="Ocupado">Ocupado</option>
                                                                    <option value="Mantenimiento">Mantenimiento</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="accion" id="accion" value="crear">
                                                        <button type="button" class="btn btn-primary" onclick="CrearEstanque()">Guardar</button>
                                                        <button type="reset" class="btn btn-danger">Nuevo</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="listado" role="tabpanel" aria-labelledby="listado-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje2"></div>
                                                    <div  id="listadoEstanque"></div>
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
        });

        function ValidarCampos() {
            var nombre = $("#nombre").val();
            var area = $("#area").val();
            var volumen = $("#volumen").val();

            if (nombre === "" | area === "" || volumen === "") {
                Mensaje("mensaje","danger", "Por favor complete todos los campos.");
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
                url: "./../controlador/ControlEstanque.php?accion=listar",
                success: function (data) {
                    $("#listadoEstanque").html(data);
                }
            });
        }

        function CrearEstanque() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlEstanque.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Estanque creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear estanque.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
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
                    url: "./../controlador/ControlEstanque.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "El estanque con el id " + id + " se elimino correctamente!!");
                            Listar();
                        } else {
                            Mensaje("mensaje2", "danger", "No se puede eliminar por una dependencia de llave foranea !");
                        }
                    }
                });
            }, function () {
            });

        }
    </script>
</html>