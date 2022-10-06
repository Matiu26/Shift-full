<?php

    require_once("miapp_productos.php");

    if (isset($_POST['agregar'])) {

        if (isset($_POST['prod'])  && isset($_POST['cant']) && isset($_POST['pre']) && isset($_POST['desc'])) {


            if (empty($_POST['foto'])) {
                echo "<p style='color:red;'>Es necesario agregar una foto </p>";
            }


            if (empty($_POST['prod']) || empty($_POST['cant']) || empty($_POST['pre']) || empty($_POST['desc'])) {

                return;
            }


            $producto = $_POST['prod'];
            $cantidad = $_POST['cant'];
            $precio = $_POST['pre'];
            $descripcion = $_POST['desc'];
            $id = $_POST['proveedor'];

            $foto = $_FILES['foto'];
            $nombre_foto = $foto['name'];
            $type        = $foto['type'];
            $url_temp = $foto['tmp_name'];

            $imgProducto = '../../img/img_producto.jpg';

            if ($nombre_foto != '') {
                $destino = '../../img/uploads/';
                $img_nombre = 'img_' . md5(date('d-m-Y H:m:s'));
                $imgProducto = $img_nombre . '.jpg';
                $src         = $destino . $imgProducto;

                if (agregar_prod($producto, $cantidad, $precio, $descripcion, $imgProducto, $id)  == true) {
                    if ($nombre_foto != '') {
                        move_uploaded_file($url_temp, $src);
                    }
                    echo '<script language="javascript">alert("Se ha registrado  el producto correctamente");</script>';
                    header('refresh: 0; url=../../dise/comprador.php');
                } else {
                    echo '<script language="javascript">alert("Error al ingresar el producto");</script>';
                    header('refresh: 0;');
                }
            }
        }
    }


    ?>



