<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
require_once("../../productos/funcMosProd.php");

session_start();
$sesion_i = $_SESSION['session_username'];
$ID = $_GET["ID"];

        $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
        $row = $query->fetch_assoc();
        $id_u= $row["IdUsuario"];


        if (existe_en_carrito($ID) == true) {
            echo '<script language="javascript">alert("Este producto ya existe en tu carrito");</script>';
            header('refresh: 0; url=../../productos/mostrar_prod.php');
            die;
        } else {

            if (agregar_carrito($id_u,$ID)  == true) {
                echo '<script language="javascript">alert("Se ha agregado correctamente");</script>';
                header('refresh: 1; url=carrito.php');
            }
            
        }
    
    


  
?>