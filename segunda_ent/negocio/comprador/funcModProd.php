<?php
$mail = null;
$dir = null;
$tel = null;
ob_start();
require_once("../../dato/conexion.php");
require_once("../productos/miapp_productos.php");
$ID = $_GET["ID"];

$consultas = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $sto = $filax['Stock'];
    $pre = $filax['Precio'];
    $desc = $filax['Descripcion'];
}
if (isset($_POST['modificar'])) {

    if ( isset($_POST['sto2'])) {
        $sto2 = $_POST['sto2'];
     
        if (actualizar_prod_comp($sto2,$ID)  == true) {
            echo '<script language="javascript">alert("Se ha modificado correctamente");</script>';
            header('refresh: 0; url=mostrar_prod.php');
        }
    }
}


?>



<head>
    <meta charset="UTF-8">

    <title>Modificar Producto </title>
</head>
</body>

</html>