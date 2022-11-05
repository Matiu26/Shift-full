<?php
$mail = null;
$dir = null;
$tel = null;
ob_start();
require_once("miapp_paquete.php");
$ID = $_GET["ID"];

$consultas = mysqli_query($con, "SELECT * FROM paquete WHERE IdPaquete='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $pre = $filax['Precio'];
    $desc = $filax['Descripcion'];
    $descu = $filax['Descuento'];


}
if (isset($_POST['modificar'])) {

    if (isset($_POST['nom2'])  && isset($_POST['pre2'])  && isset($_POST['desc2']) && isset($_POST['descu2'])) {

        if (empty($_POST['nom2']) || empty($_POST['pre2']) || empty($_POST['desc2']) || empty($_POST['descu2'])) {

            return;
        }

        $nom2 = $_POST['nom2'];
        $pre2 = $_POST['pre2'];
        $desc2 = $_POST['desc2'];
        $descu2 = $_POST['descu2'];


            if (actualizar_paq($nom2,$pre2,$descu2,$desc2,$ID)  == true) {
                echo '<script language="javascript">alert("Se ha modificado  el paquete correctamente");</script>';
                header('refresh: 0; url=lista_paquetes.php');
            }
        
        
        else {
            echo '<script language="javascript">alert("Error al modificar el producto");</script>';
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