<?php
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
if (isset($_GET['Id'])){
	$Numero=intval($_GET['Id']);	
	$delete="DELETE FROM administraciond WHERE Id=".$Numero."; ";
	$query_update = mysqli_query($con,$delete);
	if ($query_update) {
		$messages[] = "Los Datos Se Han Modificado Con Exito.";
	} else {
		$errors[] = "Lo sentimos , No se Puede Eliminar El Banco.<br>";
	}
}

if (!isset($errors)){
?>
<table class="table">
<tr>
	<th class='text-center'>Texto</th>
	<th class='text-center'>Tipo</th>
	<th class='text-center'>Enlace</th>
    <th class='text-center'>Seccion</th>
    <th></th>
    <th></th>
    <th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from administraciond ");
	while ($row=mysqli_fetch_array($sql)){
        $Numero=$row["Id"];
        $Texto=$row["Texto"];
        $Enlace=$row['Enlace'];
        $Tipo=$row['Tipo'];
        $Seccion=$row['Seccion'];
        ?>
        <tr>
            <td class='text-center'>
                <input type="text" class="form-control" id="Texto<?php echo $Numero;?>" name="Texto<?php echo $Numero;?>"  placeholder="Texto" value="<?php echo $Texto;?>">
            </td>
            <td class='text-center'>
			    <div class="form-group ">							
                    <div class="col-md-12">
                        <select class='form-control' id="Tipo<?php echo $Numero;?>" name ="Tipo<?php echo $Numero;?>" placeholder="Tipo" onchange="CambioTipoBoton('Tipo<?php echo $Numero;?>',<?php echo $Numero;?>)"> 
                        <?php 
                            if($Tipo == 'Pagina'){
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
			</td>
            <?php					
            if($Tipo=="Pagina"){
                $Pagina='';
                $Encuesta='hidden';
            }else{
                $Pagina='hidden';
                $Encuesta='';
            }
            ?>
            <td class='text-center <?php echo $Pagina;?>'  id="SelectP<?php echo $Numero;?>">
			    <div class="form-group ">							
                    <div class="col-md-12">
                        <select class='form-control' id="EnlaceP<?php echo $Numero;?>" name ="EnlaceP<?php echo $Numero;?>" placeholder="Enlace" onchange="CambioEnlaceP(<?php echo $Numero;?>)" > 
                            <?php 
                            $sql1="SELECT * FROM pagina order by Id ";    
                            $query1 = mysqli_query($con, $sql1);
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
			</td>
            <td class='text-center <?php echo $Encuesta;?>' id="SelectE<?php echo $Numero;?>">
			    <div class="form-group ">							
                    <div class="col-md-12">
                        <select class='form-control' id="EnlaceE<?php echo $Numero;?>" name ="EnlaceE<?php echo $Numero;?>" placeholder="Enlace"  > 
                        <?php 
                            $sql1="SELECT * FROM encuesta order by Id ";    
                            $query1 = mysqli_query($con, $sql1);
                            while($row1=mysqli_fetch_array($query1)){
                                if($Seccion == $row1['Id']){
                                    echo '<option  value="'.$row1['Id'].'" selected>'.$row1['Nombre'].'</option>';
                                }else{
                                    echo '<option  value="'.$row1['Id'].'" >'.$row1['Nombre'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
			</td>	
            <td class='text-center'>
			    <div class="form-group ">							
                    <div class="col-md-12">
                        <select class='form-control' id="Seccion<?php echo $Numero;?>" name ="Seccion<?php echo $Numero;?>" placeholder="Enlace" > 
                            
                            <?php 
                            $sql1="SELECT Tipo,Seccion,if(paginad.Tipo=1,Seccion1.Descripcion,Seccion2.Descripcion) Descripcion FROM paginad
                            left join Seccion1 on Seccion1.id = paginad.Seccion and paginad.Tipo=1
                            left join Seccion2 on Seccion2.id = paginad.Seccion and paginad.Tipo=2 where paginad.pagina = $Enlace order by paginad.orden";    
                            $query1 = mysqli_query($con, $sql1);
                            while($row1=mysqli_fetch_array($query1)){
                                if($Seccion == $row1['Tipo'].'-'.$row1['Seccion']){
                                    echo '<option  value="'.$row1['Tipo'].'-'.$row1['Seccion'].'" selected>'.$row1['Descripcion'].'</option>';
                                }else{
                                    echo '<option  value="'.$row1['Tipo'].'-'.$row1['Seccion'].'" >'.$row1['Descripcion'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
			</td>	
            <td>
                <span id="loader_B<?php echo $Numero;?>"></span>
            </td>
			<?PHP
		    	ECHO' 
                <td class="text-center">
                    <button type="button" class="btn btn-default"  onclick="ActualizarBoton('.$Numero.')">
                        <i class="fas fa-save"></i>
                    </button>
                </td>
                ';
                ECHO' 
                <td class="text-center">
                    <button type="button" class="btn btn-default"  onclick="EliminarBoton('.$Numero.')">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </td>
				';
			?>
		</tr>		
		<?php
	}
echo '</table>'	;
}else{
	echo 'Error';
}

?>