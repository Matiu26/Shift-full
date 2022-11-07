<?php
require_once("../../dato/conexion.php");
require_once("miapp_user.php");
session_start();
error_reporting(0);
if (isset($_POST['ingresar'])) {

    if (isset($_POST['mail'])  && isset($_POST['pass'])) {
        
        $email = $_POST['mail'];
        $pass= $_POST['pass'];

        $query = mysqli_query($con, "SELECT Contraseña FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));
        $row = $query->fetch_assoc();
        $passo = $row["Contraseña"];

        if( empty($_POST['mail']) || empty($_POST['pass'])) { 

            return ;
        } else{

            if (aprobacion($email) == true) {
                echo '<script language="javascript">alert("El usuario aún no ha sido aprobado");</script>';
                header('refresh: 0;');
                }
                 else{
                       
       if(password_verify($pass,$passo)==true){

            if (existe_cliente($email) == true) {
                $_SESSION['session_username']=$email;
                    header('refresh: 0; url=../productos/pags/index.php');
                }
                else if (existe_jefe($email) == true) {
                    $_SESSION['session_username']=$email;

                    header('refresh: 0; url=../../dise/accion.php');
                }
                else if (existe_vendedor($email) == true) {
                    $_SESSION['session_username']=$email;

                    header('refresh: 0; url=../../dise/vendedor.php');
                }
                else if (existe_comprador($email) == true) {
                    $_SESSION['session_username']=$email;

                    header('refresh: 0; url=../../dise/comprador.php');
                }
                
       
    }   else {
        echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
        // header('refresh: 0;');

    }
}
    }
}

}



?>