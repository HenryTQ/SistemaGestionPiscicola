<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Novedades</title>
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
                                    <strong>¡Grandes Retos En La Acuicultura!</strong>


                                    <div class="row">
                                        <div class="col-sm-10"> 
                                            <p>
                                                La producción de especies amazónicas demanda conocer y entender las características biológicas de cada especie de interés. Por ejemplo: No es lo mismo cultivar un paiche con comportamiento carnívoro en todo su ciclo de vida, que cultivar una gamitana con un comportamiento planctófago en cada una de sus etapas de crecimiento.
                                            </p>
                                        </div>
                                        <div class="col-sm-2"> 
                                            <img src="img/img6.png" class="img-thumbnail" style="width: 140px;height: 100px;" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>
                                                Actualmente, nos encontramos en pleno desafío de cambio climático a nivel mundial lo que nos hace cuestionarnos sobre el desarrollo de una piscicultura sustentable. Imaginemos el poder implementar energía solar, con bajo impacto o incluso, cero impactos sobre sobre nuestro medio ambiente. 
                                            </p>
                                        </div>
                                    </div>

                                    <strong>Beneficios Sociales De La Acuicultura</strong>
                                    <div class="row">
                                        <div class="col-sm-10"> 
                                            <p>
                                                La acuicultura de peces parece tener más impacto desde una perspectiva social que el cultivo de mejillones en cuerdas, pero este último puede tener importantes valores culturales y contribuir a la compresión basada en el lugar. Y esto se debe a que apoyan a la conexión de las personas con el lugar y la identidad, juega un papel vital en el mantenimiento del funcionamiento de la línea costera.
                                            </p>
                                        </div>
                                        <div class="col-sm-2"> 
                                            <img src="img/img7.png" class="img-thumbnail" style="width: 140px;height: 100px;" />
                                        </div>
                                    </div>

                                    <strong>Cambios En La Acuicultura En Tiempos De Pandemia</strong>
                                    <div class="row">
                                        <div class="col-sm-10"> 
                                            <p>
                                                Un estudio reciente de la FAO afirma que debido a las restricciones por la pandemia del COVID-19, la producción acuícola se ha visto afectada, por lo que ha disminuido en cerca de 1,3%. Es así que también se ha notado un cambio por el lado de los consumidores, ya que sus preferencias cambiaron. 
                                                Actualmente, muchos prefieren los productos congelados y envasados, en lugar de pescado fresco. FAO señala que los impactos de la pandemia sobre la producción acuícola son variables y que hay una constante incertidumbre en su futuro.

                                            </p>
                                        </div>
                                        <div class="col-sm-2"> 
                                            <img src="img/img8.png" class="img-thumbnail" style="width: 140px;height: 100px;" />
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