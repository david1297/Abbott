<?php


$session_id= session_id();
$TipoSession=0;
	if (isset($_GET['Tipo'])){$Tipo=$_GET['Tipo'];}
	if (isset($_GET['TipoSession'])){$TipoSession=$_GET['TipoSession'];}
	if (isset($_GET['Lado'])){$Lado=$_GET['Lado'];}
	if (isset($_GET['IdSession'])){$IdSession=$_GET['IdSession'];}
	if (isset($_GET['IdObjeto'])){$IdObjeto=$_GET['IdObjeto'];}

require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

	if ($TipoSession == '1'){
		$sql="SELECT count(*)as Numero FROM seccion1d where Seccion=".$IdSession." ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden = $row['Numero'];
		$Orden = $Orden + 1;
		if($Tipo == '1'){
			$sql =  "INSERT INTO titulos(Texto,color,Tamaño,TipoGrafia) VALUES ('','',12,'');";
			$query_update = mysqli_query($con,$sql);
    		if ($query_update) {
				$sql="SELECT Max(Id) AS Id FROM titulos";
				$query = mysqli_query($con, $sql);
				$row=mysqli_fetch_array($query);
				$Elemento= $row['Id'];

				$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Titulo',$Elemento,$Orden);";
				$query_update = mysqli_query($con,$sql);
    			if ($query_update) {						
				}
			}	
		}else{
			if($Tipo == '2'){
				$sql =  "INSERT INTO parrafos(Texto,color,Tamaño,TipoGrafia,Justificacion) VALUES ('','',12,'','');";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$sql="SELECT Max(Id) AS Id FROM parrafos";
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Elemento= $row['Id'];
	
					$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Parrafo',$Elemento,$Orden);";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {						
					}
				}	
			}else{
				if($Tipo == '3'){
					$sql =  "INSERT INTO imagenes(Imagen) VALUES ('');";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$sql="SELECT Max(Id) AS Id FROM imagenes";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Elemento= $row['Id'];
		
						$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Imagen',$Elemento,$Orden);";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {						
						}
					}	
				}else{
					if($Tipo == '4'){
						$sql =  "INSERT INTO videos(Video,Autoplay) VALUES ('','');";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$sql="SELECT Max(Id) AS Id FROM videos";
							$query = mysqli_query($con, $sql);
							$row=mysqli_fetch_array($query);
							$Elemento= $row['Id'];
			
							$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Video',$Elemento,$Orden);";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}	
					}else{
						if($Tipo == '5'){
							$sql =  "INSERT INTO Carrusel(Controles) VALUES ('True');";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql="SELECT Max(Id) AS Id FROM Carrusel";
								$query = mysqli_query($con, $sql);
								$row=mysqli_fetch_array($query);
								$Elemento= $row['Id'];
				
								$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Carrusel',$Elemento,$Orden);";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {						
								}
							}	
						}else{
							if($Tipo == '6'){
								$sql =  "INSERT INTO album(Descripcion) VALUES ('');";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$sql="SELECT Max(Id) AS Id FROM album";
									$query = mysqli_query($con, $sql);
									$row=mysqli_fetch_array($query);
									$Elemento= $row['Id'];
									$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Album',$Elemento,$Orden);";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {						
									}
								}	
							}else{
								if($Tipo == '7'){
									$sql =  "INSERT INTO Botonera(Descripcion) VALUES ('');";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql="SELECT Max(Id) AS Id FROM Botonera";
										$query = mysqli_query($con, $sql);
										$row=mysqli_fetch_array($query);
										$Elemento= $row['Id'];
										$sql =  "INSERT INTO seccion1d(Seccion,Tipo,Elemento,Orden) VALUES ($IdSession,'Botonera',$Elemento,$Orden);";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {						
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
	if ($TipoSession == '2'){
		if ($IdObjeto==0){
			$sql="SELECT count(*)as Numero FROM seccion2d where Seccion=".$IdSession." ";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			$Orden = $row['Numero'];
			$Orden = $Orden + 1;
			if($Tipo == '1'){
				$sql =  "INSERT INTO titulos(Texto,color,Tamaño,TipoGrafia) VALUES ('','',12,'');";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$sql="SELECT Max(Id) AS Id FROM titulos";
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Elemento= $row['Id'];
					if ($Lado=='I'){
						$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Titulo',$Elemento,$Orden);";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {						
						}
					}else{
						if ($Lado=='D'){
							$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Titulo',$Elemento,$Orden);";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}
					}
				}	
			}else{
				if($Tipo == '2'){
					$sql =  "INSERT INTO parrafos(Texto,color,Tamaño,TipoGrafia,Justificacion) VALUES ('','',12,'','');";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$sql="SELECT Max(Id) AS Id FROM parrafos";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Elemento= $row['Id'];
						if ($Lado=='I'){
							$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Parrafo',$Elemento,$Orden);";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}else{
							if ($Lado=='D'){
								$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Parrafo',$Elemento,$Orden);";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {						
								}
							}
						}
					}	
				}else{
					if($Tipo == '3'){
						$sql =  "INSERT INTO imagenes(Imagen) VALUES ('');";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$sql="SELECT Max(Id) AS Id FROM imagenes";
							$query = mysqli_query($con, $sql);
							$row=mysqli_fetch_array($query);
							$Elemento= $row['Id'];
							if ($Lado=='I'){
								$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Imagen',$Elemento,$Orden);";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {						
								}
							}else{
								if ($Lado=='D'){
									$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Imagen',$Elemento,$Orden);";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {						
									}
								}
							}
						}	
					}else{
						if($Tipo == '4'){
							$sql =  "INSERT INTO videos(Video,Autoplay) VALUES ('','');";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql="SELECT Max(Id) AS Id FROM videos";
								$query = mysqli_query($con, $sql);
								$row=mysqli_fetch_array($query);
								$Elemento= $row['Id'];
								if ($Lado=='I'){
									$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Video',$Elemento,$Orden);";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {						
									}
								}else{
									if ($Lado=='D'){
										$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Video',$Elemento,$Orden);";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {						
										}
									}
								}
							}	
						}else{
							if($Tipo == '5'){
								$sql =  "INSERT INTO Carrusel(Controles) VALUES ('True');";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$sql="SELECT Max(Id) AS Id FROM Carrusel";
									$query = mysqli_query($con, $sql);
									$row=mysqli_fetch_array($query);
									$Elemento= $row['Id'];
									if ($Lado=='I'){
										$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Carrusel',$Elemento,$Orden);";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {						
										}
									}else{
										if ($Lado=='D'){
											$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Carrusel',$Elemento,$Orden);";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {						
											}
										}
									}
								}	
							}else{
								if($Tipo == '6'){
									$sql =  "INSERT INTO album(Descripcion) VALUES ('');";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql="SELECT Max(Id) AS Id FROM album";
										$query = mysqli_query($con, $sql);
										$row=mysqli_fetch_array($query);
										$Elemento= $row['Id'];
										if ($Lado=='I'){
											$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Album',$Elemento,$Orden);";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {						
											}
										}else{
											if ($Lado=='D'){
												$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Album',$Elemento,$Orden);";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {						
												}
											}
										}
									}	
								}else{
									if($Tipo == '7'){
										$sql =  "INSERT INTO botonera(Descripcion) VALUES ('');";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$sql="SELECT Max(Id) AS Id FROM botonera";
											$query = mysqli_query($con, $sql);
											$row=mysqli_fetch_array($query);
											$Elemento= $row['Id'];
											if ($Lado=='I'){
												$sql =  "INSERT INTO seccion2d(Seccion,Tipo1,Elemento1,Orden) VALUES ($IdSession,'Botonera',$Elemento,$Orden);";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {						
												}
											}else{
												if ($Lado=='D'){
													$sql =  "INSERT INTO seccion2d(Seccion,Tipo2,Elemento2,Orden) VALUES ($IdSession,'Botonera',$Elemento,$Orden);";
													$query_update = mysqli_query($con,$sql);
													if ($query_update) {						
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
		}else{
			if($Tipo == '1'){
				$sql =  "INSERT INTO titulos(Texto,color,Tamaño,TipoGrafia) VALUES ('','',12,'');";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$sql="SELECT Max(Id) AS Id FROM titulos";
					$query = mysqli_query($con, $sql);
					$row=mysqli_fetch_array($query);
					$Elemento= $row['Id'];
					if ($Lado=='I'){
						$sql =  "UPDATE seccion2d SET Tipo1 ='Titulo' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {						
						}
					}else{
						if ($Lado=='D'){
							$sql =  "UPDATE seccion2d SET Tipo2 ='Titulo' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}
					}
				}	
			}else{
				if($Tipo == '2'){
					$sql =  "INSERT INTO parrafos(Texto,color,Tamaño,TipoGrafia,Justificacion) VALUES ('','',12,'','');";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$sql="SELECT Max(Id) AS Id FROM parrafos";
						$query = mysqli_query($con, $sql);
						$row=mysqli_fetch_array($query);
						$Elemento= $row['Id'];
						if ($Lado=='I'){
							$sql =  "UPDATE seccion2d SET Tipo1 ='Parrafo' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {						
							}
						}else{
							if ($Lado=='D'){
								$sql =  "UPDATE seccion2d SET Tipo2 ='Parrafo' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {						
								}
							}
						}
					}	
				}else{
					if($Tipo == '3'){
						$sql =  "INSERT INTO imagenes(Imagen) VALUES ('');";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$sql="SELECT Max(Id) AS Id FROM imagenes";
							$query = mysqli_query($con, $sql);
							$row=mysqli_fetch_array($query);
							$Elemento= $row['Id'];
							if ($Lado=='I'){
								$sql =  "UPDATE seccion2d SET Tipo1 ='Imagen' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {						
								}
							}else{
								if ($Lado=='D'){
									$sql =  "UPDATE seccion2d SET Tipo2 ='Imagen' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {						
									}
								}
							}
						}	
					}else{
						if($Tipo == '4'){
							$sql =  "INSERT INTO videos(Video,Autoplay) VALUES ('','');";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql="SELECT Max(Id) AS Id FROM videos";
								$query = mysqli_query($con, $sql);
								$row=mysqli_fetch_array($query);
								$Elemento= $row['Id'];
								if ($Lado=='I'){
									$sql =  "UPDATE seccion2d SET Tipo1 ='Video' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {						
									}
								}else{
									if ($Lado=='D'){
										$sql =  "UPDATE seccion2d SET Tipo2 ='Video' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {						
										}
									}
								}
							}	
						}else{
							if($Tipo == '5'){
								$sql =  "INSERT INTO Carrusel(Controles) VALUES ('True');";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$sql="SELECT Max(Id) AS Id FROM Carrusel";
									$query = mysqli_query($con, $sql);
									$row=mysqli_fetch_array($query);
									$Elemento= $row['Id'];
									if ($Lado=='I'){
										$sql =  "UPDATE seccion2d SET Tipo1 ='Carrusel' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {						
										}
									}else{
										if ($Lado=='D'){
											$sql =  "UPDATE seccion2d SET Tipo2 ='Carrusel' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {						
											}
										}
									}
								}	
							}else{
								if($Tipo == '6'){
									$sql =  "INSERT INTO Album(Descripcion) VALUES ('');";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql="SELECT Max(Id) AS Id FROM Album";
										$query = mysqli_query($con, $sql);
										$row=mysqli_fetch_array($query);
										$Elemento= $row['Id'];
										if ($Lado=='I'){
											$sql =  "UPDATE seccion2d SET Tipo1 ='Album' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {						
											}
										}else{
											if ($Lado=='D'){
												$sql =  "UPDATE seccion2d SET Tipo2 ='Album' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {						
												}
											}
										}
									}	
								}else{
									if($Tipo == '7'){
										$sql =  "INSERT INTO Botonera(Descripcion) VALUES ('');";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$sql="SELECT Max(Id) AS Id FROM Botonera";
											$query = mysqli_query($con, $sql);
											$row=mysqli_fetch_array($query);
											$Elemento= $row['Id'];
											if ($Lado=='I'){
												$sql =  "UPDATE seccion2d SET Tipo1 ='Botonera' ,Elemento1=$Elemento WHERE ID= $IdObjeto;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {						
												}
											}else{
												if ($Lado=='D'){
													$sql =  "UPDATE seccion2d SET Tipo2 ='Botonera' ,Elemento2=$Elemento WHERE ID= $IdObjeto;";
													$query_update = mysqli_query($con,$sql);
													if ($query_update) {						
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
		}
	}
	if (isset($_GET['Tipo1'])){
		$IdCarrusel=$_GET['IdCarrusel'];
		$sql="SELECT Max(Orden) AS Orden FROM carruseld where Carrusel = ".$IdCarrusel."; ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden= $row['Orden'];
		$Orden=$Orden+1;
		$sql =  "INSERT INTO carruseld (Carrusel, Orden, TTamaño,PTamaño) VALUES ($IdCarrusel, $Orden, '12', '12');";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$sql="SELECT Max(Id) AS Id FROM carruseld";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			echo $row['Id'];		
		}
	}
	if (isset($_GET['Tipo2'])){
		$Album=$_GET['Album'];
		$sql="SELECT Max(Orden) AS Orden FROM AlbumD where Album = ".$Album."; ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden= $row['Orden'];
		$Orden=$Orden+1;
		$sql =  "INSERT INTO AlbumD (Album, Orden) VALUES ($Album, $Orden);";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$sql="SELECT Max(Id) AS Id FROM AlbumD";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			echo $row['Id'];		
		}
	}
	if (isset($_GET['Tipo3'])){
		$Botonera=$_GET['Botonera'];
		$sql="SELECT Max(Orden) AS Orden FROM BotoneraD where Botonera = ".$Botonera."; ";
		$query = mysqli_query($con, $sql);
		$row=mysqli_fetch_array($query);
		$Orden= $row['Orden'];
		$Orden=$Orden+1;
		$sql =  "INSERT INTO BotoneraD (Botonera, Orden,BGrosor,RBorder) VALUES ($Botonera, $Orden,1,0);";
		$query_update = mysqli_query($con,$sql);
		if ($query_update) {
			$sql="SELECT Max(Id) AS Id FROM BotoneraD";
			$query = mysqli_query($con, $sql);
			$row=mysqli_fetch_array($query);
			echo $row['Id'];		
		}
	}
	




?>