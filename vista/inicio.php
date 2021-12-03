<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio</title>
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
                                    <p>
                                        El apogeo tecnológico genera la necesidad de reemplazar todas las actividades que se realizan de una forma manual a una tecnológica, donde la simpleza y facilidad para llevarlas a cabo son una de las características destacables. El Software de Gestión Piscícola, construido como entregable de este proyecto, garantiza para el sector acuícola y económico del país, poder controlar y administrar con un alto nivel de eficiencia las actividades y flujos operacionales vinculados a la crianza de truchas arcoiris.
                                    </p>
                                    <p>
                                        Utilizando la metodología SCRUM, se construye un referente lógico cuya integridad a nivel de análisis permite validar las características de flexibilidad y usabilidad para los procesos asociados a los módulos de los estanques, calendarios, siembra, el muestreo, calidad de agua, alimentación, cosecha y muestreo.
                                    </p>
                                    <p>
                                        Por ello, el desarrollo del software ofrece excelentes resultados que se han logrado a través de muchos años de experiencia y determinación constante por parte de la empresa, con la finalidad de atender eficazmente todas las exigencias o requerimientos de los clientes. El presente trabajo muestra el desarrollo de una herramienta de software que permite facilitar el monitoreo de ciertas variables y predecir su comportamiento para mantener estable y seguro el sistema de gestión piscícola. 
                                    </p>
                                    <p>
                                        Finalmente, se concluye que la herramienta piscícola favorece en tiempo, recursos y costos operacionales, la administración adecuada de los estanques o criaderos de peces, los parámetros de mantención del agua y la obtención de resultados a través de los muestreos. Y, sobre todo, es completamente portable a cualquier lugar que elija, reduciendo los manejos manuales y de esta manera facilita la flexibilidad del trabajo en piscicultura.
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6"> 
                                            <img src="img/img1.png" class="img-thumbnail"  />
                                        </div>
                                        <div class="col-sm-6"> 
                                            <img src="img/img2.png" class="img-thumbnail" />
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