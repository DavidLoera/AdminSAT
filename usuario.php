<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("include/head.php")?>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <a href="https://www.sat.gob.mx/home"><img src="public/images/sat.png" alt="IMG" /></a>
                        <p><a class="txt4" href="https://www.sat.gob.mx/home">Servicio de administración tributaria</a></p>
                    </div>
                    <?php

		//Verificacion si el usuario sigue conectado a la aplicacion
		
		session_start();
		if($_SESSION["s_usuario"] == null):

	?>
                    <form class="login100-form validate-form" action="" id="formLogin" method="POST">
                        <span class="login100-form-title">
                            Sistema de Verificación de usuario
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Verifica que tu email o usuario estén correctos">
                            <input class="input100" type="text" name="email" id="usuario" placeholder="Cuenta Usuario" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="La contraseña es requerida">
                            <input class="input100" type="password" name="pass" id="password" placeholder="Contraseña" />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" name="submit" class="login100-form-btn">
                                Entrar
                            </button>
                        </div>
                        <br />
                        <a class="txt3" href="./">Entrar como admin</a>
                        <div class="text-center p-t-136">
                            <a class="txt2">
                                Aqui igual puedes iniciar sesion como administrador
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php else: 
	
	session_start();

	?>
        <form class="login100-form validate-form">
            <span class="login100-form-title">
                Usted ya está dentro😄
            </span>
            <a class="txt5" href="usuario/">Entrar ahora</a><br />
            <center>
                <p>ó</p>
            </center>
            <br />
            <div class="txt2">
                <button id="butonlo" class="login100-form-btn">
                    <a href="#" class="txt5">Cerrar sesión</a>
                </button>
            </div>
            <center>
                <br />
                <p>Cierra sesion ahora, o si prefieres, puedes entrar :D</p>
            </center>
            <div class="text-center p-t-136">
                <a class="txt2">
                    No es necesario loguearse, solo de clic en entrar para continuar editando sus registros
                </a>
            </div>
        </form>

        <?php endif ?>

        <!--Scipt Jquery-->
        <script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--CSS de Bootstrap-->
        <script src="public/vendor/bootstrap/js/popper.js"></script>
        <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--CSS Select2-->
        <script src="public/vendor/select2/select2.min.js"></script>
        <!--Script Animacion Jquery-->
        <script src="public/vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $(".js-tilt").tilt({
                scale: 1.1,
            });
        </script>
        <!--Script Validacion de Email-->
        <script src="public/js/main.js"></script>
        <script src="public/js/login.js"></script>
        <script src="public/js/logout2.js"></script>
        <script src="public/sweetalert2/sweetalert2.all.min.js"></script>
    </body>
</html>
