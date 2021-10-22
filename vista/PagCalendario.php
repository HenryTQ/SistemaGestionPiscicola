<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Calendario</title>
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
                                                                <label>Fecha</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Hora</label>
                                                                <input type="time" class="form-control" id="hora" name="hora">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Evento</label>
                                                                <input type="text" class="form-control" id="evento" name="evento">

                                                                <br>
                                                                <label>Estado</label>
                                                                <select class="form-control" name="estado" id="estado">
                                                                    <option value="En Proceso">En Proceso</option>
                                                                    <option value="Finalizado">Finalizado</option>
                                                                    <option value="Postergado">Postergado</option>
                                                                    <option value="Cancelado">Cancelado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Comentarios</label>
                                                                <textarea class="form-control" id="comentarios" name="comentarios" rows="6"></textarea>
                                                            </div>
                                                        </div>



                                                        <input type="hidden" name="id_calendario" id="id_calendario">
                                                        <input type="hidden" name="accion" id="accion" value="crear">
                                                        <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearCalendario()">Guardar</button>
                                                        <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarCalendario()">Editar</button>
                                                        <button type="reset" class="btn btn-danger" onclick="Resetear()">Nuevo</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="listado" role="tabpanel" aria-labelledby="listado-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje2"></div>
                                                    <div  id="listadoCalendario"></div>
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
            var evento = $("#evento").val();


            if (evento === "" ) {
                Mensaje("mensaje", "danger", "Por favor ingrese nombre del evento.");
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
                url: "./../controlador/ControlCalendario.php?accion=listar",
                success: function (data) {
                    $("#listadoCalendario").html(data);
                }
            });
        }

        function CrearCalendario() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlCalendario.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Calendario creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear calendario.");
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
                    url: "./../controlador/ControlCalendario.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "El calendario con el id " + id + " se elimino correctamente!!");
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
                url: "./../controlador/ControlCalendario.php",
                success: function (data) {
                    $("#fecha").val(data.fecha_calendario);
                    $("#hora").val(data.hora_calendario);
                    $("#evento").val(data.evento_calendario);
                    $("#estado").val(data.estado_calendario);
                    $("#comentarios").val(data.observacion_calendario);
                    $("#id_calendario").val(data.id_calendario);
                    
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

        function EditarCalendario() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlCalendario.php",
                success: function (data) {
                    if (data) {
                        Mensaje("mensaje", "success", "Calendario editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos del calendario.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>