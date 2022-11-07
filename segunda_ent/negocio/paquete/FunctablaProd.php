<?php
$IDpa = $_GET["ID"];
    ob_start();
    // require_once("../../dato/conexion.php");
    require_once("miapp_productos.php");
    $consulta = mysqli_query($con, "SELECT * FROM producto") or die(mysqli_error($con));
    ?>
    <table id="tabla" width="40%" border="1">
        <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Agregar Paquete</th>
        </tr>
        <?php
   
        while ($filas = mysqli_fetch_array($consulta)) {

            $IDp = $filas['IdProducto'];
            $nom = $filas['Nombre'];
            $sto = $filas['Stock'];
            $tip = $filas['Tipo'];
            $descu = $filas['Descuento'];
            $pre = $filas['Precio']- (($filas['Precio'] * $descu)/ 100);
            $desc = $filas['Descripcion'];
            $foto= '<img  src="'.$filas["Foto"].'" width="120"  alt="" srcset="">';
          

            if (isset($_POST['buscar'])) {
                if (isset($_POST['nom'])) {

                    if (empty($_POST['nom'])) {

                        return;
                    }              


                    $nombre = $_POST['nom'];

                    if (buscar_datos_prod($nombre) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM producto WHERE Nombre like '%" . $nombre . "%'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDp = $filas['IdProducto'];
                            $nom = $filas['Nombre'];
                            $sto = $filas['Stock'];
                            $tip = $filas['Tipo'];
                            $pre = $filas['Precio'];
                            $desc = $filas['Descripcion'];
                           $foto= '<img  src="'.$filas["Foto"].'" width="120"  alt="" srcset="">';
                        }
                    
                    } else {
                        $nombre = null;
                        echo '<script language="javascript">alert("El Producto ingresado no existe");</script>';
                        die;
                    }
                }
            }
            
        ?>
            <tr>
                <td><?php echo "<p style='padding:6px;'>" . $IDp . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $sto . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $tip . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>$" . $pre . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $desc . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $foto . "</p>"; ?></td>
                <td><a href="funcAgregarAPaq.php?IDpr=<?php echo $IDp; ?>&ID=<?php echo $IDpa; ?>"><strong class="total">Agregar a Paquete </a></td>





            </tr>
        <?php

        }           

    

        ?>
    </table>