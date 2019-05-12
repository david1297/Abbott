<?php
	session_start();

	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	

	if (isset($_GET['id'])) {
		$query=mysqli_query($con, "select Nombre,Id from pagina where pagina.Id ='".$_GET['id']."' ");
		$rw_Admin=mysqli_fetch_array($query);
		
		$Nombre =$rw_Admin['Nombre'];
		$Id =$rw_Admin['Id'];
	}else{
		
	}

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
<body onload="CargarSessiones()">
	<div id="wrapper">
		<?php
			include("Menu.php");
			include("componentes/modal/Agregar_Objeto.php");
			include("componentes/modal/Configuracion_Pagina.php");
			include("componentes/modal/Agregar_Session.php");
			include("componentes/modal/Configuracion_Session.php");
		?>
		<div id="main-content">
			<div class="container-fluid">
				<div class="panel panel-default">
					<div class="panel-heading">
		    		<div class="btn-group pull-right">				
							<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarPagina(<?php echo $Id; ?>)">
								<span class="fas fa-cogs"></span> Configuracion
							</button>
						</div>
						<h4><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $Nombre;?></h4>
					</div>
					<div class="panel-body">
						<div class="tab-content content-profile">
							<div class="tab-pane fade in active" id="Informacion">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#AgregarSession">
									<i class="fas fa-plus"></i> Adicionar Seccion
								</button>
								<form class="form-horizontal " method="post" id="Guardar_Pagina" name="Guardar_Pagina">
								<input type="text" class="hidden" id="TipoSession">
								<input type="text" class="hidden" id="LadoSession">
								<input type="text" class="hidden" id="IdSession">
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
	<script>

function NuevaSession(N){
	var Id = document.getElementById('Id').value;
	
	$.ajax({
	url:'Componentes/Ajax/Crear_Session.php?Pagina='+Id+'&Tipo='+N,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#AgregarSession').modal('hide');
			
		}
	})
	
}
function NuevoObjeto(N){
	var Tipo = document.getElementById('TipoSession').value;
	var Lado = document.getElementById('LadoSession').value;
	var IdSession = document.getElementById('IdSession').value;
	$.ajax({
	url:'Componentes/Ajax/Crear_Objeto.php?Tipo='+N+'&TipoSession='+Tipo+'&Lado='+Lado+'&IdSession='+IdSession,
		 beforeSend: function(objeto){
			$('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#AgregarObjeto').modal('hide');
			
		}
	})
	
}
function ConfigurarPagina(Pagina){
	
	$('#ConfiguracionPagina').modal('show');

}
$( "#Editar_Pagina" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();
	  $.ajax({
		   type: "POST",
			 url: "Componentes/Ajax/Editar_Pagina.php",
		   data: parametros,
			  beforeSend: function(objeto){
			   $("#resultados_Pagina").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
	
		
			$("#resultados_Pagina").html(datos);
		 
		 $('#actualizar_datos3B').attr("disabled", false);
		 $('#resultados_Pagina').fadeOut(2000); 
			 setTimeout(function() { 
				 $('#resultados_Pagina').html('');	
				 $('#resultados_Pagina').fadeIn(1000); 
			 }, 1000);	
		 
		 }
   });
   event.preventDefault();
})

function CargarSessiones(){
	var Id = document.getElementById('Id').value;
	$.ajax({
	url:'Componentes/Ajax/Cargar_Session.php?Id='+Id,
		 beforeSend: function(objeto){
			$('#resultados_ajax').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#resultados_ajax').html(data);
			
		}
	})
	
}
function ConfigurarSession(Session,Tipo){
	$('#ConfiguracionSession').modal('show');
	$.ajax({
	url:'Componentes/Ajax/Cargar_Session_Editar.php?Id='+Session+'&Tipo='+Tipo,
		 beforeSend: function(objeto){
			$('#Trae_Session').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
	
			$('#Trae_Session').html(data);
			
		}
	})

}
$( "#Editar_Session" ).submit(function( event ) {
  
  
  var parametros = $(this).serialize();

	  $.ajax({
		url: "Componentes/Ajax/Editar_Session.php",
		   type: "POST",
		   data: new FormData(this),
		   cache: false,
    contentType: false,
    processData: false,
			  beforeSend: function(objeto){
			   $("#resultados_Session").html("Mensaje: Cargando...");
			   },
		   success: function(datos){
	
		
		  
		   $("#resultados_Session").html(datos);
		 
	
		 
		 
		 }
		  
		   
		 
   });
   event.preventDefault();
})
$("#Imagen").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Por Favor Seleccione un Archivo (JPEG/JPG/PNG).');
            $("#file").val('');
          
            return false;
        }
    });
function CambioTipoFondo(){
	
	if (document.getElementById('TipoFondo').value=='Imagen'){
		$('#Div-Imagen').removeClass("hidden");
		$('#Div-Fondo').addClass("hidden");
	} else{
		$('#Div-Imagen').addClass("hidden");
		$('#Div-Fondo').removeClass("hidden");
	}
	
}
function TipoCSession(Tipo,Lado,Id){
	
	$('#LadoSession').val(Lado);
	$('#TipoSession').val(Tipo);
	$('#IdSession').val(Id);

	
	
	
}






	</script>
</body>

</html>
