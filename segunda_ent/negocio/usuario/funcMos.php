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

            if (isset($_POST['buscar'])) {
                if (isset($_POST['mail'])) {
                 
                    if (empty($_POST['mail'])) {

                        return;
                    }

                    $email = $_POST['mail'];

                    if (buscar_datos($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDu = $filas['IdUsuario'];
                            $nom = $filas['Nombre'];
                            $ape = $filas['Apellido'];
                            $email = $filas['Email'];
                        }
                    } else {
                        $email = null;
                        echo '<script language="javascript">alert("El usuario ingresado no existe");</script>';
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=mostrar.php">
                       
                        <?php
                        die;

                    }
                }
            }
        ?>
            <tr>
            <td><?php echo "<p style='padding:6px;'>" . $IDu . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $ape . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $email ."</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $tel . "</p>"; ?></td>

                
            </tr>
        <?php


        }
    }

       


        ?>
    </table>