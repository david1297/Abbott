<?php
	if (isset($con)){
?>
	<div class="modal fade" id="ConfiguracionPagina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" > Editar Paginas</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Editar_Pagina" name="Editar_Pagina">
						<div id="resultados_ajax3B"></div>
						<?php
						$sql="SELECT * FROM Pagina where Id = $Id ";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Nombre = $row['Nombre'];
						$Estado = $row['Estado'];
						$Principal = $row['Principal'];
						?>
			  			<div class="form-group">
							<label for="Nombre" class="col-sm-4 control-label">Nombre</label>
							<div class="col-sm-8">
				  			<input type="Text" class="form-control" id="Nombre" name="Nombre" Value="<?php echo $Nombre;?>" placeholder="Nombre de la Pagina" autocomplete="off" required>
							<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id; ?>" > 
							</div>
			  			</div>
						
						  <div class="form-group ">
										<label for="Estado" class="col-sm-4 control-label">Estado</label>
										<div class="col-md-8 col-sm-8">
											<select class='form-control' id="Estado" name ="Estado" placeholder="Estado" > 
												<?php 
													if($Estado == 'Activa'){
														echo '<option value="Activa">Activa</option>';
														echo '<option value="InActiva">InActiva</option>';
													}else{
														echo '<option value="InActiva">InActiva</option>';
														echo '<option value="Activa">Activa</option>';
													}
							  					?>
											</select>
										</div>
									</div>  
									<div class="form-group">
							<label class="col-sm-4 control-label" for="Principal">Pagina Principal</label>
							<div class="col-sm-8">		
								<?php
								if ($Principal =='True'){
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Principal" Name="Principal" checked>
									<?php
								}else{
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Principal" Name="Principal" >
									<?php
								}	
								?>													
							</div>
			  			</div>
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