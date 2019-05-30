<?php
	$session_id= session_id();
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	$Id = $_GET["Id"];

	$sql="SELECT Tipo,Seccion FROM paginad where Pagina = $Id order by ORden";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
		if ($row['Tipo'] =='1'){
			$IDs=$row['Seccion'];
			$sql="SELECT Descripcion,Id FROM seccion1 where Id =$IDs ";
			$query1 = mysqli_query($con, $sql);
			$row1=mysqli_fetch_array($query1);
				$Session = $row1['Id'];
			?>
			<br>
			<div class="card border-secondary mb-12" id='Tipo1-<?php echo $IDs;?>' >
				<div class="card-header">
					<div class="btn-group pull-left">
						<h4><?php echo $row1['Descripcion']; ?></h4>
					</div>
					<div class="btn-group pull-right">	
						<button type="button" class="btn btn-default" id="Arriba" onclick="MoverSession(<?php echo $Session;?>,'Arriba',1)">
							<i class="fas fa-chevron-up"></i>
						</button>	
						<button type="button" class="btn btn-default" id="Abajo" onclick="MoverSession(<?php echo $Session;?>,'Abajo',1)">
							<i class="fas fa-chevron-down"></i>
						</button>		
						<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarSession(<?php echo $Session;?>,1)" >
							<span class="fas fa-cogs"></span>
						</button>
					</div>
				</div>
				<div class="card-body text-secondary">
					<div class="form-group row">
						<div class="col-md-12">
							<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(1,'I',<?php echo $Session;?>,0)">
								<i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
					<?php
					
					$sql1="SELECT Tipo,Elemento,Id FROM seccion1d where Seccion = $Session order by Orden";
					$query1 = mysqli_query($con, $sql1);
					while ($row1=mysqli_fetch_array($query1)){
						$Objeto=$row1['Elemento'];
						$SessionD=$row1['Id'];
						if ($row1['Tipo'] =='Titulo'){
							?>
							<div class="form-group row">
								<div class="col-md-10">
									<button type="button" class="btn btn-outline-dark btn-block" onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
								</div>
								<div class="col-md-2">
									<div class="btn-group pull-right">
										<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
											<i class="fas fa-chevron-up"></i>
										</button>	
										<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
											<i class="fas fa-chevron-down"></i>
										</button>
										<button type="button" class="btn btn-outline-danger  " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Titulo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
									</div>
								</div>
							</div>
							<?php
						}else{
							if ($row1['Tipo'] =='Parrafo'){
								?>
								<div class="form-group row">
									<div class="col-md-10">
										<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
									</div>
									<div class="col-md-2">
										<div class="btn-group pull-right">
											<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
												<i class="fas fa-chevron-up"></i>
											</button>	
											<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
												<i class="fas fa-chevron-down"></i>
											</button>
											<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Parrafo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
										</div>
									</div>
								</div>
								<?php
							}else{
								if ($row1['Tipo'] =='Imagen'){
									?>
									<div class="form-group row">
										<div class="col-md-10">
											<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
										</div>
										<div class="col-md-2">
											<div class="btn-group pull-right">
												<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
													<i class="fas fa-chevron-up"></i>
												</button>	
												<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
													<i class="fas fa-chevron-down"></i>
												</button>
												<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Imagen',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
											</div>
										</div>
									</div>
									<?php
								}else{
									if ($row1['Tipo'] =='Video'){
										?>
										<div class="form-group row">
											<div class="col-md-10">
												<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
											</div>
											<div class="col-md-2">
												<div class="btn-group pull-right">
													<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
														<i class="fas fa-chevron-up"></i>
													</button>	
													<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
														<i class="fas fa-chevron-down"></i>
													</button>
													<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Video',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
												</div>
											</div>
										</div>
										<?php
									}else{
										if ($row1['Tipo'] =='Carrusel'){
											?>
											<div class="form-group row">
												<div class="col-md-10">
													<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
												</div>
												<div class="col-md-2">
													<div class="btn-group pull-right">
														<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
															<i class="fas fa-chevron-up"></i>
														</button>	
														<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
															<i class="fas fa-chevron-down"></i>
														</button>
														<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Carrusel',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
													</div>
												</div>
											</div>
											<?php
										}else{
											if ($row1['Tipo'] =='Album'){
												?>
												<div class="form-group row">
													<div class="col-md-10">
														<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Album')"><i class="fas fa-book"></i> Album</button>
													</div>
													<div class="col-md-2">
														<div class="btn-group pull-right">
															<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
																<i class="fas fa-chevron-up"></i>
															</button>	
															<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
																<i class="fas fa-chevron-down"></i>
															</button>
															<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Album',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
														</div>
													</div>
												</div>
												<?php
											}else{
												if ($row1['Tipo'] =='Botonera'){
													?>
													<div class="form-group row">
														<div class="col-md-10">
															<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Botonera')"><i class="fas fa-fighter-jet"></i> Botonera</button>
														</div>
														<div class="col-md-2">
															<div class="btn-group pull-right">
																<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Arriba',<?php echo $Session;?>)">
																	<i class="fas fa-chevron-up"></i>
																</button>	
																<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(1,<?php echo $SessionD;?>,'Abajo',<?php echo $Session;?>)">
																	<i class="fas fa-chevron-down"></i>
																</button>
																<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(1,'I',<?php echo $SessionD;?>,'Botonera',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
															</div>
														</div>
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
					?>
					
					
				</div>
			</div>
			<br>	
			<?php
			
		}else{
			if ($row['Tipo'] =='2'){
				$IDs=$row['Seccion'];
				$sql="SELECT Descripcion,Id FROM seccion2 where Id = $IDs ";
				$query1 = mysqli_query($con, $sql);
				$row1=mysqli_fetch_array($query1);
				$Session = $row1['Id'];
				?>
				<br>
				<div class="card border-secondary mb-12" id='Tipo2-<?php echo $IDs;?>'>
					<div class="card-header">
						<div class="btn-group pull-left">
							<h4><?php echo $row1['Descripcion']; ?></h4>
						</div>
						<div class="btn-group pull-right">	
						<button type="button" class="btn btn-default" id="Arriba" onclick="MoverSession(<?php echo $Session;?>,'Arriba',2)">
							<i class="fas fa-chevron-up"></i>
						</button>	
						<button type="button" class="btn btn-default" id="Abajo" onclick="MoverSession(<?php echo $Session;?>,'Abajo',2)">
							<i class="fas fa-chevron-down"></i>
						</button>
						<button type="button" class="btn btn-default" id="Configurarcion" onclick="ConfigurarSession(<?php echo $Session;?>,2)">
							<span class="fas fa-cogs"></span>
						</button>
						</div>
					</div>
					<div class="card-body text-secondary">
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-12">
									<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'I',<?php echo $Session;?>,0)">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<div class="col-md-12">
									<button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'D',<?php echo $Session;?>,0)">
										<i class="fas fa-plus"></i>
									</button>
								</div>	
							</div>		
						</div>
						<?php
					$sql1="SELECT Tipo1,Elemento1,Tipo2,Elemento2,Id FROM seccion2d where Seccion = $Session order by Orden";
					$query1 = mysqli_query($con, $sql1);
					while ($row1=mysqli_fetch_array($query1)){	
						$Linea= $row1['Id'];
						$Objeto=$row1['Elemento1'];
						if ($row1['Tipo1'] =='Titulo'){
							?>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-11">
										<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
									</div>
									<div class="col-md-1">
										<div class="btn-group pull-right">
											
											<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Titulo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
										</div>
									</div>
								</div>
							</div>
							<?php
						}else{
							if ($row1['Tipo1'] =='Parrafo'){
								?>
								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-11">
											<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
										</div>
										<div class="col-md-1">
											<div class="btn-group pull-right">
												<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Parrafo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
											</div>
										</div>
									</div>
								</div>
								<?php
							}else{
								if ($row1['Tipo1'] =='Imagen'){
									?>
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-11">
												<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
											</div>
											<div class="col-md-1">
												<div class="btn-group pull-right">
													<button type="button" class="btn btn-outline-danger btn-block" onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Imagen',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
												</div>
											</div>
										</div>
									</div>
									<?php
								}else{
									if ($row1['Tipo1'] =='Video'){
										?>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-md-11">
													<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
												</div>
												<div class="col-md-1">
													<div class="btn-group pull-right">
														
														<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Video',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
													</div>
												</div>
											</div>
										</div>
										<?php
									}else{
										if ($row1['Tipo1'] =='Carrusel'){
											?>
											<div class="col-md-6">
												<div class="form-group row">
													<div class="col-md-11">
														<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
													</div>
													<div class="col-md-1">
														<div class="btn-group pull-right">
															
															<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Carrusel',<?php echo $Objeto;?>)"><i class="fas fa-trash-alt"></i></button>
														</div>
													</div>
												</div>
											</div>
											<?php
										}else{
											if ($row1['Tipo1'] =='Album'){
												?>
												<div class="col-md-6">
													<div class="form-group row">
														<div class="col-md-11">
															<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Album')"><i class="fas fa-book"></i> Album</button>
														</div>
														<div class="col-md-1">
															<div class="btn-group pull-right">
																
																<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Album',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
															</div>
														</div>
													</div>
												</div>
												<?php
											}else{
												if ($row1['Tipo1'] =='Botonera'){
													?>
													<div class="col-md-6">
														<div class="form-group row">
															<div class="col-md-11">
																<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Botonera')"><i class="fas fa-fighter-jet"></i> Botonera</button>
															</div>
															<div class="col-md-1">
																<div class="btn-group pull-right">
																	
																	<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'I',<?php echo $Linea;?>,'Botonera',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
																</div>
															</div>
														</div>
													</div>
													<?php
												}else{
													?>
													<div class="col-md-6">
														<div class="form-group row">
															<div class="col-md-12">
																<button type="button" class="btn btn-default  btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'I',<?php echo $Session;?>,<?php echo $Linea;?>)"><i class="fas fa-plus" ></i></button>
															</div>
														</div>
													</div>
													<?php
												}
											}
										}
									}
								}
							}
						}
						$Objeto=$row1['Elemento2'];
						if ($row1['Tipo2'] =='Titulo'){
							?>
							<div class="col-md-6">
								<div class="form-group row">
									<div class="col-md-9">
										<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Titulo')"><i class="fas fa-text-height"></i>	 Titulo</button>
									</div>
									<div class="col-md-3">
										<div class="btn-group pull-right">
											<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
												<i class="fas fa-chevron-up"></i>
											</button>	
											<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
												<i class="fas fa-chevron-down"></i>
											</button>
											<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Titulo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
										</div>
									</div>
								</div>
							</div>
							<?php
						}else{
							if ($row1['Tipo2'] =='Parrafo'){
								?>
								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-9">
											<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Parrafo')"><i class="fas fa-stream"></i>	 Parrafo</button>
										</div>
										<div class="col-md-3">
											<div class="btn-group pull-right">
												<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
													<i class="fas fa-chevron-up"></i>
												</button>	
												<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
													<i class="fas fa-chevron-down"></i>
												</button>
												<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Parrafo',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
											</div>
										</div>
									</div>
								</div>
								<?php
							}else{
								if ($row1['Tipo2'] =='Imagen'){
									?>
									<div class="col-md-6">
										<div class="form-group row">
											<div class="col-md-9">
												<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Imagen')"><i class="fas fa-image"></i> Imagen</button>
											</div>
											<div class="col-md-3">
												<div class="btn-group pull-right">
													<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
														<i class="fas fa-chevron-up"></i>
													</button>	
													<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
														<i class="fas fa-chevron-down"></i>
													</button>
													<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Imagen',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
												</div>
											</div>
										</div>
									</div>
									<?php
								}else{
									if ($row1['Tipo2'] =='Video'){
										?>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-md-9">
													<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Video')"><i class="fas fa-video"></i> Video</button>
												</div>
												<div class="col-md-3">
													<div class="btn-group pull-right">
														<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
															<i class="fas fa-chevron-up"></i>
														</button>	
														<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
															<i class="fas fa-chevron-down"></i>
														</button>
														<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Video',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
													</div>
												</div>
											</div>
										</div>
										<?php
									}else{
										if ($row1['Tipo2'] =='Carrusel'){
											?>
											<div class="col-md-6">
												<div class="form-group row">
													<div class="col-md-9">
														<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Carrusel')"><i class="fas fa-images"></i> Carrusel</button>
													</div>
													<div class="col-md-3">
														<div class="btn-group pull-right">
															<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
																<i class="fas fa-chevron-up"></i>
															</button>	
															<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
																<i class="fas fa-chevron-down"></i>
															</button>
															<button type="button" class="btn btn-outline-danger " onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Carrusel',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
														</div>
													</div>
												</div>
											</div>
											<?php
										}else{
											if ($row1['Tipo2'] =='Album'){
												?>
												<div class="col-md-6">
													<div class="form-group row">
														<div class="col-md-9">
															<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Album')"><i class="fas fa-book"></i> Album</button>
														</div>
														<div class="col-md-3">
															<div class="btn-group pull-right">
																<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
																	<i class="fas fa-chevron-up"></i>
																</button>	
																<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
																	<i class="fas fa-chevron-down"></i>
																</button>
																<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Album',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
															</div>
														</div>
													</div>
												</div>
												<?php
											}else{
												if ($row1['Tipo2'] =='Botonera'){
													?>
													<div class="col-md-6">
														<div class="form-group row">
															<div class="col-md-9">
																<button type="button" class="btn btn-outline-dark btn-block"onclick="ConfigurarObjeto(<?php echo $Objeto;?>,'Botonera')"><i class="fas fa-fighter-jet"></i> Botonera</button>
															</div>
															<div class="col-md-3">
																<div class="btn-group pull-right">
																	<button type="button" class="btn btn-outline-secondary " id="Arriba" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Arriba',<?php echo $Session;?>)">
																		<i class="fas fa-chevron-up"></i>
																	</button>	
																	<button type="button" class="btn btn-outline-secondary " id="Abajo" onclick="MoverSessionD(2,<?php echo $Linea;?>,'Abajo',<?php echo $Session;?>)">
																		<i class="fas fa-chevron-down"></i>
																	</button>
																	<button type="button" class="btn btn-outline-danger" onclick="Eliminar_SessionD(2,'D',<?php echo $Linea;?>,'Botonera',<?php echo $Objeto;?>,<?php echo $Session;?>)"><i class="fas fa-trash-alt"></i></button>
																</div>
															</div>
														</div>
													</div>
													<?php
												}else{
													?>
													<div class="col-md-6">
														<div class="form-group row">
															<div class="col-md-12">
																<button type="button" class="btn btn-default  btn-block" data-toggle="modal" data-target="#AgregarObjeto" onclick="TipoCSession(2,'D',<?php echo $Session;?>,<?php echo $Linea;?>)"><i class="fas fa-plus" ></i></button>
															</div>	
														</div>
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
					?>

					</div>
				</div>
				<br>	
				<?php
				
			}
		}
	}
	
	?>
