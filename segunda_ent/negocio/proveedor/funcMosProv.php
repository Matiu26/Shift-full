<?php
    ob_start();
    require_once("../../dato/conexion.php");
    require_once("miapp_prov.php");

    $consulta = mysqli_query($con, "SELECT * FROM proveedor") or die(mysqli_error($con));

?>

    
        <?php

        while ($filas = mysqli_fetch_array($consulta)) {
            $IDp = $filas['IdEmpresa'];
            $nom = $filas['Nombre'];
            $email = $filas['Email'];
            $dir = $filas['Direccion'];
            $cons = mysqli_query($con, "SELECT * FROM telproveedor WHERE IdEmpresa='" . $IDp . "'") or die(mysqli_error($con));

                        while ($filam = mysqli_fetch_array($cons)) {
                            $tel = $filam['Num_Telefono'];
                        

            if (isset($_POST['buscar'])) {
                if (isset($_POST['mail'])) {
                 
                    if (empty($_POST['mail'])) {

                        return;
                    }

                    $email = $_POST['mail'];

                    if (buscar_datos_prov($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM proveedor WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDp = $filas['IdEmpresa'];
                            $nom = $filas['Nombre'];
                            $email = $filas['Email'];
                            $dir = $filas['Direccion'];
                        }
                        $cons = mysqli_query($con, "SELECT * FROM telproveedor WHERE IdEmpresa='" . $IDp . "'") or die(mysqli_error($con));

                        while ($filam = mysqli_fetch_array($cons)) {
                            $tel = $filam['Num_Telefono'];
                        
                        }
                    } else {
                        $email = null;
                        echo '<script language="javascript">alert("El Proveedor ingresado no existe");</script>';
                        die;

                    }
                }
            }
        ?>
            <tr>
                <td><?php echo "<p style='color:white;'>" . $IDp . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $email . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $dir . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $tel . "</p>"; ?></td>

            </tr>
        <?php

        }
        }


        ?>