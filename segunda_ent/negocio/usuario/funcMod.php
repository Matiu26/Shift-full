    <link rel="stylesheet" href="styles.css">
<?php
        $IDu = null;
        $nom = null;
        $ape = null;
        $mail = null;
        $tel = null;


        require_once("../../dato/conexion.php");
        require_once("miapp_user.php");

        
        if (isset($_POST['buscar'])) {
            ?>
                 <?php
            if (isset($_POST['mail'])) {
            
                    $email = $_POST['mail'];

                    if (buscar_datos($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDu = $filas['IdUsuario'];
                            $nom = $filas['Nombre'];
                            $ape = $filas['Apellido'];
                            $mail = $filas['Email'];
                        }
                        $cons = mysqli_query($con, "SELECT * FROM telusr WHERE IdUsuario='" . $IDu . "'") or die(mysqli_error($con));

                        while ($filam = mysqli_fetch_array($cons)) {
                            $tel = $filam['Telefono'];
                        }
                    } else {
                        echo '<script language="javascript">alert("El usuario ingresado no existe");</script>';
                        header('refresh: 1; ');
                        die;                        
                    }
                
            }
            ?>
        <tr>
            <td><?php echo "<p style='color:white;'>" . $IDu . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $ape . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $mail . "</p>"; ?></td>
            <td><?php echo "<p style='color:white;'>" . $tel . "</p>"; ?></td>
            <td><a href="modificar_usuario.php?ID=<?php echo $IDu; ?>">Modificar </a></td>
        
            <?php }?>
        </tr>
        <br>
 
       