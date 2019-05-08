<?php
	if (isset($con)){
?>
	<div class="modal fade" id="AgregarPagina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="AgregarBanco"> Agregar Paginas</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Nueva_Pagina" name="Nueva_Pagina">
						<div id="resultados_ajax3B"></div>
			  		<div class="form-group">
							<label for="Nombre" class="col-sm-4 control-label">Nombre</label>
							<div class="col-sm-8">
				  			<input type="Text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre de la Pagina" autocomplete="off" required>
							</div>
			  		</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="Principal">Pagina Principal</label>
							<div class="col-sm-8">								
  							<input class="form-check-input" type="checkbox" value="True" id="Principal" Name="Principal">								
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