<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Calidad de agu</title>
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
                                    </ul>
                                    <div class="tab-content" id="crear">
                                        <div class="tab-pane fade show active" id="mantenimiento" role="tabpanel" aria-labelledby="profile-tab">


                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="mensaje"></div>
                                                    <form id="frmCrear">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Fecha de Lectura</label>
                                                                <input type="datetime-local" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Estaque</label>
                                                                <select class="form-control" name="estanque" id="estanque">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_estanque as $key => $row) : ?>
                                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="anomalia">Anomalia</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="anomalia" id="gridRadios1" value="Normal" checked>
                                                                    <label class="form-check-label" for="gridRadios1">
                                                                        Normal
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="anomalia" id="gridRadios2" value="Observación">
                                                                    <label class="form-check-label" for="gridRadios2">
                                                                        Observación
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="anomalia" id="gridRadios3" value="Crítico">
                                                                    <label class="form-check-label" for="gridRadios3">
                                                                        Crítico
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <table class="table table-bordered table-striped">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Nivel MIN</th>
                                                                        <th></th>
                                                                        <th>Nivel MAX</th>
                                                                        <th>ÓPTIMO</th>
                                                                        <th>Estado</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Temperatura </td>
                                                                        <td> 7.5 </td>
                                                                        <td> 
                                                                            <div class="form-group">
                                                                                <span id="label_temperatura_calidad" class="badge badge-info"></span>
                                                                                <input type="range" class="form-control-range" id="temperatura_calidad" name="temperatura_calidad" min="7.5" max="12" step="0.1"    oninput="MostrarValor(this)">
                                                                            </div>
                                                                        </td>
                                                                        <td> 12  </td>
                                                                        <td> 8,5 ppm</td>
                                                                        <td>             
                                                                            <span id="label_estado_temperatura_calidad" class="badge badge-primary"></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Oxígeno Disuelto </td>
                                                                        <td> 13 </td>
                                                                        <td> 
                                                                            <div class="form-group">

                                                                                <span id="label_oxigeno_calidad" class="badge badge-info"></span>
                                                                                <input type="range" class="form-control-range" id="oxigeno_calidad" name="oxigeno_calidad" min="13" max="18" step="0.1"  oninput="MostrarValor(this)">
                                                                            </div>
                                                                        </td>
                                                                        <td> 18  </td>
                                                                        <td>15 Cº</td>
                                                                        <td>             
                                                                            <span id="label_estado_oxigeno_calidad" class="badge badge-primary"></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>PH </td>
                                                                        <td> 6.5 </td>
                                                                        <td> 
                                                                            <div class="form-group">
                                                                                <span id="label_ph" class="badge badge-info"></span>
                                                                                <input type="range" class="form-control-range" id="ph" name="ph" min="6.5" max="8.5" step="0.1"    oninput="MostrarValor(this)" >
                                                                            </div>
                                                                        </td>
                                                                        <td> 8.5  </td>
                                                                        <td>7 pH</td>
                                                                        <td>             
                                                                            <span id="label_estado_ph" class="badge badge-primary"></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Alcalinidad </td>
                                                                        <td> 80 </td>
                                                                        <td> 
                                                                            <div class="form-group">
                                                                                <span id="label_alcalinidad_calidad" class="badge badge-info"></span>
                                                                                <input type="range" class="form-control-range" id="alcalinidad_calidad" name="alcalinidad_calidad" min="80" max="110" step="1"    oninput="MostrarValor(this)">
                                                                            </div>
                                                                        </td>
                                                                        <td> 110  </td>
                                                                        <td>95 mg/l</td>
                                                                        <td>             
                                                                            <span id="label_estado_alcalinidad_calidad" class="badge badge-primary"></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Dureza </td>
                                                                        <td> 100 </td>
                                                                        <td> 
                                                                            <div class="form-group">
                                                                                <span id="label_dureza_calidad" class="badge badge-info"></span>
                                                                                <input type="range" class="form-control-range" id="dureza_calidad" name="dureza_calidad" min="100" max="200" step="1" oninput="MostrarValor(this)">
                                                                            </div>
                                                                        </td>
                                                                        <td> 200  </td>
                                                                        <td>140 mg/l</td>
                                                                        <td>             
                                                                            <span id="label_estado_dureza_calidad" class="badge badge-primary"></span>
                                                                        </td>
                                                                    </tr>


                                                                </table>

                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <br>

                                                                <div>
                                                                    <input type="hidden" name="id_calidad" id="id_calidad">
                                                                    <input type="hidden" name="accion" id="accion" value="crear">
                                                                    <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearCalidadDeAgua()">Guardar</button>
                                                                    <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarCalidadDeAgua()">Editar</button>
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
                                                        <div  id="listadoSiembra"></div>
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
            CargarDatosIniciales();
            $("#btnEditar").hide();
        });

        function CargarDatosIniciales() {
            MostrarValor({name: "temperatura_calidad", value: $("#temperatura_calidad").val()});
            MostrarValor({name: "oxigeno_calidad", value:  $("#oxigeno_calidad").val()});
            MostrarValor({name: "ph", value:  $("#ph").val()});
            MostrarValor({name: "alcalinidad_calidad", value:  $("#alcalinidad_calidad").val()});
            MostrarValor({name: "dureza_calidad", value:  $("#dureza_calidad").val()});
        }

        function MostrarValor(data) {
            $("#label_" + data.name).html(data.value);
            CambiarEstado(data);
        }

        function CambiarEstado(data) {
            var nombre = data.name;
            var valor = parseFloat(data.value);
            var estado = false;

            switch (nombre) {
                case "temperatura_calidad":
                    if (valor >= 8 && valor <= 10) {
                        estado = true;
                    }
                    break;
                case "oxigeno_calidad":
                    if (valor >= 14 && valor <= 16) {
                        estado = true;
                    }
                    break;
                case "ph":
                    if (valor >= 6 && valor <= 8) {
                        estado = true;
                    }
                    break;
                case "alcalinidad_calidad":
                    if (valor >= 90 && valor <= 100) {
                        estado = true;
                    }
                    break;
                case "dureza_calidad":
                    if (valor >= 130 && valor <= 150) {
                        estado = true;
                    }
                    break;
            }

            if (estado) {
                $("#label_estado_" + nombre).removeClass("badge badge-danger");
                $("#label_estado_" + nombre).addClass("badge badge-primary");
                $("#label_estado_" + nombre).html("Normal");
            } else {
                $("#label_estado_" + nombre).removeClass("badge badge-primary");
                $("#label_estado_" + nombre).addClass("badge badge-danger");
                $("#label_estado_" + nombre).html("Alarma");
            }
        }

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
                url: "./../controlador/ControlCalidadDeAgua.php?accion=listar",
                success: function (data) {
                    $("#listadoSiembra").html(data);
                }
            });
        }

        function CrearCalidadDeAgua() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlCalidadDeAgua.php",
                success: function (data) {
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Calidad de agua creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear calidad de agua.");
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
                    url: "./../controlador/ControlCalidadDeAgua.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "Calidad de agua con el id " + id + " se elimino correctamente!!");
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
                url: "./../controlador/ControlCalidadDeAgua.php",
                success: function (data) {
                    $("input[name=anomalia][value='" + data.observaciones_calidad + "']").prop("checked", true);
                    $("#fecha").val(data.fecha_calidad.replace(" ", "T"));
                    $("#estanque").val(data.id_estanque);
                    $("#temperatura_calidad").val(data.temperatura_calidad);
                    $("#oxigeno_calidad").val(data.oxigeno_calidad);
                    $("#ph").val(data.ph_calidad);
                    $("#alcalinidad_calidad").val(data.alcalinidad_calidad);
                    $("#dureza_calidad").val(data.dureza_calidad);
                    $("#id_calidad").val(data.id_calidad);
                    $("#myTab a:first").parent("li").show();
                    $("#myTab a:first").tab('show');
                    $("#btnCrear").hide();
                    $("#btnEditar").show();
                    $("#accion").val("editar");

                    CambiarEstado({name: "temperatura_calidad", value: data.temperatura_calidad});
                    CambiarEstado({name: "oxigeno_calidad", value: data.oxigeno_calidad});
                    CambiarEstado({name: "ph", value: data.ph_calidad});
                    CambiarEstado({name: "alcalinidad_calidad", value: data.alcalinidad_calidad});
                    CambiarEstado({name: "dureza_calidad", value: data.dureza_calidad});

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }

        function EditarCalidadDeAgua() {

            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlCalidadDeAgua.php",
                success: function (data) {
                    if (data) {
                        Mensaje("mensaje", "success", "Calidad de agua editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos de la calidad de agua.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>