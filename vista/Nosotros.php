<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nosotros</title>
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
                                    <strong>Nosotros</strong>
                                    <p>
                                        Somos una empresa ubicada en Lima, Peru que mediante el software AQUAFISH ayuda a todos los productores del sector piscícola en el desarrollo de su negocio a través de la consultoría de proyectos para la adquisición de recursos, servicio técnico personalizado, asesoría y capacitación en temas claves para el buen desarrollo de la especie a cultivar alcanzando el mayor costo-beneficio.
                                    </p>
                                    <div class="row text-center">
                                        <div class="col-sm-12"> 
                                            <img src="img/img3.png" class="img-thumbnail" style="width: 450px;height: 200px;" />
                                        </div>

                                    </div>
                                    <strong>Misión</strong>
                                    <p>
                                        Brindar soluciones integrales en Consultoría, Tecnología e Investigación a Empresas Privadas y Organizaciones No Gubernamentales. Procuramos conocer en profundidad los objetivos de nuestros clientes y realizar un servicio diferenciado e integral. Creamos nuevas formas de valor agregado en cada servicio y producto ofrecido.
                                    </p>
                                    <strong>Visión</strong>
                                    <p>
                                        Convertirnos en una de las empresas líder e innovadora a nivel nacional en soluciones integrales en Consultoría, Tecnología e Investigación; contribuyendo en la generación de conocimiento y alto valor agregado a las organizaciones y negocios.
                                    </p>
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