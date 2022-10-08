<?php
require_once("miapp_user.php");
$ID = $_GET["ID"];

if (eliminar_reg($ID)  == true) {
    echo '<script language="javascript">alert("Se ha rechazado correctamente");</script>';
    header('refresh: 0; url=Aprobar.php');
}


?>



