<?php
require_once("../../usuario/miapp_user.php");
require_once("../../productos/miapp_productos.php");
error_reporting(0);
session_start();
$sesion_i = $_SESSION['session_username'];
$ID = $_GET["ID"];

$query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
$row = $query->fetch_assoc();
$id_u= $row["IdUsuario"];

$cant = $_POST['cant'];

$q = mysqli_query($con, "SELECT cantidad FROM carrito WHERE IdProducto='" . $ID . "'");
$row = $q->fetch_assoc();
$cant_act= $row["cantidad"];
$cant_nueva= $cant_act + $cant;

$ka = mysqli_query($con, "SELECT Stock FROM producto WHERE IdProducto='" . $ID . "'");
$row = $ka->fetch_assoc();
$stock= $row["Stock"];

if ($sesion_i == null ||  $sesion_i = "") {
    echo '<script language="javascript">alert("Necesitas iniciar sesion para agregar productos al carrito");</script>';
    ?>
    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../producto.php?ID=<?php echo $ID; ?>">
    <?php

} else{
           
        if(existe_en_carrito($ID)  == true) {
            mysqli_query($con, "UPDATE carrito  Set cantidad = '$cant_nueva'  WHERE IdProducto = '$ID'") or die(mysqli_error($con));
            echo '<script language="javascript">alert("Se ha agregado correctamente");</script>';
            header('refresh: 0; url=carrito.php');
            
        } 
            if($stock >0){
                if (agregar_carrito($id_u,$ID,$cant)  == true) {
                    echo '<script language="javascript">alert("Se ha agregado correctamente");</script>';
                    header('refresh: 0; url=carrito.php');
                }
            } else {
                echo '<script language="javascript">alert("No contamos con stock de este producto");</script>';
                ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../producto.php?ID=<?php echo $ID; ?>">
               
                <?php
            }
          
        
        
    
    }


  
?>