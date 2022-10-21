<?php
    require_once("miapp_user.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['nom'])  && isset($_POST['ape']) && isset($_POST['tel'])  && isset($_POST['mail'])  && isset($_POST['pass'])) {

            $patron = '/[0-9]/';

            if (preg_match("$patron", ($_POST['nom']))) {
                echo '<script language="javascript">alert("Solo letras en el nombre");</script>';
                header('refresh: 0; ');
                die;
            }
            if (preg_match("$patron", ($_POST['ape']))) {
                echo '<script language="javascript">alert("Solo letras en el apellido");</script>';
                header('refresh: 0; ');
                die;
            } else {


                if (empty($_POST['nom']) || empty($_POST['ape']) || empty($_POST['tel']) || empty($_POST['mail']) || empty($_POST['pass'])) {

                    return;
                }


                $nombre = $_POST['nom'];
                $apellido = $_POST['ape'];
                $telefono = $_POST['tel'];
                $email = $_POST['mail'];
                $password = $_POST['pass'];
                $password= password_hash($password, PASSWORD_DEFAULT);
                if (existe($email) == true) {
                    echo '<script language="javascript">alert("Email ya existente, ingrese otro email");</script>';
                    header('refresh: 0; url=registrarse.php');
                    die;
                } else {
                    if (reg_clin($nombre,$apellido,$email,$password,$telefono) == true) {
                        echo '<script language="javascript">alert(" Se ha registrado correctamente");</script>';
                        header('refresh: 0; url=../../../src/index.php');
                    }


                }
            }
        }
    }
    ?>
    
