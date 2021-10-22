<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <a class="navbar-brand logo_h" href="./inicio.php"><img src="img/LOGO SGP.jpg" width="150%"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item <?php if (basename($_SERVER["REQUEST_URI"]) == 'inicio.php') echo "active"; ?>"><a class="nav-link" href="./inicio.php">Inicio</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#">Nosotros</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#">Servicios</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#">Proyectos</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#">Novedades</a></li> 
                        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li> 
                        <!--
                           <li class="nav-item active submenu dropdown">
                               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                  aria-expanded="false">Pages</a>
                               <ul class="dropdown-menu">
                                   <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                   <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                               </ul>
                           </li>
                        -->
                    </ul>
                </div> 
            </div>
        </nav>
    </div>
</header>