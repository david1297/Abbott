<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Id = mysqli_real_escape_string($con,(strip_tags($_GET["Id"],ENT_QUOTES)));

$Consulta="SELECT Pregunta FROM encuestad where Id = ".$Id.";";
$queryP = mysqli_query($con, $Consulta);
$row=mysqli_fetch_array($queryP);
$Pregunta = $row['Pregunta'];
?>
<div class="form-group">
	<label for="Nombre" class="col-sm-4 control-label">Descripcion</label>
	<div class="col-sm-8">
	<textarea class="form-control" rows="5" id="Pregunta" name="Pregunta" placeholder="Parrafo"><?php echo $Pregunta;?></textarea>
	<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
	</div>
</div>
<div id="resultados_Pregunta"></div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
	<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
</div>
					
					
					
					
										
					
					 

