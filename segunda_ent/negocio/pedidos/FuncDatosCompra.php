<?php
    require_once("miapp_pedidos.php");
    session_start();
$sesion_i = $_SESSION['session_username'];

$query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $sesion_i . "'");
$row = $query->fetch_assoc();
$id_u= $row["IdUsuario"];


    
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

                $id=agregar_datos($nombre, $apellido, $email,$direccion,$tarjeta, $CVV,$date);

                $q = mysqli_query($con, "select cantidad, IdProducto from carrito  where IdUsuario ='" . $id_u . "'");

                while ($row =$q->fetch_assoc()){
                    
                    $q = mysqli_query($con, "SELECT cantidad FROM carrito WHERE IdProducto='" . $row['IdProducto'] . "'");
                    $row = $q->fetch_assoc();
                    $cant_act= $row["cantidad"];

                    $cant_nueva= $cant_act - $row['cantidad'];
                    Stock($row['IdProducto'],$cant_nueva);
                carrito_a_tiene($id,$row['IdProducto'],$row['cantidad'],$id_u);

                }

                            echo '<script language="javascript">alert("Compra exitosa");</script>';
                            header('refresh: 0; url=../productos/carrito/carrito.php');
                        
                    
                
                    

        }
    }
    ?>
