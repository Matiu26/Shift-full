<?php
require_once("miapp_user.php");
$ID = $_GET["ID"];
$consultas = mysqli_query($con, "SELECT * FROM usuario_aprobar WHERE IdUsuario='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $ape = $filax['Apellido'];
    $pass = $filax['Contraseña'];
    $mail = $filax['Email'];
}
$cons = mysqli_query($con, "SELECT * FROM telusr_aprobar WHERE IdUsuario='" . $ID . "'") or die(mysqli_error($con));

while ($filam = mysqli_fetch_array($cons)) {
    $tel = $filam['Telefono'];
}
if (aprobado($nom, $ape, $mail, $pass, $tel)  == true) {
    eliminar_reg($ID);
    echo '<script language="javascript">alert("Se aprobó correctamente");</script>';
    header('refresh: 0; url=Aprobar.php');
}


?>



