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
}else{
	if($Tipo=='Parrafo'){
		$sql="SELECT * FROM parrafos where Id = ".$Id." ";    
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Texto = $row['Texto'];
		$Color = $row['color'];
		$Tamaño = $row['Tamaño'];
		$TipoGrafia = $row['TipoGrafia'];
		$Justificacion = $row['Justificacion'];
		?>
											
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
		<div class="form-group ">
			<label  class="col-sm-4 control-label">Alineacion </label>
			<div class="col-md-8 col-sm-8">
				<select class='form-control' id="Justificacion" name ="Justificacion" placeholder="Justificacion" > 
					<?php 
					if($Justificacion == 'Derecha'){
						echo '<option value="Derecha">Derecha</option>';
						echo '<option value="Izquierda">Izquierda</option>';
						echo '<option value="Centrada">Centrada</option>';
					}else{
						if($Justificacion == 'Izquierda'){
							echo '<option value="Izquierda">Izquierda</option>';
							echo '<option value="Derecha">Derecha</option>';
							echo '<option value="Centrada">Centrada</option>';
						}else{
							echo '<option value="Centrada">Centrada</option>';
							echo '<option value="Izquierda">Izquierda</option>';
							echo '<option value="Derecha">Derecha</option>';
						}
					
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="Nombre" class="col-sm-4 control-label">Texto</label>
			<div class="col-sm-8">
			<textarea class="form-control" rows="5" id="Texto" name="Texto"><?php echo $Texto;?></textarea>
			<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
			<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Parrafo" > 
			</div>
		</div>
		<?php
	}else{
		if($Tipo=='Imagen'){
			$sql="SELECT * FROM imagenes where Id = ".$Id." ";    
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Imagen = $row['Imagen'];
			
			?>
			<div class="form-group" id="Div-Imagen">
				<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
				<div class="col-sm-8">
					<input type="file" class="form-control-file" id="Imagen" name="Imagen" data-max-size="10240" accept="image/x-png,image/jpg,image/jpeg">
					<p class="text-muted">Tamaño Maximo 2Mb</p>	
					<br>
				</div>
				<div class="col-md-offset-2 col-md-8 ">
					<img src='data:image/jpg;base64,<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
				</div> 	
			</div> 	
			<div class="form-group">
				<div class="col-sm-8">
				<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
				<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Imagen" > 
				</div>
			</div>
			<?php
		}else{
			if($Tipo=='Video'){
				$sql="SELECT * FROM Videos where Id = ".$Id." ";    
				$query = mysqli_query($con, $sql);
				$row=mysqli_fetch_array($query);
				$Video = $row['Video'];
				$Autoplay = $row['Autoplay'];
				?>
				<div class="form-group" id="Div-Video">
					<label for="Nombre" class="col-sm-4 control-label">Video</label>
					<div class="col-sm-8">
						<input type="file" class="form-control-file"  onchange="nombre(this.value)">
						<input type="text" class="form-control hidden" id="Video" name="Video"  value="" > 
					
						<br>
					</div>
					<div class="col-md-offset-2 col-md-8 ">
						<video controls loop class="embed-responsive-item"  width="100%" <?php echo $Autoplay; ?> >
                            <source src="Videos/<?php echo $Video; ?>" type="video/mp4"  >
                        </video>
					</div> 	
				</div> 	
				<div class="form-group">
							<label class="col-sm-4 control-label" for="Principal">Autoplay</label>
							<div class="col-sm-8">		
								<?php
								if ($Autoplay =='Autoplay'){
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Autoplay" Name="Autoplay" checked>
									<?php
								}else{
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Autoplay" Name="Autoplay" >
									<?php
								}	
								?>													
							</div>
				<div class="form-group">
					<div class="col-sm-8">
					<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
					<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Video" > 
					</div>
				</div>
				<?php
			}
		}
	}
}
?>
					 

