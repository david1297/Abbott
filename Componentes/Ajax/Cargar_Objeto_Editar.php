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
	$Tamano = $row['Tamano'];
	$TipoGrafia = $row['TipoGrafia'];
	$Justificacion = $row['Justificacion'];
	?>
	<div class="form-group">
		<label for="Nombre" class="col-sm-4 control-label">Texto</label>
		<div class="col-sm-8">
		<input type="Text" class="form-control" id="Texto" name="Texto" Value="<?php echo $Texto;?>" placeholder="Titulo" autocomplete="off" required>
		<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
		<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Titulo" > 
		</div>
	</div>									
	<div class="form-group" id="Div-Fondo">
		<label for="Nombre" class="col-sm-4 control-label">Color</label>
		<div class="col-sm-8">
			<input type="color" class="form-control" id="Color" name="Color" Value="<?php echo $Color;?>" placeholder="Color" autocomplete="off">
		</div>
	</div>
	<div class="form-group ">
		<label  class="col-sm-4 control-label">Tamano </label>
		<div class="col-md-8 col-sm-8">
			<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
				<?php 
				for ($i = 1; $i <= 72; $i++) {
					if($i == $Tamano){
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
					}else{
						if($Justificacion == 'text-left'){
							echo '<option value="text-left">Izquierda</option>';
							echo '<option value="text-right">Derecha</option>';
							echo '<option value="text-center">Centrada</option>';
						}else{
								echo '<option value="text-center">Centrada</option>';
								echo '<option value="text-left">Izquierda</option>';
								echo '<option value="text-right">Derecha</option>';
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
		$Tamano = $row['Tamano'];
		$TipoGrafia = $row['TipoGrafia'];
		$Justificacion = $row['Justificacion'];
		?>
											
		<div class="form-group" id="Div-Fondo">
			<label for="Nombre" class="col-sm-4 control-label">Color</label>
			<div class="col-sm-8">
				<input type="color" class="form-control" id="Color" name="Color" Value="<?php echo $Color;?>" placeholder="Color" autocomplete="off">
			</div>
		</div>
		<div class="form-group ">
			<label  class="col-sm-4 control-label">Tamaño </label>
			<div class="col-md-8 col-sm-8">
				<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
					<?php 
					for ($i = 1; $i <= 72; $i++) {
						if($i == $Tamano){
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
			<textarea class="form-control" rows="5" id="Texto" name="Texto" placeholder="Parrafo"><?php echo $Texto;?></textarea>
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
			$Tamano = $row['Tamano'];
			$Justificacion= $row['Justificacion'];
			?>
			<div class="form-group" id="Div-Imagen">
				<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
				<div class="col-sm-8">
					<input type="file" class="form-control-file" id="Imagen" name="Imagen" accept="image/x-png,image/jpg,image/jpeg">
					<br>
				</div>
				<div class="form-group ">
					<label  class="col-md-2 control-label">Tamano de Pantalla </label>
					<div class="col-md-2">
						<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
							<?php 
							for ($i = 2; $i <= 12; $i=$i+2) {
								if($i == $Tamano){
									echo '<option value="'.$i.'" selected>'.$i.'%</option>';
								}else{
									echo '<option value="'.$i.'">'.$i.'%</option>';
								}
							}
							?>
						</select>
					</div>
				</div> 
				<div class="form-group ">
					<label  class="col-md-2 control-label">Alineacion </label>
					<div class="col-md-2">
						<select class='form-control' id="Justificacion" name ="Justificacion" placeholder="Justificacion" > 
							<?php 
							
								if($Justificacion == 'text-left'){
									echo '<option value="text-left">Izquierda</option>';
									echo '<option value="text-center">Centrada</option>';
								}else{
										echo '<option value="text-center">Centrada</option>';
										echo '<option value="text-left">Izquierda</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-offset-2 col-md-8 ">
					<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
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
				$Tamano = $row['Tamano'];
				$Justificacion = $row['Justificacion'];
				?>
				<div class="form-group" id="Div-Video">
					<label for="Nombre" class="col-sm-4 control-label">Video</label>
					<div class="col-sm-8">
						<input type="file" class="form-control-file"  onchange="nombre(this.value)">
						<input type="text" class="form-control hidden" id="Video" name="Video"  value="" > 
					
						<br>
					</div>
					<div class="form-group ">
						<label  class="col-md-2 control-label">Tamano de Pantalla </label>
						<div class="col-md-2">
							<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
								<?php 
								for ($i = 2; $i <= 12; $i=$i+2) {
									if($i == $Tamano){
										echo '<option value="'.$i.'" selected>'.$i.'%</option>';
									}else{
										echo '<option value="'.$i.'">'.$i.'%</option>';
									}
								}
								?>
							</select>
						</div>
					</div> 	
					<div class="form-group ">
					<label  class="col-md-2 control-label">Alineacion </label>
					<div class="col-md-2">
						<select class='form-control' id="Justificacion" name ="Justificacion" placeholder="Justificacion" > 
							<?php 
							
								if($Justificacion == 'text-left'){
									echo '<option value="text-left">Izquierda</option>';
									
									echo '<option value="text-center">Centrada</option>';
								}else{
										echo '<option value="text-center">Centrada</option>';
										echo '<option value="text-left">Izquierda</option>';
										
								
								}
							?>
						</select>
					</div>
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
					$Tamano = $row['Tamano'];
					
					?> 	
					<div class="col-sm-2">
						<button type="button" class="btn btn-default  btn-block" onclick="AgregarCarrusel(<?php echo $Id;?>)"><i class="fas fa-plus"></i>Agregar</button>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="form-group">
							<label class="col-md-2 control-label" for="Principal">Controles</label>
							<div class="col-md-2">		
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
						<div class="form-group ">
							<label  class="col-md-2 control-label">Tamano de Pantalla </label>
							<div class="col-md-2">
								<select class='form-control' id="Tamano" name ="Tamano" placeholder="Tamano"> 
									<?php 
									for ($i = 2; $i <= 12; $i=$i+2) {
										if($i == $Tamano){
											echo '<option value="'.$i.'" selected>'.$i.'%</option>';
										}else{
											echo '<option value="'.$i.'">'.$i.'%</option>';
										}
									}
									?>
								</select>
							</div>
						</div> 
					</div>
					<?php
					$sql="SELECT Imagen,Id FROM Carruseld where Carrusel = ".$Id." order by Orden";    
					$query = mysqli_query($con, $sql);
					while ($row=mysqli_fetch_array($query)){
						$Cid= $row['Id'];
						$Imagen = $row['Imagen'];
						?>
						<div class="col-md-2">
							<div class="card border-dark">
							  <div class="card-body">
							  <img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail Album'  alt="Imagen" />
							  	<div class="form-group row">
								  <div class="col-md-4">
							  		<button type="button" class="btn btn-outline-danger " onclick="EliminarObjeto(<?php echo $Cid;?>,'CarruselD');ConfigurarObjeto(<?php echo $Id;?>,'Carrusel')" ><i class="fas fa-trash-alt"></i></button>   
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
						$sql="SELECT Carrusel,Imagen,Id,Titulo,TTamano,TColor,TTipografia,TJustificacion,Parrafo,PTamano,PColor,PTipografia,PJustificacion FROM Carruseld where Id = ".$Id." order by Orden";    
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Imagen = $row['Imagen'];
						$Titulo = $row['Titulo'];
						$TColor = $row['TColor'];
						$TTamano = $row['TTamano'];
						$TTipografia = $row['TTipografia'];
						$TJustificacion =$row['TJustificacion']; 
						$Parrafo = $row['Parrafo'];
						$PColor = $row['PColor'];
						$PTamano = $row['PTamano'];
						$PTipografia = $row['PTipografia'];
						$PJustificacion =$row['PJustificacion'];
						$Carrusel =$row['Carrusel'];  
						?>
						<div class="form-group" id="Div-Imagen">
							<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
							<div class="col-sm-8">
								<input type="file" class="form-control-file" id="Imagen" name="Imagen" accept="image/x-png,image/jpg,image/jpeg">
								<br>
							</div>
							 	
						</div> 
						<div class="row"> 
							<div class="col-md-2 ">
								<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="Nombre" class="col-sm-4 control-label">Titulo</label>
									<div class="col-sm-8">
										<input type="Text" class="form-control" id="Titulo" name="Titulo" Value="<?php echo $Titulo;?>" placeholder="Titulo" autocomplete="off" > 
									</div>
								</div>
								<div class="form-group" id="Div-Fondo">
									<label for="Nombre" class="col-sm-4 control-label">Color</label>
									<div class="col-sm-8">
										<input type="Color" class="form-control" id="TColor" name="TColor" Value="<?php echo $TColor;?>"  autocomplete="off">
									</div>
								</div>
								<div class="form-group ">
									<label  class="col-sm-4 control-label">Tamano </label>
									<div class="col-md-8 col-sm-8">
										<select class='form-control' id="TTamano" name ="TTamano" placeholder="TTamano"> 
											<?php 
											for ($i = 1; $i <= 72; $i++) {
												if($i == $TTamano){
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
											$sql="SELECT * FROM tipografias order by Id ";    
											$query1 = mysqli_query($con, $sql);
											while($row1=mysqli_fetch_array($query1)){
												if($TTipografia == $row1['Valor']){
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
										<select class='form-control' id="TJustificacion" name ="TJustificacion" placeholder="TJustificacion" > 
											<?php 
												
												if($TJustificacion == 'text-right'){
													echo '<option value="text-right">Derecha</option>';
													echo '<option value="text-left">Izquierda</option>';
													echo '<option value="text-center">Centrada</option>';
													echo '<option value="text-justify">Justificado</option>';
												}else{
													if($TJustificacion == 'text-left'){
														echo '<option value="text-left">Izquierda</option>';
														echo '<option value="text-right">Derecha</option>';
														echo '<option value="text-center">Centrada</option>';
														echo '<option value="text-justify">Justificado</option>';
													}else{
														if($TJustificacion == 'text-justify'){
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
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="Nombre" class="col-sm-4 control-label">Parrafo</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="3" id="Parrafo" placeholder="Parrafo" name="Parrafo"><?php echo $Parrafo;?></textarea>
									</div>
								</div>
								<div class="form-group" id="Div-Fondo">
									<label for="Nombre" class="col-sm-4 control-label">Color</label>
									<div class="col-sm-8">
										<input type="color" class="form-control" id="PColor" name="PColor" Value="<?php echo $PColor;?>" placeholder="Descripcion de la Session" autocomplete="off">
									</div>
								</div>
								<div class="form-group ">
									<label  class="col-sm-4 control-label">Tamano </label>
									<div class="col-md-8 col-sm-8">
										<select class='form-control' id="PTamano" name ="PTamano" placeholder="PTamano"> 
											<?php 
											for ($i = 1; $i <= 72; $i++) {
												if($i == $PTamano){
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
											$sql="SELECT * FROM tipografias order by Id ";    
											$query1 = mysqli_query($con, $sql);
											while($row1=mysqli_fetch_array($query1)){
												if($PTipografia == $row1['Valor']){
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
										<select class='form-control' id="PJustificacion" name ="PJustificacion" placeholder="PJustificacion" > 
											<?php 
												if($PJustificacion == 'text-right'){
													echo '<option value="text-right">Derecha</option>';
													echo '<option value="text-left">Izquierda</option>';
													echo '<option value="text-center">Centrada</option>';
													echo '<option value="text-justify">Justificado</option>';
												}else{
													if($PJustificacion == 'text-left'){
														echo '<option value="text-left">Izquierda</option>';
														echo '<option value="text-right">Derecha</option>';
														echo '<option value="text-center">Centrada</option>';
														echo '<option value="text-justify">Justificado</option>';
													}else{
														if($PJustificacion == 'text-justify'){
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
					}else{
						if($Tipo=='Album'){
							$sql="SELECT * FROM Album where Id = ".$Id." ";    
							$query = mysqli_query($con, $sql);
							$row=mysqli_fetch_array($query);
							?> 	
						
							<div class="col-sm-2">
								<button type="button" class="btn btn-default  btn-block" onclick="CargarAlbum(<?php echo $Id;?>)"><i class="fas fa-plus"></i>Cargar Album</button>
							</div>
							<br>
							<br>		
							<div class="row">			
								<?php
								$sql="SELECT Imagen,Id FROM AlbumD where Album = ".$Id." order by Orden";    
								$query = mysqli_query($con, $sql);
								while ($row=mysqli_fetch_array($query)){
									$Cid= $row['Id'];
									$Imagen= $row['Imagen'];
									?>
									<div class="col-md-2">
										<div class="card border-dark">
											<div class="card-body">
												<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail Album'  alt="Imagen"  />
												<div class="form-group row">
													<div class="col-md-4">
														<button type="button" class="btn btn-outline-danger " onclick="EliminarObjeto(<?php echo $Cid;?>,'AlbumD');ConfigurarObjeto(<?php echo $Id;?>,'Album');" ><i class="fas fa-trash-alt"></i></button>   
													</div>
													<div class="col-md-8">
														<button type="button" class="btn btn-outline-secondary btn-block " onclick="ConfigurarObjeto(<?php echo $Cid;?>,'AlbumD')">Editar</button>
													</div>
												</div>
											</div>
										</div>
										<br>
									</div>
									<?php
								}	
							?>
							</div>
							<div class="form-group">
								<div class="col-sm-8">
									<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
									<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="AlbumD" > 
								</div>
							</div>
							<div id="resultados_Objeto"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
							</div>
							<?php
						}else{
							if($Tipo=='AlbumD'){
								$sql="SELECT * FROM AlbumD where Id = ".$Id." ";    
								$query = mysqli_query($con, $sql);
								$row=mysqli_fetch_array($query);
								$Imagen = $row['Imagen'];
								$Album = $row['Album'];
								?>
								<div class="form-group" id="Div-Imagen">
									<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
									<div class="col-sm-8">
										<input type="file" class="form-control-file" id="Imagen" name="Imagen" data-max-size="10240" accept="image/x-png,image/jpg,image/jpeg">
										<br>
									</div>
									<div class="col-md-offset-2 col-md-8 ">
										<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
									</div> 	
								</div> 	
								<div class="form-group">
									<div class="col-sm-8">
									<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
									<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="AlbumD" > 
									</div>
								</div>
								<div id="resultados_Objeto"></div>
								<div class="modal-footer">
								<button type="button" class="btn btn-default" onclick="ConfigurarObjeto(<?php echo $Album;?>,'Album')">Cerrar</button>
								<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
								</div>
								<?php
							}else{
								if($Tipo=='Botonera'){
									$sql="SELECT * FROM Botonera where Id = ".$Id." ";    
									$query = mysqli_query($con, $sql);
									$row=mysqli_fetch_array($query);
									?> 	
									<div class="col-sm-2">
										<button type="button" class="btn btn-default  btn-block" onclick="AgregarBotonera(<?php echo $Id;?>)"><i class="fas fa-plus"></i>Agregar</button>
									</div>
									<br>
									<br>					
									<?php
									$sql="SELECT Imagen,Id FROM BotoneraD where Botonera = ".$Id." order by Orden";    
									$query = mysqli_query($con, $sql);
									while ($row=mysqli_fetch_array($query)){
										$Cid= $row['Id'];
										$Imagen= $row['Imagen'];
										?>
										<div class="col-md-2">
											<div class="card border-dark">
												<div class="card-body">
													<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
													<div class="form-group row">
														<div class="col-md-4">
															<button type="button" class="btn btn-outline-danger " onclick="EliminarObjeto(<?php echo $Cid;?>,'BotoneraD');ConfigurarObjeto(<?php echo $Id;?>,'Botonera')" ><i class="fas fa-trash-alt"></i></button>   
														</div>
														<div class="col-md-8">
															<button type="button" class="btn btn-outline-secondary btn-block " onclick="ConfigurarObjeto(<?php echo $Cid;?>,'BotoneraD')">Editar</button>
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
											<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Botonera" > 
										</div>
									</div>
									<div id="resultados_Objeto"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#Trae_Objeto').html('');$('#ConfiguracionObjeto').modal('hide');">Cerrar</button>
									</div>
									<?php
								}else{
									if($Tipo=='BotoneraD'){
										$sql="SELECT * FROM BotoneraD where Id = ".$Id." ";    
										$query = mysqli_query($con, $sql);
										$row=mysqli_fetch_array($query);
										$Imagen = $row['Imagen'];
										$TipoEnlace = $row['TipoEnlace'];
										$Enlace = $row['Enlace'];
										$BColor = $row['BColor'];
										$RBorder = $row['RBorder'];
										$BGrosor = $row['BGrosor'];
										$Descripcion = $row['Descripcion'];
										$Botonera = $row['Botonera'];
										$RBorderI = $row['RBorderI'];
										$Anio = $row['Anio'];
										?>
										<div class="form-group" id="Div-Imagen">
											<label for="Nombre" class="col-sm-4 control-label">Imagen</label>
											<div class="col-sm-8">
												<input type="file" class="form-control-file" id="Imagen" name="Imagen" data-max-size="10240" accept="image/x-png,image/jpg,image/jpeg">
												<br>
											</div>	
										</div> 
										<div class="row"> 
											<div class="col-md-2 col-md-offset-2 ">
												<img src='Imagenes/<?php echo $Imagen; ?>' class='img-thumbnail'  alt="Imagen" />
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label for="Nombre" class="col-sm-4 control-label">Descripcion</label>
													<div class="col-sm-8">
														<input type="Text" class="form-control" id="Descripcion" name="Descripcion" Value="<?php echo $Descripcion;?>" placeholder="Descripcion" autocomplete="off" > 
													</div>
												</div>
												<div class="form-group" id="Div-Fondo">
													<label for="Nombre" class="col-sm-4 control-label">Color del Borde</label>
													<div class="col-sm-8">
														<input type="Color" class="form-control" id="BColor" name="BColor" Value="<?php echo $BColor;?>"  autocomplete="off">
													</div>
												</div>
												<div class="form-group ">
													<label  class="col-sm-4 control-label">Tamano del Borde </label>
													<div class="col-md-8 col-sm-8">
														<select class='form-control' id="BGrosor" name ="BGrosor" placeholder="BGrosor"> 
															<?php 
															for ($i = 0; $i <= 10; $i++) {
																if($i == $BGrosor){
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
													<label  class="col-sm-4 control-label">Radio del Borde </label>
													<div class="col-md-8 col-sm-8">
														<select class='form-control' id="RBorder" name ="RBorder" placeholder="RBorder"> 
															<?php 
															for ($i = 0; $i <= 50; $i=$i+10) {
																if($i == $RBorder){
																	echo '<option value="'.$i.'" selected>'.$i.'%</option>';
																}else{
																	echo '<option value="'.$i.'">'.$i.'%</option>';
																}
															}
															?>
														</select>
													</div>
												</div> 
												<div class="form-group ">
													<label  class="col-sm-4 control-label">Borde de la imagen</label>
													<div class="col-md-8 col-sm-8">
														<select class='form-control' id="RBorderI" name ="RBorderI" placeholder="RBorderI"> 
															<?php 
															for ($i = 0; $i <= 50; $i=$i+10) {
																if($i == $RBorderI){
																	echo '<option value="'.$i.'" selected>'.$i.'%</option>';
																}else{
																	echo '<option value="'.$i.'">'.$i.'%</option>';
																}
															}
															?>
														</select>
													</div>
												</div> 
												<div class="form-group ">
													<label  class="col-sm-4 control-label">Enlace </label>
													<div class="col-md-8 col-sm-8">
														<select class='form-control' id="Enlace" name ="Enlace" placeholder="Enlace" > 
														<?php 
															$sql="SELECT * FROM pagina order by Id ";    
															$query1 = mysqli_query($con, $sql);
															while($row1=mysqli_fetch_array($query1)){
																if($Enlace == $row1['Id']){
																	echo '<option  value="'.$row1['Id'].'" selected>'.$row1['Nombre'].'</option>';
																}else{
																	echo '<option  value="'.$row1['Id'].'" >'.$row1['Nombre'].'</option>';
																}
															}

														?>
														</select>
													</div>
												</div>
												<div class="form-group ">
													<label  class="col-sm-4 control-label">Año</label>
													<div class="col-md-8 col-sm-8">
														<select class='form-control' id="Anio" name ="Anio" placeholder="Anio"> 
															<?php 
															for ($i = 2016; $i <= 3000; $i++) {
																if($i == $Anio){
																	echo '<option value="'.$i.'" selected>'.$i.'</option>';
																}else{
																	echo '<option value="'.$i.'">'.$i.'</option>';
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
											<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="BotoneraD" > 
											</div>
										</div>
										<div id="resultados_Objeto"></div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" onclick="ConfigurarObjeto(<?php echo $Botonera;?>,'Botonera')">Cerrar</button>
										<button type="submit" class="btn btn-primary" id="actualizar_datos3B">Guardar</button>
										</div>
										<?php
									}else{
										if($Tipo=='Boton'){
											
											$sql="SELECT * FROM Boton where Id = ".$Id." ";      
											$query = mysqli_query($con, $sql);
											$row=mysqli_fetch_array($query);
											$Texto = $row['Texto'];
											$Enlace = $row['Enlace'];
											$TipoB = $row['Tipo'];
											$Justificacion = $row['Justificacion'];
											?>
											<div class="form-group">
												<label for="Nombre" class="col-sm-4 control-label">Texto</label>
												<div class="col-sm-8">
												<input type="Text" class="form-control" id="Texto" name="Texto" Value="<?php echo $Texto;?>" placeholder="Titulo" autocomplete="off" required>
												<input type="text" class="form-control hidden" id="Id" name="Id"  value="<?php echo $Id;?>" > 
												<input type="text" class="form-control hidden" id="Tipo" name="Tipo"  value="Boton" > 
												</div>
											</div>	
											<div class="form-group ">
												<label  class="col-sm-4 control-label">Tipo </label>
												<div class="col-md-8 col-sm-8">
													<select class='form-control' id="TipoB" name ="TipoB" placeholder="TipoB" onchange="CambioTipoBoton()"> 
														<?php 
														if($TipoB == 'Pagina'){
															echo '<option value="Pagina">Pagina</option>';
															echo '<option value="Encuesta">Encuesta</option>';
														}else{
																echo '<option value="Encuesta">Encuesta</option>';
																echo '<option value="Pagina">Pagina</option>';
														}
													?>
													</select>
												</div>
											</div>
											<?php
										
											if($TipoB=="Pagina"){
												$Pagina='';
												$Encuesta='hidden';
											}else{
												$Pagina='hidden';
												$Encuesta='';
											}
											?>
											<div class="form-group <?php echo $Pagina;?>" id="Boton_Pagina">
												<label  class="col-sm-4 control-label">Enlace </label>
												<div class="col-md-8 col-sm-8">
													<select class='form-control' id="EnlaceP" name ="EnlaceP" placeholder="Enlace" > 
														<?php 
														$sql="SELECT * FROM pagina order by Id ";    
														$query1 = mysqli_query($con, $sql);
														while($row1=mysqli_fetch_array($query1)){
															if($Enlace == $row1['Id']){
																echo '<option  value="'.$row1['Id'].'" selected>'.$row1['Nombre'].'</option>';
															}else{
																echo '<option  value="'.$row1['Id'].'" >'.$row1['Nombre'].'</option>';
															}
														}
														?>
													</select>
												</div>
											</div>	
											<div class="form-group <?php echo $Encuesta;?>"  id="Boton_Encuesta">
												<label  class="col-sm-4 control-label">Enlace </label>
												<div class="col-md-8 col-sm-8">
													<select class='form-control' id="EnlaceE" name ="EnlaceE" placeholder="Enlace" > 
														<?php 
														$sql="SELECT * FROM encuesta order by Id ";    
														$query1 = mysqli_query($con, $sql);
														while($row1=mysqli_fetch_array($query1)){
															if($Enlace == $row1['Id']){
																echo '<option  value="'.$row1['Id'].'" selected>'.$row1['Nombre'].'</option>';
															}else{
																echo '<option  value="'.$row1['Id'].'" >'.$row1['Nombre'].'</option>';
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
														if($Justificacion == 'text-left'){
															echo '<option value="text-left">Izquierda</option>';
															echo '<option value="text-right">Derecha</option>';
															echo '<option value="text-center">Centrada</option>';
														}else{
																echo '<option value="text-center">Centrada</option>';
																echo '<option value="text-left">Izquierda</option>';
																echo '<option value="text-right">Derecha</option>';
														
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
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
?>
					