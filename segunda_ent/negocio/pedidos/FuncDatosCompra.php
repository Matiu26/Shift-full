<?php
    require_once("miapp_pedidos.php");
    if (isset($_POST['siguiente'])) {

        if (isset($_POST['nom'])  && isset($_POST['ape']) && isset($_POST['mail']) && isset($_POST['dir'])
             && isset($_POST['tar']) && isset($_POST['cvv']) ) {

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

            }

                if (empty($_POST['nom']) || empty($_POST['ape']) || empty($_POST['mail']) || empty($_POST['dir'])
                  || empty($_POST['tar'])   || empty($_POST['cvv']) ) {

                    return;
                }
               
                $nombre = $_POST['nom'];
                $apellido = $_POST['ape'];
                $email = $_POST['mail'];
                $direccion = $_POST['dir'];
                $tarjeta = $_POST['tar'];
                $CVV = $_POST['cvv'];

                $date = date('Y/d/m');       
                        if (agregar_datos($nombre, $apellido, $email, $direccion,$tarjeta, $CVV, $date)  == true) {
                            echo '<script language="javascript">alert("Se ha registrado correctamente");</script>';
                            header('refresh: 0; url=../../dise/accion.php');
                        }
                    
                
                    

        }
    }
    ?>
