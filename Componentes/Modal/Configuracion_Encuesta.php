<?php
	if (isset($con)){
?>
	<div class="modal fade" id="ConfiguracionEncuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" > Editar Encuestas</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Editar_Encuesta" name="Editar_Encuesta">
						
						<?php
						$sql="SELECT * FROM Encuesta where Id = $Id ";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Nombre = $row['Nombre'];
						?>
			  			<div class="form-group">
							<label for="Nombre" class="col-sm-4 control-label">Nombre</label>
							<div class="col-sm-8">
				  			<input type="Text" class="form-control" id="Nombre" name="Nombre" Value="<?php echo $Nombre;?>" placeholder="Nombre de la Pagina" autocomplete="off" required>
							<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id; ?>" > 
							</div>
			  			</div>
						
						   
								
						  <div id="resultados_Encuesta"></div>
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