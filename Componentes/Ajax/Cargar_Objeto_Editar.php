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
						$sql="SELECT * FROM tipografias order by Id ";    
						$query1 = mysqli_query($con, $sql);
						while($row1=mysqli_fetch_array($query1)){
							if($TipoGrafia == $row1['Valor']){
								echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" selected>'.$row1['Tipo'].'</option>';
							}else{
								echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" >'.$row1['Tipo'].'</option>';
							}
						}

					?>
			</select>
		</div>
	</div>
	<div id="resultados_Objeto"></div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
		<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
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
						$sql="SELECT * FROM tipografias order by Id ";    
						$query1 = mysqli_query($con, $sql);
						while($row1=mysqli_fetch_array($query1)){
							if($TipoGrafia == $row1['Valor']){
								echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" selected>'.$row1['Tipo'].'</option>';
							}else{
								echo '<option class="'.$row1['Valor'].'" value="'.$row1['Valor'].'" >'.$row1['Tipo'].'</option>';
							}
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
					if($Justificacion == 'text-right'){
						echo '<option value="text-right">Derecha</option>';
						echo '<option value="text-left">Izquierda</option>';
						echo '<option value="text-center">Centrada</option>';
						echo '<option value="text-justify">Justificado</option>';
					}else{
						if($Justificacion == 'text-left'){
							echo '<option value="text-left">Izquierda</option>';
							echo '<option value="text-right">Derecha</option>';
							echo '<option value="text-center">Centrada</option>';
							echo '<option value="text-justify">Justificado</option>';
						}else{
							if($Justificacion == 'text-justify'){
								echo '<option value="text-justify">Justificado</option>';
								echo '<option value="text-center">Centrada</option>';
								echo '<option value="text-left">Izquierda</option>';
								echo '<option value="text-right">Derecha</option>';
							

							}else{
								echo '<option value="text-center">Centrada</option>';
								echo '<option value="text-left">Izquierda</option>';
								echo '<option value="text-right">Derecha</option>';
								echo '<option value="text-justify">Justificado</option>';
							}	
						
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
		<div id="resultados_Objeto"></div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
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
			<div id="resultados_Objeto"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
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
				<div id="resultados_Objeto"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
				</div>
				<?php
			}else{
				if($Tipo=='Carrusel'){
					$sql="SELECT * FROM Carrusel where Id = ".$Id." ";    
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Controles = $row['Controles'];
					?> 	
					<div class="col-sm-2">
						<button type="button" class="btn btn-default  btn-block" onclick="AgregarCarrusel(<?php echo $Id;?>)"><i class="fas fa-plus"></i>Agregar</button>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="form-group">
							<label class="col-md-1 control-label" for="Principal">Controles</label>
							<div class="col-sm-8">		
								<?php
								if ($Controles =='True'){
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Controles" Name="Controles" checked>
									<?php
								}else{
									?>
									<input class="form-check-input" type="checkbox" value="True" id="Controles" Name="Controles" >
									<?php
								}	
								?>													
							</div>
						</div>
					</div>
					<?php
					$sql="SELECT Imagen,Id FROM Carruseld where Carrusel = ".$Id." order by Orden";    
					$query = mysqli_query($con, $sql);
					while ($row=mysqli_fetch_array($query)){
						$Cid= $row['Id'];
						?>
						<div class="col-md-2">
							<div class="card border-dark">
							  <div class="card-body">
							  <img src='data:image/jpg;base64,<?php echo $row['Imagen']; ?>' class='img-thumbnail'  alt="Imagen" />
							  	<div class="form-group row">
								  <div class="col-md-4">
							  		<button type="button" class="btn btn-outline-danger " onclick="EliminarObjeto(<?php echo $Cid;?>,'CarruselD')" ><i class="fas fa-trash-alt"></i></button>   
									  </div>
									  <div class="col-md-8">
										<button type="button" class="btn btn-outline-secondary btn-block " onclick="ConfigurarObjeto(<?php echo $Cid;?>,'CarruselD')">Editar</button>
    								</div>
  								</div>
							  </div>
							</div>
							<br>
						</div>
					<?php
					}	
					?>
					<div class="form-group">
						<div class="col-sm-8">
						<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
						<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Carrusel" > 
						</div>
					</div>
					<div id="resultados_Objeto"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
					</div>
					<?php
				}else{
					if($Tipo=='CarruselD'){
						$sql="SELECT Carrusel,Imagen,Id,Titulo,TTamaño,TColor,TTipografia,TJustificacion,Parrafo,PTamaño,PColor,PTipografia,PJustificacion FROM Carruseld where Id = ".$Id." order by Orden";    
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Imagen = $row['Imagen'];
						$Titulo = $row['Titulo'];
						$TColor = $row['TColor'];
						$TTamaño = $row['TTamaño'];
						$TTipografia = $row['TTipografia'];
						$TJustificacion =$row['TJustificacion']; 
						$Parrafo = $row['Parrafo'];
						$PColor = $row['PColor'];
						$PTamaño = $row['PTamaño'];
						$PTipografia = $row['PTipografia'];
						$PJustificacion =$row['PJustificacion'];
						$Carrusel =$row['Carrusel'];  
						?>
						<div class="form-group" id="Div-Imagen">
							<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
							<div class="col-sm-8">
								<input type="file" class="form-control-file" id="Imagen" name="Imagen" data-max-size="10240" accept="image/x-png,image/jpg,image/jpeg">
								<p class="text-muted">Tamaño Maximo 2Mb</p>	
								<br>
							</div>
							 	
						</div> 
						<div class="row"> 
							<div class="col-md-2 ">
								<img src='data:image/jpg;base64,<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="Nombre" class="col-sm-4 control-label">Titulo</label>
									<div class="col-sm-8">
										<input type="Text" class="form-control" id="Titulo" name="Titulo" Value="<?php echo $Titulo;?>" placeholder="Titulo" autocomplete="off" required> 
									</div>
								</div>
								<div class="form-group" id="Div-Fondo">
									<label for="Nombre" class="col-sm-4 control-label">Color</label>
									<div class="col-sm-8">
										<input type="Color" class="form-control" id="TColor" name="TColor" Value="<?php echo $TColor;?>"  autocomplete="off">
									</div>
								</div>
								<div class="form-group ">
									<label  class="col-sm-4 control-label">Tamaño </label>
									<div class="col-md-8 col-sm-8">
										<select class='form-control' id="TTamaño" name ="TTamaño" placeholder="TTamaño"> 
											<?php 
											for ($i = 1; $i <= 72; $i++) {
												if($i == $TTamaño){
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
										<select class='form-control' id="TTipografia" name ="TTipografia" placeholder="TTipografia" > 
											<?php 
											if($TTipografia == 'Arial'){
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
										<select class='form-control' id="TJustificacion" name ="TJustificacion" placeholder="TJustificacion" > 
											<?php 
											if($TJustificacion == 'Derecha'){
												echo '<option value="Derecha">Derecha</option>';
												echo '<option value="Izquierda">Izquierda</option>';
												echo '<option value="Centrada">Centrada</option>';
											}else{
												if($TJustificacion == 'Izquierda'){
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
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="Nombre" class="col-sm-4 control-label">Parrafo</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="3" id="Parrafo" name="Parrafo"><?php echo $Parrafo;?></textarea>
									</div>
								</div>
								<div class="form-group" id="Div-Fondo">
									<label for="Nombre" class="col-sm-4 control-label">Color</label>
									<div class="col-sm-8">
										<input type="color" class="form-control" id="PColor" name="PColor" Value="<?php echo $PColor;?>" placeholder="Descripcion de la Session" autocomplete="off">
									</div>
								</div>
								<div class="form-group ">
									<label  class="col-sm-4 control-label">Tamaño </label>
									<div class="col-md-8 col-sm-8">
										<select class='form-control' id="PTamaño" name ="PTamaño" placeholder="PTamaño"> 
											<?php 
											for ($i = 1; $i <= 72; $i++) {
												if($i == $PTamaño){
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
										<select class='form-control' id="PTipografia" name ="PTipografia" placeholder="PTipografia" > 
											<?php 
											if($PTipografia == 'Arial'){
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
										<select class='form-control' id="PJustificacion" name ="PJustificacion" placeholder="PJustificacion" > 
											<?php 
											if($PJustificacion == 'Derecha'){
												echo '<option value="Derecha">Derecha</option>';
												echo '<option value="Izquierda">Izquierda</option>';
												echo '<option value="Centrada">Centrada</option>';
											}else{
												if($PJustificacion == 'Izquierda'){
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
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-8">
							<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
							<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="CarruselD" > 
							</div>
						</div>
						<div id="resultados_Objeto"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" onclick="ConfigurarObjeto(<?php echo $Carrusel;?>,'Carrusel')">Cerrar</button>
							<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
						</div>
						<?php
					}
				}
			}
		}
	}
}
?>
					