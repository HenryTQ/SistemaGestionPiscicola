<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <?php include './includes/recurso.php'; ?>
    </head>

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

                                    <div id="mensaje"></div>

                                    <form id="login" class="form-signin" role="form" action="index.html">
                                        <h3 class="form-signin-heading">Iniciar Sesión</h3>
                                        <hr>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </div>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" maxlength="50"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-lock "></i>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off"  maxlength="50"/>
                                            </div>
                                        </div>
                                        <input type="hidden" name="accion" id="accion" value="iniciar">
                                        <button class="btn btn-primary" type="button" onclick="Login()">Iniciar Sesión</button>
                                        <p style="color: black;">¿No tienes una cuenta? <a href="PagCrearCuenta.php">Registrate</a></p>
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

            if (usuario === "" && pass === "") {
                Mensaje("danger", "Por favor complete todos los campos.");
                return false;
            }
            return true;
        }

        function Login() {
            if (!ValidarCampos()) {
                return;
            }

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: $("#login").serialize(),
                url: "./../controlador/ControlUsuario.php",
                success: function (data) {
                    if (data.length > 0) {
                        $(location).attr("href", "./inicio.php");
                    } else {
                        Mensaje("danger", "Usuario y/o clave Incorrecto.");
                    }
                }
            });
        }

        function Mensaje(estado, msj) {
            $("#mensaje").load("./includes/alertas.php #" + estado, "mensaje=" + msj);
        }
    </script>
</html>