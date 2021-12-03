<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Historia</title>
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
                                    <strong>HISTORIA</strong>
                                    <p>
                                        En sus orígenes la acuicultura se centró en la crianza de peces de agua dulce, particularmente ciprínidos en Asia, y en estos momentos es una actividad extendida a todos los continentes y que abarca todos los ambientes acuáticos y un elevado número de especies de cultivo.
                                    </p>
                                    <p>
                                        Si bien la acuicultura tiene una historia de más de 4.000 años, ha sido desde hace unos 50 años cuando se ha convertido en una actividad económica relevante. Su contribución al suministro mundial de pescado, crustáceos y moluscos crece imparable año tras año. Según estadísticas de la FAO, ha pasado del 5,2% de la producción total en 1970 a más de 50% en 2010, es decir la acuicultura mundial provee la mitad de los pescados que consumimos actualmente.
                                    </p>
                                    <div class="row text-center">
                                        <div class="col-sm-6"> 
                                            <img src="img/img9.png" class="img-thumbnail" style="width: 550px;height: 300px;" />
                                        </div>
                                        <div class="col-sm-6"> 
                                            <img src="img/img10.png" class="img-thumbnail" style="width: 550px;height: 300px;" />
                                        </div>
                                    </div>
                                    <strong>HISTORIA DE LA ACUICULTURA EN EL PERU</strong>

                                    <p>Las primeras versiones del manejo de especies acuáticas en el Perú están dadas por los historiadores de la conquista, que relatan las costumbres de las poblaciones costeras autóctonas de aprovechar los cuerpos de agua cercanos al mar, para conectarlos con éste mediante canales que permitían el ingreso de peces diádromos, presumiblemente “lisas” (Mugil sp.), para engordarlos y disponer de éllas en el momento deseado. </p>
                                    <p>Sin embargo, siendo en la colonia la agricultura la actividad principal, la evolución de las técnicas de acuicultura quedó paralizada. En la época republicana, la pesca principalmente marítima fue desarrollándose paulatinamente, alcanzando su auge en la década de los años de 1960.</p>

                                    <div class="row text-center">
                                        <div class="col-sm-12"> 
                                            <img src="img/img11.png" class="img-thumbnail" style="width: 550px;height: 400px;" />
                                        </div>
                                    </div>
                                </aside>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'; ?>
</body>
</html>