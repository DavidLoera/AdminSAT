
<!--Navbaer de control (Usuario)-->

<?php $usuario = $_SESSION["s_usuario"]; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" hrf="#"> Sistema de administración -</a>
            <a href="https://www.sat.gob.mx/home"><img src="../public/images/sat.png" alt="Imagen SAT" style= "margin-left: -13px;"width="25" height="25"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link">Bienvenido al sistema: <a href="./configuracion.php"> <?php echo "$usuario" ?> </a> </p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./"><i class="fa fa-home"></i> Inicio</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./fabricantes.php"><i class="fa fa-building" aria-hidden="true"></i> Fabricante</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./categorias.php"><i class="fa fa-archive" aria-hidden="true"></i> Categorías</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="./productos.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dispositivos</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"></i><a href="./reportes.php"><i class="fa fa-sticky-note" aria-hidden="true"></i> Reportes</a></p>
                    </li>    
                   <li class='nav-item active'>
                   <p class='nav-link'><a href='./checkconfig.php'><i class='fa fa-cog' aria-hidden='true'></i> Configuración</a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"><a href="#"></a></p>
                    </li>
                    <li class="nav-item active">
                        <p class="nav-link"></i><a id="butonlo" href="#"><i class="fa fa-window-close" aria-hidden="true"></i> Cerrar sesión</a></p>
                    </li>
                </ul>
            </div>
        </nav><br>