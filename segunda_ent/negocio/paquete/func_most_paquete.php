<?php
require_once("miapp_paquete.php");
session_start();
// error_reporting(0);

$IDpa = $_GET["ID"];
$qu =  mysqli_query($con, "select pr.IdProducto, pr.Nombre, pr.Precio, pr.Foto, pr.Descuento
from producto pr 
inner join genera ge
ON pr.IdProducto= ge.IdProducto where IdPaquete='" . $IDpa . "' ") or die(mysqli_error($con));

?>