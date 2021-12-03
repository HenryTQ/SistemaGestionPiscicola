<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contacto</title>
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
                                    <strong>Contacto</strong>
                                    <p>
                                        Sistemas de Gestión Piscícolas (SGP) se interesa en las necesidades e intereses de nuestros clientes – Escríbanos y le responderemos lo antes posible.
                                    </p>
                                  
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <p><i class="fa fa-map-marker"></i>  Av. Peruanidad N° 271, Lima, Perú</p>
                                            <p><i class="fa fa-phone"></i> (511) 488-6450 / (511) 479-6372 </p>
                                            <p><i class="fa fa-envelope"></i> proyectos_sgp@sistemaspiscicolas.com </p>
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