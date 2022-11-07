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
                if (isset($_POST['nom'])) {
                 
                    if (empty($_POST['nom'])) {

                        return;
                    }

                    $nombre = $_POST['nom'];

                    if (buscar_datos_prov($nombre) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM proveedor WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

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
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=mostrar_prov.php">
                        <?php
                        die;

                    }
                }
            }
        ?>
            <tr>
            <td><?php echo "<p style='padding:6px;'>" . $IDp . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $email . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $dir . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $tel . "</p>"; ?></td>

            </tr>
        <?php

        }
        }


        ?>