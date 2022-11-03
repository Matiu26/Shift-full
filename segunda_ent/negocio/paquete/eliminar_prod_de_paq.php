<?php
require_once("miapp_paquete.php");

session_start();
$IDpa = $_GET["ID"];
$IDp = $_GET["IDpr"];
if (eliminar_de_paquete($IDp)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=verPaquete.php?ID=<?php echo $IDpa; ?>">
   
    <?php
}

?>