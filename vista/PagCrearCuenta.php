<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Crear Cuenta</title>
        <?php include './includes/recurso.php'; ?>
    </head>
    <style>
        alertify{
            color: white;
        }
    </style>
    <body style="background: #d7f5f9;">

        <?php
        session_start();
        include './includes/section.php';
        include './includes/header.php';
        ?>

        <section class="blog_area pb-xl-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <?php include './includes/aside.php'; ?>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <div class="container" style="padding-top: 20px;
                                     padding-bottom: 20px;
                                     color: #C1C3C6">

                                    <form  id="form">
                                        <div id="mensaje"></div>
                                        <h3 class="form-signin-heading">Nuevo Usuario</h3>
                                        <hr>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </div>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre Usuario" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </div>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Correo Electronico" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-lock "></i>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-lock "></i>
                                                </div>
                                                <input type="password" class="form-control" name="confirmar" id="confirmar" placeholder="Confirmar Contraseña" autocomplete="off" />
                                            </div>
                                        </div>
                                        <input type="hidden" name="accion" id="accion" value="crear_cuenta">
                                        <button class="btn btn-primary" type="button" onclick="CrearCuenta()">Crear Cuenta</button>

                                        <p style="color: black;">¿Ya cuentas con una cuenta? <a href="PagLogin.php">Iniciar Sesión</a></p>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include './includes/footer.php'; ?>
    </body>
    <script type="text/javascript">
        function ValidarCampos() {
            var usuario = $("#username").val();
            var pass = $("#password").val();
            var confirmar = $("#confirmar").val();
            var email = $("#email").val();

            if (usuario === "" && pass === "" && email === "" && confirmar === "") {
                Mensaje("danger", "Por favor complete todos los campos.");
                return false;
            }

            if (confirmar !== pass) {
                Mensaje("danger", "Las contraseñas ingresadas no coinciden.");

                return false;
            }

            return true;
        }

        function CrearCuenta() {

            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#form").serialize(),
                url: "./../controlador/ControlUsuario.php",
                success: function (data) {
                    if (data === "OK") {
                        Mensaje("success", "Usuario registrado correctamente.!");
                        $("#form")[0].reset();
                    } else {
                        Mensaje("danger", data);
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    Mensaje("danger", "Ha ocurrido un error interno.");
                }
            });
        }

        function Mensaje(estado, msj) {
            $("#mensaje").load("./includes/alertas.php #" + estado, "mensaje=" + msj);
        }
    </script>
</html>