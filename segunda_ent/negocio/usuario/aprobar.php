<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Aprobar usuario</title>
</head>

<body>
    <form name="formulario" method="post" action="">

        <input placeholder="Email" type="email" name="mail" required maxlength="30" size="40">

        <input type="submit" value="Buscar Usuario" name="buscar">

    </form>
    <table width="40%" border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Habilitar</th>
            <th>Eliminar</th>

        </tr>
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
                if (empty($_POST['mail'])) {
                    echo '<script language="javascript">alert("Es necesario agregar un email");</script>';
                    header('refresh: 2; ');
                    die;
                } else {


                    $email = $_POST['mail'];

                    if (buscar_datos_aprobar($email) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM usuario_aprobar WHERE Email='" . $email . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDu = $filas['IdUsuario'];
                            $nom = $filas['Nombre'];
                            $ape = $filas['Apellido'];
                            $mail = $filas['Email'];
                        }
                        $cons = mysqli_query($con, "SELECT * FROM telusr_aprobar WHERE IdUsuario='" . $IDu . "'") or die(mysqli_error($con));

                        while ($filam = mysqli_fetch_array($cons)) {
                            $tel = $filam['Telefono'];
                        }
                    } else {
                        echo '<script language="javascript">alert("El usuario ingresado no existe");</script>';
                        header('refresh: 1; ');
                        
                    }
                }
            }
            ?>
        <tr>
            <td><?php echo "<p style='color:black;'>" . $IDu . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $nom . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $ape . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $mail . "</p>"; ?></td>
            <td><?php echo "<p style='color:black;'>" . $tel . "</p>"; ?></td>
            <td>
                    <form method="post" action="">
                        <input type="submit" value="Habilitar" name="Habilitar" />
                    </form>
                </td>
                <td>
                <form method="post" action="">
                        <input type="submit" value="Eliminar" name="eliminar" />
                    </form>
                </td>
            
            <?php }?>
        </tr>

        <br>
        <br> <a href="../../dise/accion.php">Regresar</a> <br>
</body>

</html>