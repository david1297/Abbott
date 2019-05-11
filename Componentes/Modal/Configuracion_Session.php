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
					<div id="Trae_Session"></div>
					
					<div id="resultados_Session"></div>
		  			<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Session').html('');">Cerrar</button>
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