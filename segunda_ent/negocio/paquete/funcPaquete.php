<?php
require_once("miapp_paquete.php");
$ID = $_GET["ID"];
$c = mysqli_query($con, "SELECT * FROM VIEW_PAQUETES_CON_IMAGEN WHERE id='" . $ID . "' limit 8") or die(mysqli_error($con));

while ($filas = mysqli_fetch_array($c)) {
    $IDpa = $filas['id'];
    $nom = $filas['Nombre'];
    $pre = $filas['Precio'];
    $desc = $filas['descripcion'];
    $foto= '<img  src="'.$filas["Imagen"].'" width="180"  alt="" srcset="">';
}
    ?>
