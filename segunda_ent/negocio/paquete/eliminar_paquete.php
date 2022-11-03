<?php
require_once("miapp_paquete.php");
$IDpa = $_GET["ID"];

if (eliminar_paquete($IDpa)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    header('refresh: 0; url=lista_paquetes.php');
}


?>



