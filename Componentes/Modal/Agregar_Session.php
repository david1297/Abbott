<?php
	if (isset($con)){
?>
	<div class="modal fade" id="AgregarSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
		  	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="AgregarBanco"> Agregar Sessions</h4>
		  	</div>
		  	<div class="modal-body">
					<form class="form-horizontal" method="post" id="Nueva_Session" name="Nueva_Session">
						<div id="resultados_ajax3B"></div>
						<div class="row">
						<div class="col-md-12">
						<ul class="fusion-builder-column-layouts fusion-builder-all-modules">
							<li data-layout="1_1" onclick="NuevaSession(1);">
							
								<h4 class="fusion_module_title" style="display:none;">full one 1</h4>
								<div class="fusion_builder_layout_column fusion_builder_column_layout_1_1">1/1</div>
							
							</li>
							<li data-layout="1_2,1_2"  onclick="NuevaSession(2);">
								<h4 class="fusion_module_title" style="display:none;">two half 2 1/2</h4>
								<div class="fusion_builder_layout_column fusion_builder_column_layout_1_2">1/2</div>
								<div class="fusion_builder_layout_column fusion_builder_column_layout_1_2">1/2</div>
							</li>
						</ul>
						</div>
						</div>
						

						<br>
						<br>
						<br>
		  			<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id="CerrarNuevaSession">Cerrar</button>		
		  			</div>
		  		</form>
				</div>
	  	</div>
		</div>
	</div>
	<?php
		}
	?>	