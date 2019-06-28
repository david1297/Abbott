
<?php 
require_once ("../../config/db.php");
require_once ("../../config/conexion.php");
$Enlace = $_GET['Pagina'];
    $sql1="SELECT Tipo,Seccion,if(paginad.Tipo=1,Seccion1.Descripcion,Seccion2.Descripcion) Descripcion FROM paginad
    left join Seccion1 on Seccion1.id = paginad.Seccion and paginad.Tipo=1
    left join Seccion2 on Seccion2.id = paginad.Seccion and paginad.Tipo=2 where paginad.pagina = $Enlace order by paginad.orden";    
    $query1 = mysqli_query($con, $sql1);
    while($row1=mysqli_fetch_array($query1)){
        
            echo '<option  value="'.$row1['Tipo'].'-'.$row1['Seccion'].'" >'.$row1['Descripcion'].'</option>';
    
    }
                            ?>