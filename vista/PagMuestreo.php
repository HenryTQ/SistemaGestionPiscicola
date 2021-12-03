<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Muestreo</title>
        <?php include_once './includes/recurso.php'; ?>
    </head>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include_once './includes/section.php';
        include_once './includes/header.php';

        include_once './../modelo/EstanqueDao.php';
        include_once './../modelo/SiembraDao.php';
        include_once './../modelo/AlimentacionDao.php';
        include_once './../modelo/CosechaDao.php';
        include_once './../modelo/CalidadDeAguaDao.php';

        $objEstanque = new EstanqueDao();
        $objSiembra = new SiembraDao();
        $objAlimentacion = new AlimentacionDao();
        $objCosecha = new CosechaDao();
        $objCalidad = new CalidadDeAguaDao();

        $data_estanque = $objEstanque->ListarTodos($_SESSION["usuario"][0][0]);
        $data_siembra = $objSiembra->ListarTodos($_SESSION["usuario"][0][0]);
        $data_alimentacion = $objAlimentacion->ListarTodos($_SESSION["usuario"][0][0]);
        $data_cosecha = $objCosecha->ListarTodos($_SESSION["usuario"][0][0]);
        $data_calidad = $objCalidad->ListarTodos($_SESSION["usuario"][0][0]);
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
                                                                <label>Fecha Muestreo</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label >Peso promedio</label>
                                                                <input type="number" class="form-control" id="peso_promedio" name="peso_promedio">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Lote</label>
                                                                <select class="form-control" name="id_siembra" id="id_siembra">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_siembra as $key => $row) : ?>
                                                                        <option value="<?php echo $row[8] ?>"><?php echo $row[8] . " - " . $row[1]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label >Talla promedio</label>
                                                                <input type="number" class="form-control" id="talla_promedio" name="talla_promedio">
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
                                                                <label >Biomasa</label>
                                                                <input type="number" class="form-control" id="biomasa" name="biomasa">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Alimentación</label>
                                                                <select class="form-control" name="id_alimentacion" id="id_alimentacion">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_alimentacion as $key => $row) : ?>
                                                                        <option value="<?php echo $row[7] ?>"><?php echo $row[2]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Cosecha</label>
                                                                <select class="form-control" name="id_cosecha" id="id_cosecha">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_cosecha as $key => $row) : ?>
                                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[0]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Cantidad Siembra</label>
                                                                <input type="number" class="form-control" id="cantidad_siembra" name="cantidad_siembra">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label >Racion alimenticia</label>
                                                                <input type="number" class="form-control" id="razon_alimenticia" name="razon_alimenticia">
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Mortatlidad</label>
                                                                <input type="number" class="form-control" id="mortatlidad" name="mortatlidad">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label >Etapa de Producción</label>
                                                                <select class="form-control" name="etapa_produccion" id="etapa_produccion">
                                                                    <option value="">:::Seleccione:::</option>
                                                                    <option value="Alevines">Alevines</option>
                                                                    <option value="Juveniles">Juveniles</option>
                                                                    <option value="Engorde">Engorde</option>
                                                                    <option value="Adulto">Adulto</option>
                                                                </select>
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
                                                                <label>Calidad de agua</label>
                                                                <select class="form-control" name="id_calidad" id="id_calidad">
                                                                    <option value="0">:::Seleccione:::</option>
                                                                    <?php foreach ($data_calidad as $key => $row) : ?>
                                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[0]; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">

                                                                <input type="hidden" name="id_muestreo" id="id_muestreo">
                                                                <input type="hidden" name="accion" id="accion" value="crear">
                                                                <button type="button" id="btnCrear" class="btn btn-primary" onclick="CrearMuestreo()">Guardar</button>
                                                                <button type="button" id="btnEditar" class="btn btn-primary" onclick="EditarMuestreo()">Editar</button>
                                                                <button type="reset" class="btn btn-danger" onclick="Resetear()">Nuevo</button>

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
            $("#btnEditar").hide();
        });

        function Resetear() {
            $("#btnCrear").show();
            $("#btnEditar").hide();
            $("#accion").val("crear");
        }

        function ValidarCampos() {
            var peso_promedio = $("#peso_promedio ").val();
            var talla_promedio = $("#talla_promedio").val();
            var estanque = $("#estanque").val();
            var biomasa = $("#biomasa").val();

            var id_cosecha = $("#id_cosecha").val();
            var id_alimentacion = $("#id_alimentacion").val();
            var id_calidad = $("#id_calidad").val();

            if (peso_promedio === "") {
                Mensaje("mensaje", "danger", "El campo del peso promedio es requerido.");
                return false;
            } else if (parseFloat(peso_promedio) <= 0) {
                Mensaje("mensaje", "danger", "El valor del peso promedio debe ser un valor positivo.");
                return false;
            }

            if (talla_promedio === "") {
                Mensaje("mensaje", "danger", "El campo de la talla promedio es requerido.");
                return false;
            } else if (parseFloat(talla_promedio) <= 0) {
                Mensaje("mensaje", "danger", "El valor de la talla promedio debe ser un valor positivo.");
                return false;
            }

            if (parseInt(estanque) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione un estanque.");
                return false;
            }

            if (parseInt(id_cosecha) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione una cosecha.");
                return false;
            }

            if (parseInt(id_alimentacion) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione una alimentacion.");
                return false;
            }

            if (parseInt(id_calidad) === 0) {
                Mensaje("mensaje", "danger", "Por favor seleccione una calidad de agua.");
                return false;
            }

            if (biomasa === "") {
                Mensaje("mensaje", "danger", "Por favor ingreso una valor para la biomasa.");
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
                url: "./../controlador/ControlMuestreo.php?accion=listar",
                success: function (data) {
                    $("#listadoSiembra").html(data);
                }
            });
        }

        function CrearMuestreo() {
            if (!ValidarCampos()) {
                return;
            }
            console.dir($("#frmCrear").serialize());
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlMuestreo.php",
                success: function (data) {
                    console.dir(data);
                    if (parseInt(data) > 0) {
                        Mensaje("mensaje", "success", "Muestreo creado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido crear muestreo.");
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
                    url: "./../controlador/ControlMuestreo.php?accion=eliminar",
                    success: function (data) {
                        if (parseInt(data) > 0) {
                            Mensaje("mensaje2", "success", "El muestreo con el id " + id + " se elimino correctamente!!");
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
                url: "./../controlador/ControlMuestreo.php",
                success: function (data) {
                    $("#mortatlidad").val(data.cantidad_mortalidad);
                    $("#cantidad_siembra").val(data.cantidad_siembra);
                    $("#razon_alimenticia").val(data.racion_alimenticia);
                    $("#fecha").val(data.fecha_muestreo);
                    $("#especie").val(data.especie_muestreo);
                    $("#estanque").val(data.estanque_muestreo);
                    $("#etapa_produccion").val(data.etapa_produccion);
                    $("#id_muestreo").val(data.id_muestreo);
                    $("#id_siembra").val(data.id_siembra);
                    $("#id_cosecha").val(data.id_cosecha);
                    $("#id_calidad").val(data.id_calidad);
                    $("#biomasa").val(data.biomasa);
                    $("#id_alimentacion").val(data.id_alimentacion);
                    $("#talla_promedio").val(data.talla_promedio);
                    $("#peso_promedio").val(data.peso_promedio);
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

        function EditarMuestreo() {
            if (!ValidarCampos()) {
                return;
            }
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#frmCrear").serialize(),
                url: "./../controlador/ControlMuestreo.php",
                success: function (data) {
                    if (data) {
                        Mensaje("mensaje", "success", "Muestreo editado correctamente.!");
                        $("#frmCrear")[0].reset();
                        Resetear();
                        Listar();
                    } else {
                        Mensaje("mensaje", "danger", "No se ha podido editar datos del muestreo.");
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("mensaje", "danger", "Ha ocurrido un error interno.");
                }
            });
        }
    </script>
</html>