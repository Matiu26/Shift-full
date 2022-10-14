<?php
    require_once("miapp_user.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['nom'])  && isset($_POST['ape']) && isset($_POST['mail'])  && isset($_POST['pass'])) {

            $patron = '/[0-9]/';

            if (preg_match("$patron", ($_POST['nom']))) {
                echo '<script language="javascript">alert("Solo letras en el nombre");</script>';
                header('refresh: 1; ');
                die;
            }
            if (preg_match("$patron", ($_POST['ape']))) {
                echo '<script language="javascript">alert("Solo letras en el apellido");</script>';
                header('refresh: 1; ');
                die;

            }

            if (($_POST['rol']) == "0") {
                echo '<script language="javascript">alert("Es necesario agregar un rol");</script>';
                header('refresh: 1; ');
                die;
            } else {


                if (empty($_POST['nom']) || empty($_POST['ape']) || empty($_POST['mail']) || empty($_POST['pass'])) {

                    return;
                }
               

                $nombre = $_POST['nom'];
                $apellido = $_POST['ape'];
                $email = $_POST['mail'];
                $password = $_POST['pass'];
                $password= password_hash($password, PASSWORD_DEFAULT);
                $rango = $_POST['rol'];

                if (existe($email) == true) {
                    echo '<script language="javascript">alert("Email ya existente, ingrese otro email");</script>';
                    die;
                } else {
                    if (($_POST['rol']) == "1") {
                        if (agregar_vendedor($nombre, $apellido, $email, $password)  == true) {
                            echo '<script language="javascript">alert("Se ha registrado correctamente");</script>';
                            header('refresh: 0; url=../../dise/accion.php');
                        }
                    } else if (($_POST['rol']) == "2") {
                        if (agregar_comprador($nombre, $apellido, $email, $password)  == true) {
                            echo '<script language="javascript">alert(" Se ha registrado correctamente");</script>';
                            header('refresh: 0; url=../../dise/accion.php');
                        }
                    }
                    else if (($_POST['rol']) == "3") {
                        if (agregar_jefe($nombre, $apellido, $email, $password)  == true) {
                            echo '<script language="javascript">alert(" Se ha registrado correctamente");</script>';
                            header('refresh: 0; url=../../dise/accion.php');
                        }
                    }
                }
            }        

        }
    }
    ?>
