<?php
    require_once("miapp_prov.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['nom'])  &&  isset($_POST['mail'])  && isset($_POST['dir'])  && isset($_POST['tel'])) {

            if (empty($_POST['nom']) || empty($_POST['mail']) || empty($_POST['dir']) || empty($_POST['tel'])) {

                return;
            }

            $nombre = $_POST['nom'];
            $email = $_POST['mail'];
            $direccion = $_POST['dir'];
            $telefono = $_POST['tel'];

            if (existe_prov($email) == true) {
                echo '<script language="javascript">alert("Email ya existente, ingrese otro email");</script>';
                header('refresh: 0; ');
                die;
            } else {
                if (agregar_prov($nombre,$email, $direccion,$telefono)  == true) {
                    echo '<script language="javascript">alert(" Se ha registrado correctamente");</script>';
                    header('refresh: 0; url=../../dise/accion.php');
                }
            }
        }
    }
    ?>