<?php
    ob_start();
    require_once("../../dato/conexion.php");
    require_once("miapp_user.php");

    $consulta = mysqli_query($con, "SELECT * FROM usuario") or die(mysqli_error($con));

    ?>

        <?php

        while ($filas = mysqli_fetch_array($consulta)) {
            $IDu = $filas['IdUsuario'];
            $nom = $filas['Nombre'];
            $ape = $filas['Apellido'];
            $email = $filas['Email'];
            $cons = mysqli_query($con, "SELECT * FROM telusr WHERE IdUsuario='" . $IDu . "'") or die(mysqli_error($con));

            while ($filam = mysqli_fetch_array($cons)) {
                $tel = $filam['Telefono'];

           
        ?>
            
        <?php


        }
    }

       


        ?>
    </table>