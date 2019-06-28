<?php
	session_start();/*
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }*/
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	$Paginas="active";
	if ($_SESSION['Login'] <> 'True') {
		header("location: Login.php");
 }
	
?>
<!doctype html>
<html lang="ES">

<head>
<?php include("head.php");?>
</head>

<body class="" onload='CargarAdmin();'>
	<div id="Menus">
		<div id="wrapper">
			<?php
			include("Menu.php");
			include("componentes/modal/Agregar_Pagina.php");
			?>
			<div id="main-content">
				<div class="container-fluid">
					<div id='Loader'></div>	
					<div class='outer_div'></div>	
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
	<script>
	function CargarAdmin(){
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Cargar_Admin.php',
				 beforeSend: function(objeto){
					$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					CargarAdminD();
				}
			})

	}
	function CargarAdminD(){
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'Componentes/Ajax/Cargar_AdminD.php',
				 beforeSend: function(objeto){
					$('#resultados_AdminD').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
				
					$("#resultados_AdminD").html(data).fadeIn('slow');
					
					
				}
			})

	}
	function ActualizarBoton(Numero){
		var Texto = $("#Texto"+Numero).val();
		
		var Tipo = $("#Tipo"+Numero).val();
		if(Tipo=='Pagina'){
			var Enlace = $("#EnlaceP"+Numero).val();
		}else{
			var Enlace = $("#EnlaceE"+Numero).val();	
		}
		var Seccion = $("#Seccion"+Numero).val();


		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Editar_AdminD.php",
        data: "Id="+Numero+"&Texto="+Texto+"&Enlace="+Enlace+"&Tipo="+Tipo+"&Seccion="+Seccion,
			beforeSend: function(objeto){
				$('#loader_B'+Numero).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_B'+Numero).html(datos);
				$('#loader_B'+Numero).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_B'+Numero).html('');	
					$('#loader_B'+Numero).fadeIn(1000); 
				}, 1000);	
			}
		});

}
function EliminarBoton(Numero){
		

		$.ajax({
        type: "GET",
				url: "Componentes/Ajax/Editar_AdminD.php",
        data: "Id="+Numero,
			beforeSend: function(objeto){
			
			},success: function(datos){
				CargarAdminD();
			}
		});

}

function NuevoBoton(){
	$.ajax({
		   type: "POST",
			 url: "Componentes/Ajax/Crear_Boton.php",
		   
			  beforeSend: function(objeto){
			   },
		   success: function(datos){
	
			CargarAdminD();
		   	
		   
		   }
   });
}
	
function CambioTipoBoton(Id,T){

if (document.getElementById(Id).value=='Pagina'){
	$('#SelectP'+T).removeClass("hidden");
	$('#SelectE'+T).addClass("hidden");
} else{
	$('#SelectP'+T).addClass("hidden");
	$('#SelectE'+T).removeClass("hidden");
	$("#Seccion"+T).html('<option  value="0" >...</option>');
}	
}
function CambioEnlaceP(Id){
	var Pagina = $("#EnlaceP"+Id).val();
	$.ajax({
        type: "GET",
				url: "Componentes/Ajax/CargarSBoton.php",
        data: "Pagina="+Pagina,
			beforeSend: function(objeto){
			
			},success: function(datos){
				$("#Seccion"+Id).html(datos);	
			}
		});
	
	

}

		

		
	</script>
</body>

</html>

