<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Proyectos</title>
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
                                    <strong>Proyectos</strong>
                                    <p>
                                        AQUAFISH está comprometida con el productor con la finalidad de lograr resultados sustentables. Nuestro objetivo es ofrecer a los criadores productos de alta calidad nutricional adaptados a las necesidades productivas, que conlleva a producciones cada vez más eficientes y rentables.
                                   </p>
                                   <p>
                                       En asociación con otras empresas, así como con entidades públicas (universidades, centros de investigación, etc.) encaminados a la optimización de métodos y técnicas, desarrollo de soluciones alternativas y puesta en el mercado de nuevos productos y servicios.
                                   </p>
                                    <div class="row text-center">
                                        <div class="col-sm-12"> 
                                            <img src="img/img5.png" class="img-thumbnail" style="width: 550px;height: 300px;" />
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