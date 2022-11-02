<?php
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
            $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';
          

        

                    if (buscar_datos_prod($nombre) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM producto WHERE Nombre like '%" . $nombre . "%'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDp = $filas['IdProducto'];
                            $nom = $filas['Nombre'];
                            $sto = $filas['Stock'];
                            $tip = $filas['Tipo'];
                            $pre = $filas['Precio'];
                            $desc = $filas['Descripcion'];
                           $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';
                        }
                    
                    } 
                
            
        ?>
            <tr>
                <td><?php echo "<p style='color:white;'>" . $IDp . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $sto . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $tip . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>$" . $pre . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $desc . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $foto . "</p>"; ?></td>
                <td><a href="agrDescuento.php?ID=<?php echo $IDp; ?>">Agregar a Paquete </a></td>





            </tr>
        <?php

        }           

    

        ?>
    </table>