<?php
	session_start();/*
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }*/
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$Encuestas="active";
	if ($_SESSION['Login'] <> 'True') {
		header("location: Login.php");
 }
	
?>
<!doctype html>
<html lang="ES">

<head>
<?php include("head.php");?>
</head>

<body class="" onload='CargarEncuestas();'>
	<div id="Menus">
		<div id="wrapper">
			<?php
			include("Menu.php");
			include("componentes/modal/Agregar_Encuesta.php");
			?>
			<div id="main-content">
				<div class="container-fluid">
					<div class="panel panel-default">
						<div class="panel-heading">
		    				<div class="btn-group pull-right">				
								<button type="button" class="btn btn-default"data-toggle="modal" data-target="#AgregarEncuesta">
									<i class="fas fa-plus"></i> Adicionar Encuestas
								</button>
							</div>
							<h4><i class="fas fa-file-alt"></i> Encuestas</h4>
						</div>
						<div class="panel-body">
							<div class="tab-content content-profile">
								<div class="tab-pane fade in active" id="Informacion">
									<div class="panel-content">
										<div class="row">
											<div id='Loader'></div>	
											<div class='outer_div'></div>	
										</div>
									</div>
								</div>
							</div>
						</div>			
		  			</div>	
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
	<script src="assets/vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
	<script src="assets/vendor/toastr/toastr.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script src="Componentes/Js/Script.js"></script>
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>
	<script>
	function CargarEncuestas(){
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Cargar_Encuestas.php',
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
	}
	$( "#Nueva_Encuesta" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
			 url: "Componentes/Ajax/Crear_Encuesta.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_ajax3B").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
			document.getElementById('Nombre').value = '';
			CargarEncuestas();
		   $("#resultados_ajax3B").html(datos);
		   $('#actualizar_datos3B').attr("disabled", false);
		   $('#resultados_ajax3B').fadeOut(2000); 
			   setTimeout(function() { 
				   $('#resultados_ajax3B').html('');	
				   $('#resultados_ajax3B').fadeIn(1000); 
			   }, 1000);	
		   
		   }
   });
   event.preventDefault();
})

		

		
	</script>
</body>

</html>
