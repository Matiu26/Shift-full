<?php
        $IDe = null;
        $nombre = null;
        $mail = null;
        $dir = null;
        $tel = null;
        require_once("../../dato/conexion.php");
        require_once("miapp_prov.php");

        if (isset($_POST['buscar'])) {
        ?>
            <?php
            if (isset($_POST['nom'])) {

                $nombre = $_POST['nom'];

                if (buscar_datos_prov($nombre) == true) {
                    $consulta = mysqli_query($con, "SELECT * FROM proveedor WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

                    while ($filas = mysqli_fetch_array($consulta)) {
                        $IDe = $filas['IdEmpresa'];
                        $nom = $filas['Nombre'];
                        $mail = $filas['Email'];
                        $dir = $filas['Direccion'];
                    }
                    $cons = mysqli_query($con, "SELECT * FROM telproveedor WHERE IdEmpresa='" . $IDe . "'") or die(mysqli_error($con));

                    while ($filam = mysqli_fetch_array($cons)) {
                        $tel = $filam['Num_Telefono'];
                    }
                } else {
                    echo '<script language="javascript">alert("El proveedor ingresado no existe");</script>';
                    header('refresh: 0; ');
                    die;
                }
            }

            ?>
            <tr>
            <td><?php echo "<p style='padding:6px;'>"  . $IDe . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>"  . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>"  . $mail . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>"  . $dir . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>"  . $tel . "</p>"; ?></td>
                <td><a href="modificar_prov.php?ID=<?php echo $IDe; ?>"><strong class="total">Modificar </a></td>

            <?php } ?>
            </tr>
