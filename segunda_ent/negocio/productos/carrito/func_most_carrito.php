<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
session_start();
error_reporting(0);
$sesion_i = $_SESSION['session_username'];
$ID = $_GET["ID"];

$consulta = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $ID  . "'") or die(mysqli_error($con));

while ($filas = mysqli_fetch_array($consulta)) {
    $IDp = $filas['IdProducto'];
    $nom = $filas['Nombre'];
    $sto = $filas['Stock'];
    $tip = $filas['Tipo'];
    $pre = $filas['Precio'];
    $desc = $filas['Descripcion'];
    $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';
}
        $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
        $row = $query->fetch_assoc();
        $id_u= $row["IdUsuario"];

    
       

  
?>