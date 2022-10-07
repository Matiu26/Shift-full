<?php

    require_once("../productos/miapp_productos.php");

    if (isset($_POST['agregar'])) {

        if (isset($_POST['prod'])  && isset($_POST['cant']) && isset($_POST['pre']) && isset($_POST['desc'])) {


            if (empty($_POST['foto'])) {
                echo "<p style='color:white;'>Es necesario agregar una foto </p>";
            }


            if (empty($_POST['prod']) || empty($_POST['cant']) || empty($_POST['pre']) || empty($_POST['desc'])) {

                return;
            }


            $producto = $_POST['prod'];
            $cantidad = $_POST['cant'];
            $precio = $_POST['pre'];
            $descripcion = $_POST['desc'];
            $id = $_POST['proveedor'];

            $nombre_img = $_FILES['foto']['name'];
            $temporal=$_FILES['foto']['tmp_name'];
            $carpeta = '../../img/uploads';
            $ruta =$carpeta.'/'.$nombre_img;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_img);


                if (agregar_prod($producto, $cantidad, $precio, $descripcion, $ruta, $id)  == true) {
                    echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                    header('refresh: 0; url=../../dise/comprador.php');
                } else {
                    echo '<script language="javascript">alert("Error al ingresar el producto");</script>';
                    header('refresh: 0;');
                }
            
        }
    }


    ?>



