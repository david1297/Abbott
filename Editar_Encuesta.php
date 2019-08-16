<?php
	session_start();

	require_once ("config/db.php");
	require_once ("config/conexion.php");
	if ($_SESSION['Login'] <> 'True') {
		header("location: Login.php");
 }
	

	if (isset($_GET['id'])) {
		$query=mysqli_query($con, "select Nombre,Id from encuesta where Id ='".$_GET['id']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		$Nombre1 =$rw_Admin['Nombre'];
		$Id =$rw_Admin['Id'];
	}else{
		
	}
	$Encuestas='active';
?>
<!doctype html>
<html lang="es">
<head>
	<?php 
		include("head.php"); 
	?>
	<style>
		.fusion-builder-column-1_2, .fusion_builder_column_layout_1_2 {
		width: 48%;
		}
		.fusion_builder_layout_column:last-child {
			margin-right: 0;
		}
		a, div {
			outline: 0;
		}
		.fusion_builder_column_layout_1_1, .fusion_builder_column_layout_fullwidth {
			width: 100%;
		}
		.fusion-builder-column-1_1, .fusion_builder_column_layout_1_1 {
			width: 100%;
			margin-left: 0;
		}
		.fusion_builder_layout_column:last-child {
			margin-right: 0;
		}
		.fusion-builder-modal-settings-container .fusion-builder-column-layouts li .fusion_builder_layout_column {
			height: 18px;
		}
		.fusion-builder-modal-settings-container .fusion-builder-column-layouts li {
			padding: 0.5em;
			float: left;
			margin: 1.5%;
			cursor: pointer;
			border: 1px dashed #ccc;
			margin-bottom: 2em;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		.fusion-builder-modal-settings-container .fusion-builder-column-layouts li:hover {
			border: 1px dashed #666;
		}
		.fusion-builder-all-modules li:hover {
			background: #f7f7f7;
			-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
			color: #444;
			border: 1px dashed #ccc;
		}
		.fusion-builder-all-modules li {
			border: 1px dashed #ddd;
			float: left;
			background-color: #fff;
			text-align: left;
				padding: 1em;
			width:43%;
			list-style-type: none;
			cursor: pointer;
			margin: 1.5% 1.5% 1.5% 1.5%;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}
		.fusion_builder_layout_column {
			text-align: center;
			padding: 18% 0;
			display: inline-block;
			float: left;
			background: #aaa;
			color: #ddd;
			margin-right: 4%;
			font-size: 12px;
		}
		.fusion_builder_layout_column {
			height: 18px;
		}
	</style>
</head>
<body onload="CargarPreguntas()">
	<div id="wrapper">
		<?php
			include("Menu.php");
			include("componentes/modal/Agregar_Objeto.php");
			include("componentes/modal/Configuracion_Pregunta.php");
			include("componentes/modal/Agregar_Pregunta.php");
			include("componentes/modal/Configuracion_Session.php");
			include("componentes/modal/Configuracion_Objeto.php");
			include("componentes/modal/Configuracion_Encuesta.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">	
					<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarEncuesta(<?php echo $Id; ?>)">
								<span class="fas fa-cogs"></span> Configuracion
							</button>
						</div>
						<h4><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $Nombre1;?></h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarPregunta">
									<i class="fas fa-plus"></i> Adicionar Pregunta
								</button>
								<form class="form-horizontal " method="post" id="Guardar_Encuesta" name="Guardar_Encuesta">
								<input type="text" class="hidden" id="IdPregunta" value="<?php echo $Id;?>">
								<input type="text" class="hidden" id="TipoSession">
								<input type="text" class="hidden" id="LadoSession">
								<input type="text" class="hidden" id="IdSession">
								<input type="text" class="hidden" id="IdObjeto">
			   					<div id="resultados_ajax"></div>
									
						
								
								</form>	
							</div>
						</div>
					</div>			
		  	</div>	
			</div>	  		
		</div>
	</div>
	

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/scripts/common.js"></script>
	<script src="Componentes/Js/Script.js"></script>
	<script lang = "javascript"  src = "js-xlsx-master/dist/xlsx.full.min.js"> </script>
	<script>

function NuevaPregunta(N){
	var Id = document.getElementById('IdPregunta').value;
	$.ajax({
	url:'Componentes/Ajax/Crear_Pregunta.php?Encuesta='+Id+'&Tipo='+N,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			var palabras = data.split("-");
			$('#AgregarPregunta').modal('hide');
		
			ConfigurarPregunta(palabras[1]);
			
		}
	})
	
}
function ConfigurarPregunta(Id){

	$('#ConfiguracionPregunta').modal('show');
	$.ajax({
	url:'Componentes/Ajax/Cargar_Pregunta_Editar.php?Id='+Id,
		 beforeSend: function(objeto){
			$('#Trae_Pregunta').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$('#Trae_Pregunta').html(data);
			
		}
	})
}
function CargarPreguntas(){
	var Id = document.getElementById('IdPregunta').value;
	$.ajax({
	url:'Componentes/Ajax/Cargar_Preguntas.php?Id='+Id,
		 beforeSend: function(objeto){
			$('#resultados_ajax').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#resultados_ajax').html(data);
			
		}
	})
	
}

$( "#Editar_Pregunta" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
			 url: "Componentes/Ajax/Editar_Pregunta.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_Pregunta").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
	
		
			$("#resultados_Pregunta").html(datos);
		 
		 $('#actualizar_datos3B').attr("disabled", false);
		 $('#resultados_Pregunta').fadeOut(2000); 
			 setTimeout(function() { 
				 $('#resultados_Pregunta').html('');	
				 $('#resultados_Pagina').fadeIn(1000); 
			 }, 1000);	
			 CargarPreguntas();
		 }
   });
   event.preventDefault();
})

