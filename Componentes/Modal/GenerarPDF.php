<?php
if (isset($con)){
	?>
	<div class="modal fade" id="Pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="AgregarBanco">Generar PDF</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="GenerarPDF" name="GenerarPDF">
						<div id="resultados_ajax3B"></div>
						<label for="Nombre" class="text-left col-md-12 ">Fechas</label>
						<div class="form-group">
							<div class="col-md-6">		
									<input type="Date" class="form-control" id="FechaIni" name="FechaIni" value="<?php echo date("Y-m-d",strtotime("-1 month"))?>" onchange='load(1);'>
							</div>
							<div class="col-md-6">		
									<input type="Date" class="form-control" id="FechaFin" name="FechaFin" value="<?php echo date("Y-m-d")?>" onchange='load(1);'>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Generar</button>
						</div>
					</form>
				</div>
	  		</div>
		</div>
	</div>
	<?php
}
?>	
