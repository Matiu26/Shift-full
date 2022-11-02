<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
error_reporting(0);
session_start();
$sesion_i = $_SESSION['session_username'];
$ID = $_GET["ID"];
if ($sesion_i == null ||  $sesion_i = "") {
    echo '<script language="javascript">alert("Necesitas iniciar sesion para agregar productos al carrito");</script>';
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../producto.php?ID=<?php echo $ID; ?>">
   
    <?php

} else{


        $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
        $row = $query->fetch_assoc();
        $id_u= $row["IdUsuario"];


        if (existe_en_carrito($ID) == true) {
            echo '<script language="javascript">alert("Este producto ya existe en tu carrito");</script>';
            ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../producto.php?ID=<?php echo $ID; ?>">
           
            <?php
            die;
        } else {

            if (agregar_carrito($id_u,$ID)  == true) {
                echo '<script language="javascript">alert("Se ha agregado correctamente");</script>';
                header('refresh: 0; url=carrito.php');
            }
            
        }
    
    }


  
?>