<?php
require_once("miapp_paquete.php");
// error_reporting(0);
session_start();
$sesion_i = $_SESSION['session_username'];
$IDpa = $_GET["ID"];
$IDp = $_GET["IDpr"];

if ($sesion_i == null ||  $sesion_i = "") {
    echo '<script language="javascript">alert("Necesitas iniciar sesion para agregar Paquetes");</script>';
    header('refresh: 0; url=../productos/pags/index.php');
}
     else{


        if (existe_en_paquete($IDpa,$IDp) == true) {
            echo '<script language="javascript">alert("Este producto ya existe en este paquete");</script>';
            ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=lista_prod.php?ID=<?php echo $IDpa; ?>">
           
            <?php
            die;
        } else {

            if (agregarApaq($IDpa,$IDp)  == true) {
                echo '<script language="javascript">alert("Se ha agregado correctamente");</script>';
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=lista_prod.php?ID=<?php echo $IDpa; ?>">
               
                <?php
            }
            
        }
    
    }


  
?>