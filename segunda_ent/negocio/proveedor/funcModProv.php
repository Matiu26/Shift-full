<?php
    $mail = null;
    $dir = null;
    $tel = null;
    ob_start();
    require_once("../../dato/conexion.php");
    require_once("miapp_prov.php");
    $ID = $_GET["ID"];

    $consultas = mysqli_query($con, "SELECT * FROM proveedor WHERE IdEmpresa='" . $ID . "'") or die(mysqli_error($con));

    while ($filax = mysqli_fetch_array($consultas)) {
        $mail = $filax['Email'];
        $nom = $filax['Nombre'];
        $dir = $filax['Direccion'];
    }

    $cons = mysqli_query($con, "SELECT * FROM telproveedor WHERE IdEmpresa='" . $ID . "'") or die(mysqli_error($con));

    while ($filam = mysqli_fetch_array($cons)) {
        $tel = $filam['Num_Telefono'];
    }
    if (isset($_POST['modificar'])) {

        if (isset($_POST['nom2'])  && isset($_POST['mail2'])  && isset($_POST['dir2']) && isset($_POST['tel2'])) {


            if (empty($_POST['nom2']) || empty($_POST['mail2']) || empty($_POST['dir2']) || empty($_POST['tel2'])) {

                return;
            }

            $nom2 = $_POST['nom2'];
            $mail2 = $_POST['mail2'];
            $dir2 = $_POST['dir2'];
            $tel2 = $_POST['tel2'];
            if (actualizar_prov($nom2, $mail2, $dir2, $tel2, $ID)  == true) {
                echo '<script language="javascript">alert("Se ha modificado correctamente");</script>';
                header('refresh: 0; url=Upd_prov.php');
            }
        }
    }


?>
