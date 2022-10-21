<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
session_start();
// error_reporting(0);
$sesion_i = $_SESSION['session_username'];

$query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
$row = $query->fetch_assoc();
$id_u= $row["IdUsuario"];
 21;

$q = mysqli_query($con, "SELECT producto.IdProducto , producto.Nombre, producto.Descripcion, producto.precio  FROM producto 
INNER JOIN carrito ON producto.IdProducto = carrito.IdProducto
WHERE carrito.IdUsuario='" . $id_u  . "'") or die(mysqli_error($con));
$row = $q->fetch_assoc();
$id_p= $row["IdProducto"];
$consulta = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $id_p  . "'") or die(mysqli_error($con));

while ($filas = mysqli_fetch_array($consulta)) {
    $IDp = $filas['IdProducto'];
    $nom = $filas['Nombre'];
    $sto = $filas['Stock'];
    $tip = $filas['Tipo'];
    $pre = $filas['Precio'];
    $desc = $filas['Descripcion'];
    $foto= '<img  src="'."../".$filas["Foto"].'"    width="70"  alt="" srcset="">';
    
}
       
    //  echo $id_p
       

  
?>