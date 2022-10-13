<?php
    ob_start();
    require_once("../../dato/conexion.php");
    require_once("miapp_prov.php");

    $consulta = mysqli_query($con, "SELECT * FROM proveedor") or die(mysqli_error($con));

    ?>

    <table id="tabla" width="40%" border="1">
        <tr>
            <th>Id Empresa</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Accion</th>
        </tr>
        <?php
        $IDe = null;
        $nombre = null;
        $mail = null;
        $dir = null;
        $tel = null;
        while ($filas = mysqli_fetch_array($consulta)) {
            $IDe = $filas['IdEmpresa'];
            $nom = $filas['Nombre'];
            $mail = $filas['Email'];
            $dir = $filas['Direccion'];

            if (isset($_POST['buscar'])) {
                if (isset($_POST['nom'])) {
                    
                    if (empty($_POST['nom'])) {

                        return;
                    }

                    $nombre = $_POST['nom'];

                    if (buscar_datos_prov($nombre) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM proveedor WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDe = $filas['IdEmpresa'];
                            $nom = $filas['Nombre'];
                            $mail = $filas['Email'];
                            $dir = $filas['Direccion'];

                        }
                       
                    } else {
                        $email = null;
                        echo '<script language="javascript">alert("El usuario ingresado no existe");</script>';
                        header('refresh: 1; ');
                        die;
                    }
                }
            }
        ?>
            <tr>
            <td><?php echo "<p style='color:white;'>" . $IDe . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $mail . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $dir . "</p>"; ?></td>
            <td><a href="eliP.php?ID=<?php echo $IDe; ?>">Eliminar </a></td>

            </tr>
        <?php


        }




        ?>
    </table>
    
   
