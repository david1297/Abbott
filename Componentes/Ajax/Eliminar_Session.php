<?php
$session_id= session_id();
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");

$TipoS = mysqli_real_escape_string($con,(strip_tags($_GET["Tipo"],ENT_QUOTES)));
$Session = mysqli_real_escape_string($con,(strip_tags($_GET["Session"],ENT_QUOTES)));

if($TipoS ==1) {
	$sql="SELECT Tipo,Elemento,Id FROM seccion1d where Seccion = ".$Session." ";    
	$query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($query)){
		$Tipo =$row['Tipo'];
		$Id = $row['Elemento'];
		$Detalle = $row['Id'];
		if($Tipo=='Titulo'){			
			$sql =  "DELETE FROM titulos where Id = $Id;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Eliminado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
		} else{
			if($Tipo=='Parrafo'){
				$sql =  "DELETE FROM parrafos where Id = $Id;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Eliminado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}
			} else{
				if($Tipo=='Imagen'){
					$sql =  "DELETE FROM imagenes where Id = $Id;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Eliminado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
				}else{
					if($Tipo=='Video'){
						$sql =  "DELETE FROM videos  where Id = $Id;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages = "Los Datos Se Han Eliminado Con Exito.";
						} else {
							$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						}
					}else{
						if($Tipo=='Carrusel'){
							$sql =  "DELETE FROM Carrusel  where Id = $Id;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql =  "DELETE FROM Carruseld  where Carrusel = $Id;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						}else{
							if($Tipo=='CarruselD'){
								$sql =  "DELETE FROM Carruseld  where Id = $Id;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							}else{
								if($Tipo=='Album'){
									$sql =  "DELETE FROM Album  where Id = $Id;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql =  "DELETE FROM AlbumD  where Album = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}
								}else{
									if($Tipo=='AlbumD'){
										$sql =  "DELETE FROM AlbumD  where Id = $Id;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									}else{
										if($Tipo=='Album'){
											$sql =  "DELETE FROM Botonera  where Id = $Id;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {
												$sql =  "DELETE FROM Botonerad  where Botonera = $Id;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
												}
											} else {
												$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
											}
										}else{
											if($Tipo=='BotoneraD'){
												$sql =  "DELETE FROM Botonerad  where Id = $Id;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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
		$sql =  "DELETE FROM seccion1d where Id = $Detalle;";
		$query_update = mysqli_query($con,$sql);
	}
	$sql =  "DELETE FROM seccion1 where Id = $Session;";
	$query_update = mysqli_query($con,$sql);
}
if($TipoS ==2) {
	$sql="SELECT Tipo1,Elemento1,Tipo2,Elemento2,Id FROM seccion2d where Seccion = ".$Session." ";    
	$query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($query)){
		$Tipo1 =$row['Tipo1'];
		$Id1 = $row['Elemento1'];
		$Tipo2 =$row['Tipo2'];
		$Id2 = $row['Elemento2'];
		$Detalle = $row['Id'];
		if($Tipo1=='Titulo'){			
			$sql =  "DELETE FROM titulos where Id = $Id1;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Eliminado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
		} else{
			if($Tipo1=='Parrafo'){
				$sql =  "DELETE FROM parrafos where Id = $Id1;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Eliminado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}
			} else{
				if($Tipo1=='Imagen'){
					$sql =  "DELETE FROM imagenes where Id = $Id1;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Eliminado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
				}else{
					if($Tipo1=='Video'){
						$sql =  "DELETE FROM videos  where Id = $Id1;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages = "Los Datos Se Han Eliminado Con Exito.";
						} else {
							$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						}
					}else{
						if($Tipo1=='Carrusel'){
							$sql =  "DELETE FROM Carrusel  where Id = $Id1;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql =  "DELETE FROM Carruseld  where Carrusel = $Id1;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						}else{
							if($Tipo1=='CarruselD'){
								$sql =  "DELETE FROM Carruseld  where Id = $Id1;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							}else{
								if($Tipo1=='Album'){
									$sql =  "DELETE FROM Album  where Id = $Id1;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql =  "DELETE FROM AlbumD  where Album = $Id1;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}
								}else{
									if($Tipo1=='AlbumD'){
										$sql =  "DELETE FROM AlbumD  where Id = $Id1;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									}else{
										if($Tipo1=='Botonera'){
											$sql =  "DELETE FROM Botonera  where Id = $Id1;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {
												$sql =  "DELETE FROM Botonerad  where Botonera = $Id1;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
												}
											} else {
												$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
											}
										}else{
											if($Tipo1=='BotoneraD'){
												$sql =  "DELETE FROM Botonerad  where Id = $Id1;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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
		//*---
		if($Tipo2=='Titulo'){			
			$sql =  "DELETE FROM titulos where Id = $Id2;";
			$query_update = mysqli_query($con,$sql);
			if ($query_update) {
				$messages = "Los Datos Se Han Eliminado Con Exito.";
			} else {
				$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
			}
		} else{
			if($Tipo2=='Parrafo'){
				$sql =  "DELETE FROM parrafos where Id = $Id2;";
				$query_update = mysqli_query($con,$sql);
				if ($query_update) {
					$messages = "Los Datos Se Han Eliminado Con Exito.";
				} else {
					$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
				}
			} else{
				if($Tipo2=='Imagen'){
					$sql =  "DELETE FROM imagenes where Id = $Id2;";
					$query_update = mysqli_query($con,$sql);
					if ($query_update) {
						$messages = "Los Datos Se Han Eliminado Con Exito.";
					} else {
						$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
					}
				}else{
					if($Tipo2=='Video'){
						$sql =  "DELETE FROM videos  where Id = $Id2;";
						$query_update = mysqli_query($con,$sql);
						if ($query_update) {
							$messages = "Los Datos Se Han Eliminado Con Exito.";
						} else {
							$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
						}
					}else{
						if($Tipo2=='Carrusel'){
							$sql =  "DELETE FROM Carrusel  where Id = $Id2;";
							$query_update = mysqli_query($con,$sql);
							if ($query_update) {
								$sql =  "DELETE FROM Carruseld  where Carrusel = $Id2;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							} else {
								$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
							}
						}else{
							if($Tipo2=='CarruselD'){
								$sql =  "DELETE FROM Carruseld  where Id = $Id2;";
								$query_update = mysqli_query($con,$sql);
								if ($query_update) {
									$messages = "Los Datos Se Han Eliminado Con Exito.";
								} else {
									$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
								}
							}else{
								if($Tipo2=='Album'){
									$sql =  "DELETE FROM Album  where Id = $Id2;";
									$query_update = mysqli_query($con,$sql);
									if ($query_update) {
										$sql =  "DELETE FROM AlbumD  where Album = $Id2;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									} else {
										$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
									}
								}else{
									if($Tipo2=='AlbumD'){
										$sql =  "DELETE FROM AlbumD  where Id = $Id2;";
										$query_update = mysqli_query($con,$sql);
										if ($query_update) {
											$messages = "Los Datos Se Han Eliminado Con Exito.";
										} else {
											$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
										}
									}else{
										if($Tipo2=='Botonera'){
											$sql =  "DELETE FROM Botonera  where Id = $Id2;";
											$query_update = mysqli_query($con,$sql);
											if ($query_update) {
												$sql =  "DELETE FROM Botonerad  where Botonera = $Id2;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
												}
											} else {
												$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
											}
										}else{
											if($Tipo2=='BotoneraD'){
												$sql =  "DELETE FROM Botonerad  where Id = $Id2;";
												$query_update = mysqli_query($con,$sql);
												if ($query_update) {
													$messages = "Los Datos Se Han Eliminado Con Exito.";
												} else {
													$errors = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.<br>";
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
		$sql =  "DELETE FROM seccion2d where Id = $Detalle;";
		$query_update = mysqli_query($con,$sql);
	}
	$sql =  "DELETE FROM seccion2 where Id = $Session;";
	$query_update = mysqli_query($con,$sql);
}

$sql =  "DELETE FROM paginad where Seccion = $Session and Tipo = $TipoS;";
$query_update = mysqli_query($con,$sql);





?>



