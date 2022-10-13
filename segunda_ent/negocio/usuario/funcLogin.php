<?php
    require_once("../../dato/conexion.php");
require_once("miapp_user.php");
if (isset($_POST['ingresar'])) {

    if (isset($_POST['mail'])  && isset($_POST['pass'])) {

        $email = $_POST['mail'];
        $pass= password_hash($_POST['pass'], PASSWORD_DEFAULT);

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

    if (login($email, $pass) == true) {
        if (existe_cliente($email, $pass) == true) {
                header('refresh: 0; url=../../../src/index.php');
            }
            
             else if (existe_jefe($email, $pass) == true) {
                header('refresh: 0; url=../../dise/accion.php');
            }
            else if (existe_vendedor($email, $pass) == true) {
                header('refresh: 0; url=../../dise/vendedor.php');
            }
            else if (existe_comprador($email, $pass) == true) {
                header('refresh: 0; url=../../dise/comprador.php');
            }
        } 
             else {
        echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
        // header('refresh: 0;');

    }
    }
}
    }
}
}
    



?>