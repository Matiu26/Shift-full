<?php
require_once("miapp_paquete.php");

session_start();
$ID = $_GET["ID"];
$IDpa= $_SESSION['IDPAQ'];
if (eliminar_de_paquete($ID)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=verPaquete.php?ID=<?php echo $IDpa; ?>">
   
    <?php
}

?>