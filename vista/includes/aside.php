<style>
    .letra { 
        font-family: arial, helvetica, roboto, "new times roman", lato;
        font-size: 15px;
    }
</style>
<div class="blog_right_sidebar">
    <?php
    if (isset($_SESSION["usuario"])):
        ?>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Menú Principal</h4>
            <ul class="list cat-list">

                <li>
                    <a href="./PagEstanque.php" class="d-flex justify-content-between">
                        <p class="<?php if (basename($_SERVER["REQUEST_URI"]) == 'PagEstanque.php') echo "btn btn-lg btn-success btn-block"; ?>"  >Estanques</p>
                    </a>
                </li>

                <li>
                    <a href="./PagCalendario.php" class="d-flex justify-content-between">
                        <p class="<?php if (basename($_SERVER["REQUEST_URI"]) == 'PagCalendario.php') echo "btn btn-lg btn-success btn-block"; ?>"  >Calendario</p>
                    </a>
                </li>

                <li>
                    <a href="./PagSiembra.php" class="d-flex justify-content-between">
                        <p class="<?php if (basename($_SERVER["REQUEST_URI"]) == 'PagSiembra.php') echo "btn btn-lg btn-success btn-block"; ?>" >Siembra</p>
                    </a>
                </li>

                <li>
                    <a href="./PagCalidadDeAgua.php" class="d-flex justify-content-between">
                        <p class="<?php if (basename($_SERVER["REQUEST_URI"]) == 'PagCalidadDeAgua.php') echo "btn btn-lg btn-success btn-block"; ?>" >Calidad de agua</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Alimentación</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Cosecha</p>
                    </a>
                </li>
                   <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Muestreo</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Reportes</p>
                    </a>
                </li>
                <li>
                    <a href="./../controlador/ControlUsuario.php?accion=cerrar_sesion" class="d-flex justify-content-between" title="Cerrar Sesión">
                        <p>Salir</p>
                    </a>
                </li>
            </ul>
        </aside>
        <?php
    else:
        ?>
        <aside class="single_sidebar_widget search_widget">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="lnr lnr-magnifier"></i>
                    </button>
                </span>
            </div>
            <div class="br"></div>
        </aside>

        <aside class="single_sidebar_widget post_category_widget">
            <ul class="list cat-list">
                <li >
                    <a href="./PagLogin.php" >
                        <p class="<?php if (basename($_SERVER["REQUEST_URI"]) == 'PagLogin.php') echo "btn btn-lg btn-success btn-block"; ?>"  >Login</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Historia</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Software SGP</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Galeria</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex justify-content-between">
                        <p>Ayuda</p>
                    </a>
                </li>
            </ul>
        </aside>
    <?php
    endif;
    ?>


</div>