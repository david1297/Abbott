<?php
	if (isset($con)){
?>
	<div class="modal fade" id="AgregarPregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="AgregarBanco"> Agregar Preguntas</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Nueva_Pregunta" name="Nueva_Pregunta">
						<div id="resultados_ajax3B"></div>
						<div class="row">
						<div class="col-md-12">
						<ul class="fusion-builder-column-layouts fusion-builder-all-modules">
							
							<li class="fusion_alert fusion-builder-element" onclick="NuevaPregunta(1);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-text-height"></i>	 Texto
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevaPregunta(2);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-check-square"></i>	 Multiple
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevaPregunta(3);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="far fa-check-square"></i> Seleccion
								</h4>
							</li>
							
						</ul>
						</div>
						</div>
						

						<br>
						<br>
						<br>
		  			<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<!--<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>-->
		  			</div>
		  		</form>
				</div>
	  	</div>
		</div>
	</div>
	<?php
		}
	?>	