<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Id = $_GET["Id"];
$Tipo = $_GET["Tipo"];
if($Tipo=='Titulo'){
	$sql="SELECT * FROM titulos where Id = ".$Id." ";
                  
	$query = mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	$Texto = $row['Texto'];
	$Color = $row['color'];
	$Tamaño = $row['Tamaño'];
	$TipoGrafia = $row['TipoGrafia'];
	?>
					<div class="form-group">
						<label for="Nombre" class="col-sm-4 control-label">Texto</label>
						<div class="col-sm-8">
						<input type="Text" class="form-control" id="Texto" name="Texto" Value="<?php echo $Texto;?>" placeholder="Descripcion de la Session" autocomplete="off" required>
						<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
						<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Titulo" > 
						</div>
					</div>
					
					
										
					<div class="form-group" id="Div-Fondo">
						<label for="Nombre" class="col-sm-4 control-label">Color</label>
						<div class="col-sm-8">
							<input type="color" class="form-control" id="Color" name="Color" Value="<?php echo $Color;?>" placeholder="Descripcion de la Session" autocomplete="off">
						</div>
					</div>
					<div class="form-group ">
						<label  class="col-sm-4 control-label">Tamaño </label>
						<div class="col-md-8 col-sm-8">
							<select class='form-control' id="Tamaño" name ="Tamaño" placeholder="Tamaño"> 
								<?php 
								for ($i = 1; $i <= 72; $i++) {
									if($i == $Tamaño){
										echo '<option value="'.$i.'" selected>'.$i.'</option>';
										
									}else{
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								}
								?>
							</select>
						</div>
					</div> 
					<div class="form-group ">
						<label  class="col-sm-4 control-label">Fuente </label>
						<div class="col-md-8 col-sm-8">
							<select class='form-control' id="TipoGrafia" name ="TipoGrafia" placeholder="TipoGrafia" > 
								<?php 
								if($TipoGrafia == 'Arial'){
									echo '<option value="Arial">Arial</option>';
									echo '<option value="Verdana">Verdana</option>';
								}else{
									echo '<option value="Verdana">Verdana</option>';
									echo '<option value="Arial">Arial</option>';
								}
								?>
							</select>
						</div>
					</div>
					<?php
}

                   ?>
					 

