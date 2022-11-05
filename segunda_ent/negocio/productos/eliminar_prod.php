<?php
require_once("miapp_productos.php");
$ID = $_GET["ID"];

if (eliminar_prod($ID)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    header('refresh: 0; url=mostrar_prod.php');
}


?>