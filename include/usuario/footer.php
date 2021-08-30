   
   <!--Footer de la Página (Usuario)-->
   
   <!--Scipt Jquery-->
   <script src="../public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--CSS de Bootstrap-->
	<script src="../public/vendor/bootstrap/js/popper.js"></script>
	<script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--CSS Select2-->
	<script src="../public/vendor/select2/select2.min.js"></script>
    <!--Script Animacion Jquery-->
	<script src="../public/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

    <script src="../public/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
    <!--Script Validacion de Email-->
    <script src="../public/js/main.js"></script>
    <script src="../public/js/main2.js"></script>
	<script src="../public/js/logout.js"></script>
    <script src="../public/sweetalert2/sweetalert2.all.min.js"></script>