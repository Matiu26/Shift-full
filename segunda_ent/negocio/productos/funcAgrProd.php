<?php

    require_once("miapp_productos.php");

    if (isset($_POST['agregar'])) {

        if (isset($_POST['prod'])  && isset($_POST['cant']) && isset($_POST['pre']) && isset($_POST['desc'])) {


            // if (empty($_POST['foto'])) {
            //     echo '<script language="javascript">alert("Es necesario agregar una foto");</script>';
            // }
            if (($_POST['tip']) == "0") {
                echo '<script language="javascript">alert("Es necesario agregar un tipo");</script>';
                header('refresh: 0; ');
                die;
            } else {
            if (empty($_POST['prod']) || empty($_POST['cant']) || empty($_POST['pre']) || empty($_POST['desc'])) {

                return;
            }


            $producto = $_POST['prod'];
            $cantidad = $_POST['cant'];
            $tipo = $_POST['tip'];
            $precio = $_POST['pre'];
            $descripcion = $_POST['desc'];
            $id = $_POST['proveedor'];
            
            $nombre_img = md5(date('d-m-Y H:m:s'));
            $temporal=$_FILES['foto']['tmp_name'];
            $carpeta = '../../img/uploads';
            $ruta =$carpeta.'/'.$nombre_img;
            move_uploaded_file($temporal,$carpeta.'/'.$nombre_img);

            if (($_POST['tip']) == "1") {
                if (agregar_prod($producto, $cantidad,"Cabeza", $precio, $descripcion, $ruta, $id)  == true) {
                    echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                    header('refresh: 0; url=../../dise/accion.php');
                }
                 else if (($_POST['tip']) == "2") {
                    if (agregar_prod($producto, $cantidad,"Torso", $precio, $descripcion, $ruta, $id)  == true) {
                        echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                        header('refresh: 0; url=../../dise/accion.php');
                    }
            }
            else if (($_POST['tip']) == "3") {
                if (agregar_prod($producto, $cantidad,"Cintura", $precio, $descripcion, $ruta, $id)  == true) {
                    echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                    header('refresh: 0; url=../../dise/accion.php');
                }
        }
        else if (($_POST['tip']) == "4") {
            if (agregar_prod($producto, $cantidad,"Piernas", $precio, $descripcion, $ruta, $id)  == true) {
                echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                header('refresh: 0; url=../../dise/accion.php');
            }
    }
       else if (($_POST['tip']) == "5") {
        if (agregar_prod($producto, $cantidad,"Calzado", $precio, $descripcion, $ruta, $id)  == true) {
            echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
            header('refresh: 0; url=../../dise/accion.php');
        }
        }
                else {
                    echo '<script language="javascript">alert("Error al ingresar el producto");</script>';
                    header('refresh: 0;');
                }
            
        }
    
    }
}
    }
    ?>



