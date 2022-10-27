<?php
require_once("miapp_productos.php");
$ID = $_GET["ID"];
$consulta = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $ID . "'") or die(mysqli_error($con));

while ($filas = mysqli_fetch_array($consulta)) {
    $IDp = $filas['IdProducto'];
    $nom = $filas['Nombre'];
    $sto = $filas['Stock'];
    $tip = $filas['Tipo'];
    $descu = $filas['Descuento'];
    $pre = $filas['Precio']- (($filas['Precio'] * $descu)/ 100);
    $desc = $filas['Descripcion'];
    $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';

  
}

?>