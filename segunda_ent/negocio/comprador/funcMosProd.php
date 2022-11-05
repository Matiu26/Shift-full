<?php
    ob_start();
    require_once("../../dato/conexion.php");
    require_once("../productos/miapp_productos.php");

    $consulta = mysqli_query($con, "SELECT * FROM producto") or die(mysqli_error($con));
    $c = mysqli_query($con, "select pe.IdEmpresa, pr.Nombre from proveedor pr 
    inner join provee pe
    ON pr.IdEmpresa= pe.IdEmpresa where IdProducto") or die(mysqli_error($con));
    ?>

    <table id="tabla" width="40%" border="1">
        <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Proveedor</th>
            <th>Stock</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Modificar</th>

      


        </tr>
        <?php
        while ($filas = mysqli_fetch_array($consulta)) {
            $IDp = $filas['IdProducto'];
            $nom = $filas['Nombre'];
            $sto = $filas['Stock'];
            $tip = $filas['Tipo'];
            $pre = $filas['Precio'];
            $desc = $filas['Descripcion'];
            $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';
            $filax = mysqli_fetch_array($c) ;
            $nom_prov = $filax['Nombre'];
          

            if (isset($_POST['buscar'])) {
                if (isset($_POST['nom'])) {

                    if (empty($_POST['nom'])) {

                        return;
                    }

                    $nombre = $_POST['nom'];

                    if (buscar_datos_prod($nombre) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM producto WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDp = $filas['IdProducto'];
                            $nom = $filas['Nombre'];
                            $sto = $filas['Stock'];
                            $tip = $filas['Tipo'];
                            $pre = $filas['Precio'];
                            $desc = $filas['Descripcion'];
                            $foto= '<img  src="'.$filas["Foto"].'" width="180"  alt="" srcset="">';
                            $filax = mysqli_fetch_array($c) ;
                            $nom_prov = $filax['Nombre'];
                          

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
                <td><?php echo "<p style='color:white;'>" . $IDp . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $nom_prov . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $sto . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $tip . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $pre . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $desc . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $foto . "</p>"; ?></td>
                <td><a href="editar_prod.php?ID=<?php echo $IDp; ?>">Modificar Stock </a></td>

             


            </tr>
        <?php

        }           

    

        ?>
    </table>