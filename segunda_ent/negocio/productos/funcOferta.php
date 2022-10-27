<?php

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
if (isset($_POST['agr'])) {
    $descuento = $_POST['desc'];

    if ( isset($_POST['desc'])) {

        if (empty($_POST['desc'])) {

            return;
        }


    
            if (agregar_desc($ID,$descuento)  == true) {
                echo '<script language="javascript">alert("Se ha agregado el descuento");</script>';
                header('refresh: 0; url=agregar_oferta.php');
            }
        

        else {
            echo '<script language="javascript">alert("Error al agregar el descuento");</script>';
            header('refresh: 0;');
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