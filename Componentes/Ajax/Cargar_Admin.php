<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$sql="SELECT * FROM administracion ";
	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	$ColorP=$row['ColorP'];
	$ColorS=$row['ColorS'];
	$ColorT=$row['ColorT'];
	$Justificacion=$row['Justificacion'];
	$TipoGrafia=$row['TipoGrafia'];
	$Tamano=$row['Tamano'];
	


	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4><i class="fas fa-location-arrow"></i> Barra de Navegacion</h4>
		</div>
		<div class="panel-body">
			<div class="tab-content content-profile">
				<div class="tab-pane fade in active" id="Informacion">
					<div class="panel-content">
						<div class="row">
						<form class="form-horizontal"  enctype="multipart/form-data" id="Editar_Admin" name="Editar_Admin" metod='POST' action='Editar_Admin.php'>	
							<div class="col-md-8">
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Imagen Principal </label>
										</div>						
										<div class="col-md-6">
											<input type="file" class="form-control" id="ImagenP" name="ImagenP" accept="image/x-png,image/jpg,image/jpeg">
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Imagen Icono </label>
										</div>						
										<div class="col-md-6">
											<input type="file" class="form-control" id="Icono" name="Icono" accept="image/x-png,image/jpg,image/jpeg">
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Color Principal </label>
										</div>						
										<div class="col-md-6">
											<input type="color" class="form-control" id="ColorP" name="ColorP" Value="<?php echo $ColorP;?>" placeholder="Color" autocomplete="off">					
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Color Secundario </label>
										</div>						
										<div class="col-md-6">
											<input type="color" class="form-control" id="ColorS" name="ColorS" Value="<?php echo $ColorS;?>" placeholder="Color" autocomplete="off">					
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Justificacion </label>
										</div>						
										<div class="col-md-6">
											<select class='form-control' id="Justificacion" name ="Justificacion" placeholder="Justificacion" > 
												<?php 
												if($Justificacion == 'text-right'){
													echo '<option value="text-right">Derecha</option>';
													echo '<option value="text-left">Izquierda</option>';
													echo '<option value="text-center">Centrada</option>';
												}else{
													if($Justificacion == 'text-left'){
														echo '<option value="text-left">Izquierda</option>';
														echo '<option value="text-right">Derecha</option>';
														echo '<option value="text-center">Centrada</option>';
													}else{
															echo '<option value="text-center">Centrada</option>';
															echo '<option value="text-left">Izquierda</option>';
															echo '<option value="text-right">Derecha</option>';
													}
												
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">TipoGrafia </label>
										</div>						
										<div class="col-md-6">
											<select class='form-control' id="TipoGrafia" name ="TipoGrafia" placeholder="TipoGrafia" > 
												<?php 
													$sql1="SELECT * FROM tipografias order by Id ";    
													$query1 = mysqli_query($con, $sql1);
													while($row1=mysqli_fetch_array($query1)){
														if($TipoGrafia == $row1['Valor']){
															echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" selected>'.$row1['Tipo'].'</option>';
														}else{
															echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" >'.$row1['Tipo'].'</option>';
														}
													}

												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Tamaño </label>
										</div>						
										<div class="col-md-6">
											<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
												<?php 
												for ($i = 1; $i <= 72; $i++) {
													if($i == $Tamano){
														echo '<option value="'.$i.'" selected>'.$i.'</option>';
														
													}else{
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="col-md-12">
									<div class="form-group ">
										<div class="col-md-2">
											<label  class=" control-label">Color del Texto </label>
										</div>						
										<div class="col-md-6">
											<input type="color" class="form-control" id="ColorT" name="ColorT" Value="<?php echo $ColorT;?>" placeholder="Color" autocomplete="off">					
										</div>
									</div>
								</div>
							</div>	
							<br>
							<br>
							<div class="col-md-12">
							<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
							</div>
						</form>	
						<br>
						<br>
						<div class="col-md-12">
						<br>

						<div id="resultados_Admin"></div>
						</div>	
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<div class="panel panel-default">
		<div class="panel-heading">
		<div class="btn-group pull-right">				
								<button type="button" class="btn btn-default" onclick="NuevoBoton();">
									<i class="fas fa-plus"></i> Adicionar Boton
								</button>
							</div>
			<h4><i class="fas fa-location-arrow"></i> Botones</h4>
			
		</div>
		
		<div class="panel-body">
			<div class="tab-content content-profile">
				<div class="tab-pane fade in active" id="Informacion">
					<div class="panel-content">
						<div class="row">
						<div id="resultados_AdminD"></div>	
						

					
						</div>	
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
<script>
$( "#Editar_Admin" ).submit(function( event ) {
  		var parametros = $(this).serialize();
	  	$.ajax({
		   	type: "POST",
			url: "Componentes/Ajax/Editar_Admin.php",
		   	data: parametros,
			   data: new FormData(this),
		   cache: false,
    contentType: false,
    processData: false,
			beforeSend: function(objeto){
				$("#resultados_Admin").html("Mensaje: Cargando...");
			},
			success: function(datos){
				$("#resultados_Admin").html(datos);
				$('#actualizar_datos3B').attr("disabled", false);
				$('#resultados_Admin').fadeOut(2000); 
				setTimeout(function() { 
					$('#resultados_Admin').html('');	
					$('#resultados_Admin').fadeIn(1000); 
				}, 1000);	
			
			}
   		});
   		event.preventDefault();
	})
	$("#ImagenP").change(function() {
	var file = this.files[0];
	var imagefile = file.type;
	var match= ["image/jpeg","image/png","image/jpg"];
	if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
			alert('Por Favor Seleccione un Archivo (JPEG/JPG/PNG).');
			$("#file").val('');
		
			return false;
	}
	
});

$("#Icono").change(function() {
	var file = this.files[0];
	var imagefile = file.type;
	var match= ["image/jpeg","image/png","image/jpg"];
	if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
			alert('Por Favor Seleccione un Archivo (JPEG/JPG/PNG).');
			$("#file").val('');
		
			return false;
	}
});
</script>





		
	<?php

?>