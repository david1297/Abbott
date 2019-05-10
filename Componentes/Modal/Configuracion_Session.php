<?php
	if (isset($con)){
?>
	<div class="modal " id="ConfiguracionSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" > Editar Sessiones</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal"  enctype="multipart/form-data" id="Editar_Session" name="Editar_Session">
						
						<?php
						$sql="SELECT * FROM seccion1 where Id = 1 ";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Descripcion = $row['Descripcion'];
						$TipoFondo = $row['TipoFondo'];
						$Fondo = $row['Fondo'];
						$Completa = $row['Completa'];
						?>
			  			<div class="form-group">
							<label for="Nombre" class="col-sm-4 control-label">Descripcion</label>
							<div class="col-sm-8">
				  			<input type="Text" class="form-control" id="Descripcion" name="Descripcion" Value="<?php echo $Descripcion;?>" placeholder="Descripcion de la Session" autocomplete="off" required>
							<input type="text" class="form-control hidden" id="Id" name="Id"  value="1" > 
							<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="1" > 
							</div>
			  			</div>
						<div class="form-group ">
							<label  class="col-sm-4 control-label">Tipo de Fondo </label>
							<div class="col-md-8 col-sm-8">
								<select class='form-control' id="TipoFondo" name ="TipoFondo" placeholder="TipoFondo" > 
									<?php 
									if($TipoFondo == 'Imagen'){
										echo '<option value="Imagen">Imagen</option>';
										echo '<option value="Color">Color</option>';
									}else{
										echo '<option value="Color">Color</option>';
										echo '<option value="Imagen">Imagen</option>';
									}
									?>
								</select>
							</div>
						</div> 
						<div class="form-group">
							<label for="Nombre" class="col-sm-4 control-label">Fondo</label>
							<div class="col-sm-8">
								<?php 
								if($TipoFondo == 'Imagen'){
									?>
									<input type="file" class="form-control-file" id="Fondo" name="Fondo" accept="image/x-png,image/gif,image/jpeg">
									<br>
									<?php
									echo "<img src='data:image/jpg;base64,".$Fondo."'  width='200' style='<display:none;' />";
								}else{
									?>
							  		<input type="Text" class="form-control" id="Fondo" name="Fondo" Value="<?php echo $Fondo;?>" placeholder="Descripcion de la Session" autocomplete="off" required>
									<p class="text-muted">Se debe Digitar el Codigo RGBA del color Ejemplo: 20,15,30,1</p>										
									<?php	
								}
								
								?>
				  			
							  
								
							</div>
			  			</div> 
						<div class="form-group ">
							<label  class="col-sm-4 control-label">Tamaño </label>
							<div class="col-md-8 col-sm-8">
								<select class='form-control' id="Completa" name ="Completa" placeholder="Completa" > 
									<?php 
									if($Completa == 'True'){
										echo '<option value="True">100%</option>';
										echo '<option value="False">80%</option>';
									}else{
										echo '<option value="False">80%</option>';
										echo '<option value="True">100%</option>';
									}
									?>
								</select>
							</div>
						</div> 
						  <div id="resultados_Session"></div>
		  			<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
		  			</div>
		  		</form>
				</div>
	  	</div>
		</div>
	</div>
	<?php
		}
	?>	