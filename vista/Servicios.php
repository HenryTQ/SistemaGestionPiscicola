<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Servicios</title>
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

                    <div class="col-lg-9">
                        <div class="blog_right_sidebar">
                            <div class="container-fluid">
                                <aside class="single_sidebar_widget popular_post_widget" style="text-align: justify;">
                                    <strong>SERVICIOS</strong>
                                    <p>
                                        Nuestras soluciones de desarrollo web personalizadas aceleran los flujos de trabajo, aumentan los ingresos y optimizan las operaciones comerciales desde el concepto hasta el código y desde el desarrollo hasta la implementación. Ofrecemos servicios integrales de pruebas de calidad de software para brindar soluciones y aplicaciones de software de gran valor y alineadas de manera ágil.
                                    </p>
                                    <div class="row text-center">
                                        <div class="col-sm-12"> 
                                            <img src="img/img4.png" class="img-thumbnail" style="width: 550px;height: 300px;" />
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
</html>