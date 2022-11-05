<?php
    require_once("miapp_paquete.php");
    if (isset($_POST['agregar'])) {

        if (isset($_POST['nom'])  && isset($_POST['pre']) && isset($_POST['descu'])  && isset($_POST['desc'])) {

                if (empty($_POST['nom']) || empty($_POST['pre']) || empty($_POST['descu']) || empty($_POST['desc'])) {

                    return;
                }
            
                $nombre = $_POST['nom'];
                $precio = $_POST['pre'];
                $descuento = $_POST['descu'];
                $descripcion = $_POST['desc'];
                


                if ( agregar_paq($nombre,$precio,$descuento,$descripcion) == true) {
                    echo '<script language="javascript">alert("Paquete creado correctamente");</script>';
                    header('refresh: 0; url=../../dise/accion.php');

                } 
        }
    }
    ?>
