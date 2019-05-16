<?php
	if (isset($con)){
?>
	<div class="modal " id="ConfiguracionObjeto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" > Editar Objeto</h4>
		  	</div>
		  	<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" id="Editar_Objeto" name="Editar_Objeto">							
					<div id="Trae_Objeto"></div>
					
					<div id="resultados_Objeto"></div>
		  			<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');">Cerrar</button>
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