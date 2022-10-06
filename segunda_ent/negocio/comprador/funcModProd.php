<?php
$mail = null;
$dir = null;
$tel = null;
ob_start();
require_once("../../dato/conexion.php");
require_once("miapp_productos.php");
$ID = $_GET["ID"];

$consultas = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $sto = $filax['Stock'];
    $pre = $filax['Precio'];
    $desc = $filax['Descripcion'];
}
if (isset($_POST['modificar'])) {

    if (isset($_POST['nom2'])  && isset($_POST['sto2'])  && isset($_POST['pre2']) && isset($_POST['desc2'])) {


        if (empty($_POST['nom2']) || empty($_POST['sto2']) || empty($_POST['pre2']) || empty($_POST['desc2'])) {

            return;
        }

        $nom2 = $_POST['nom2'];
        $sto2 = $_POST['sto2'];
        $pre2 = $_POST['pre2'];
        $desc2 = $_POST['desc2'];
        if (actualizar_prod($sto2,$ID)  == true) {
            echo '<script language="javascript">alert("Se ha modificado correctamente");</script>';
            header('refresh: 1; url=mostrar_prod.php');
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