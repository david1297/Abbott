<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Id = $_GET["Id"];
$Tipo = $_GET["Tipo"];
                    $sql="SELECT * FROM seccion".$Tipo." where Id = ".$Id." ";
                  
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Descripcion = $row['Descripcion'];
					$TipoFondo = $row['TipoFondo'];
					$Fondo = $row['Fondo'];
					$Completa = $row['Completa'];
					?>
					<div class="form-group">
						<label for="Nombre" class="col-sm-4 control-label">Descripcion</label>
						<div class="col-sm-8">
						<input type="Text" class="form-control" id="Descripcion" name="Descripcion" Value="<?php echo $Descripcion;?>" placeholder="Descripcion de la Session" autocomplete="off" required>
						<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
						<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="<?php echo $Tipo;?>" > 
						</div>
					</div>
					<div class="form-group ">
						<label  class="col-sm-4 control-label">Tamaño </label>
						<div class="col-md-8 col-sm-8">
							<select class='form-control' id="Completa" name ="Completa" placeholder="Completa" > 
								<?php 
								if($Completa == 'True'){
									echo '<option value="True">100%</option>';
									echo '<option value="False">80%</option>';
								}else{
									echo '<option value="False">80%</option>';
									echo '<option value="True">100%</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group ">
						<label  class="col-sm-4 control-label">Tipo de Fondo </label>
						<div class="col-md-8 col-sm-8">
							<select class='form-control' id="TipoFondo" name ="TipoFondo" placeholder="TipoFondo" onchange="CambioTipoFondo()" > 
								<?php 
								if($TipoFondo == 'Imagen'){
									echo '<option value="Imagen">Imagen</option>';
									echo '<option value="Color">Color</option>';
								}else{
									echo '<option value="Color">Color</option>';
									echo '<option value="Imagen">Imagen</option>';
								}
								?>
							</select>
						</div>
					</div> 
					<?php 
					if($TipoFondo == 'Imagen'){
						$Imagen='';
						$Color='hidden';
						$ColorFondo='';
						$ImagenFondo= $Fondo;

					}else{
						$Imagen='hidden';
						$Color='';	
						$ColorFondo= $Fondo;
						$ImagenFondo='';
					}								
					?>	
					
					<div class="form-group <?php echo $Imagen; ?>" id="Div-Imagen">
						<label for="Nombre" class="col-sm-4 control-label">Fondo</label>
						<div class="col-sm-8">
							<input type="file" class="form-control-file" id="Imagen" name="Imagen"  accept="image/x-png,image/jpg,image/jpeg">
					
							<br>
						</div>
						<div class="col-md-offset-2 col-md-8 ">
							<img src='Imagenes/<?php echo $ImagenFondo; ?>' class='img-thumbnail'  alt="Imagen" />
						</div>
					</div> 						
					<div class="form-group <?php echo $Color; ?>" id="Div-Fondo">
						<label for="Nombre" class="col-sm-4 control-label">Fondo</label>
						<div class="col-sm-8">
							<input type="color" class="form-control" id="Color" name="Color" Value="<?php echo $ColorFondo;?>" placeholder="Descripcion de la Session" autocomplete="off">
						</div>
					</div>
					 

