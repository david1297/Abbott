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
					
					
		  			
		  		</form>
				<form class="form-horizontal"  enctype="multipart/form-data" id="Cargar_Album" name="Cargar_Album">							
					
				<input type="file" class="form-control hidden" id="InputAlbum" name="archivo[]" multiple="" onchange="SubirAlbum()">	
				<input type="text" class="form-control hidden" id="IdAlbum" name="IdAlbum"  value="" > 	
				<button type="submit" class="btn btn-primary hidden" id="Cargar_Album_Input">Guardar</button>
		  		</form>
				</div>
	  	</div>
		</div>
	</div>
	<?php
		}
	?>	