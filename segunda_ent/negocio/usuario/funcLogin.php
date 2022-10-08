<?php
require_once("miapp_user.php");
if (isset($_POST['ingresar'])) {

    if (isset($_POST['mail'])  && isset($_POST['pass'])) {

        $email = $_POST['mail'];
        $pass = $_POST['pass'];
        
        if( empty($_POST['mail']) || empty($_POST['pass'])) { 

            return ;
        } else{

            if (aprobacion($email) == true) {
                echo '<script language="javascript">alert("El usuario aún no ha sido aprobado");</script>';
                header('refresh: 0;');
                }
                 else{

                

        if (login($email, $pass) == true) {
            if (existe_cliente($email, $pass) == true) {
                header('refresh: 0; url=../../../src/index.php');
            } else if (existe_jefe($email, $pass) == true) {
                header('refresh: 0; url=../../dise/accion.php');
            }
            else if (existe_vendedor($email, $pass) == true) {
                header('refresh: 0; url=../../dise/vendedor.php');
            }
            else if (existe_comprador($email, $pass) == true) {
                header('refresh: 0; url=../../dise/comprador.php');
            }
        } else {
            echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
            header('refresh: 0;');

        }
    }
}
    
}
}
?>