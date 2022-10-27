<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
session_start();
// error_reporting(0);
$sesion_i = $_SESSION['session_username'];

$query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
$row = $query->fetch_assoc();
$id_u= $row["IdUsuario"];
 

$q = mysqli_query($con, "select pr.IdProducto, pr.Nombre, pr.Precio, pr.Foto , pr.Descuento
from producto pr 
inner join carrito ca
ON pr.IdProducto= ca.IdProducto WHERE ca.IdUsuario ='".$id_u."'") or die(mysqli_error($con));

?>