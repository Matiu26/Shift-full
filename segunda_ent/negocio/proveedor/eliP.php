<?php
require_once("miapp_prov.php");
$ID = $_GET["ID"];

if (eliminar_prov($ID)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    header('refresh: 1; url=eliminar_prov.php');
}


?>



