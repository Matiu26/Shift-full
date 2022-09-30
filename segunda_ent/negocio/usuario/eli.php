<?php
require_once("miapp_user.php");
$ID = $_GET["ID"];

if (eliminar($ID)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    header('refresh: 1; url=eliminar.php');
}


?>