function MoverPregunta(Pregunta,Direccion){
	var Id = document.getElementById('IdPregunta').value;

	$.ajax({
	url:'Componentes/Ajax/Ordenar_Pregunta.php?Id='+Id+'&Direccion='+Direccion+'&Pregunta='+Pregunta,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			CargarPreguntas();
		}
	})

}
function CargarPregunta(Pregunta){
	$.ajax({
	url:'Componentes/Ajax/Cargar_Pregunta.php?Pregunta='+Pregunta,
		 beforeSend: function(objeto){
	  },
		success:function(data){   
		   $("#Pregunta-"+Pregunta).html(data);	 
		}
	})
}

function Eliminar_Pregunta(Id,Tipo){
	  $.ajax({
		url: "Componentes/Ajax/Eliminar_Pregunta.php?Id="+Id+"&Tipo="+Tipo,
			  beforeSend: function(objeto){
			   },
		   success: function(datos){ 
			CargarPreguntas();
		 }	 
   });

}
function Eliminar_Opcion(Id){
	  $.ajax({
		url: "Componentes/Ajax/Eliminar_Opcion.php?Id="+Id,
			  beforeSend: function(objeto){
			   },
		   success: function(data){ 
				var palabras = data.split("-");
			CargarPregunta(palabras[1]);
		 }	 
   });

}
function UpdateOpciones(Key,Id){
	if (Key.keyCode == 13) {
			var Opcion = $("#Seleccion"+Id).val();
		$.ajax({
        type: "POST",
				url: "Componentes/Ajax/Actualizar_Opcion.php",
        data: "Id="+Id+"&Opcion="+Opcion,
			beforeSend: function(objeto){
				$('#loader_B'+Id).html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			},success: function(datos){
				$('#loader_B'+Id).html(datos);
				$('#loader_B'+Id).fadeOut(2000); 
				setTimeout(function() { 
					$('#loader_B'+Id).html('');	
					$('#loader_B'+Id).fadeIn(1000); 
				}, 1000);	
			}
		});
  }
}
function Agregar_Opcion(Id){
	  $.ajax({
		url: "Componentes/Ajax/Agregar_Opcion.php?Id="+Id,
			  beforeSend: function(objeto){
			   },
		   success: function(data){ 
				var palabras = data.split("-");
			CargarPregunta(palabras[1]);
		 }	 
   });

}
function ConfigurarEncuesta(Pagina){
	
	$('#ConfiguracionEncuesta').modal('show');

}
$( "#Editar_Encuesta" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
			 url: "Componentes/Ajax/Editar_Encuesta.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_Encuesta").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
	
		
			$("#resultados_Encuesta").html(datos);
		 
		 $('#actualizar_datos3B').attr("disabled", false);
		 $('#resultados_Encuesta').fadeOut(2000); 
			 setTimeout(function() { 
				 $('#resultados_Encuesta').html('');	
				 $('#resultados_Encuesta').fadeIn(1000); 
			 }, 1000);	
		 
		 }
   });
   event.preventDefault();
})


	</script>
</body>

</html>
