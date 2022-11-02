<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");

session_start();
$ID = $_GET["ID"];
if (eliminar_carrito($ID)  == true) {
    echo '<script language="javascript">alert("Se ha eliminado correctamente");</script>';
    header('refresh: 0; url=carrito.php');
}

?>