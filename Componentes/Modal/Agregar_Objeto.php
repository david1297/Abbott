<?php
	if (isset($con)){
?>
	<div class="modal fade" id="AgregarObjeto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="AgregarBanco"> Agregar Objetos</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Nueva_Objeto" name="Nueva_Objeto">
						<div id="resultados_ajax3B"></div>
						<div class="row">
						<div class="col-md-12">
						<ul class="fusion-builder-column-layouts fusion-builder-all-modules">
							
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(1);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-text-height"></i>	 Titulo
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(2);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-stream"></i>	 Parrafo
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(3);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-image"></i> Imagen
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(4);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-video"></i> Video
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(5);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-images"></i> Carrusel
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(6);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-book"></i> Album de Fotos
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(7);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-fighter-jet"></i> Botonera
								</h4>
							</li>
							<li class="fusion_alert fusion-builder-element" onclick="NuevoObjeto(8);">
								<h4 class="fusion_module_title">
									<div class="fusion-module-icon fusiona-exclamation-triangle"></div>
									<i class="fas fa-external-link-square-alt"></i> Boton
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