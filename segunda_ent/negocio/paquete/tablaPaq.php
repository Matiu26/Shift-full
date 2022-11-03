<?php
    ob_start();
    // require_once("../../dato/conexion.php");
    require_once("miapp_paquete.php");

    $consulta = mysqli_query($con, "SELECT * FROM paquete") or die(mysqli_error($con));
    $c = mysqli_query($con, "SELECT * FROM VIEW_PAQUETES_CON_IMAGEN") or die(mysqli_error($con));

    ?>

    <table id="tabla" width="40%" border="1">
        <tr>
            <th>Id Paquete</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Agregar Paquete</th>
            <th>Ver Paquete</th>
            <th>Eliminar Paquete</th>

          



        </tr>
        <?php
   
        while ($filas = mysqli_fetch_array($consulta)) {
            $IDpa = $filas['IdPaquete'];
            $nom = $filas['Nombre'];
            $descu = $filas['Descuento'];
            $pre = $filas['Precio']- (($filas['Precio'] * $descu)/ 100);
            $desc = $filas['Descripcion'];
            
            $filax = mysqli_fetch_array($c) ;
            $foto= '<img  src="'.$filax["Imagen"].'" width="180"  alt="" srcset="">';

           
          

            if (isset($_POST['buscar'])) {
                if (isset($_POST['nom'])) {

                    if (empty($_POST['nom'])) {

                        return;
                    }              


                    $nombre = $_POST['nom'];

                    if (buscar_datos_paq($nom) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM paquete WHERE Nombre like '%" . $nombre . "%'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDpa = $filas['IdPaquete'];
                            $nom = $filas['Nombre'];
                            $descu = $filas['Descuento'];
                            $pre = $filas['Precio']- (($filas['Precio'] * $descu)/ 100);
                            $desc = $filas['Descripcion'];
                        }
                    
                    } else {
                        $nombre = null;
                        echo '<script language="javascript">alert("El Paquete ingresado no existe");</script>';
                        die;
                    }
                }
            }
        ?>
            <tr>
                <td><?php echo "<p style='color:white;'>" . $IDpa . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>$" . $pre . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $desc . "</p>"; ?></td>
                <td><?php echo "<p style='color:white;'>" . $foto . "</p>"; ?></td>
                <td><a href="lista_prod.php?ID=<?php echo $IDpa; ?>">Agregar productos </a></td>
                <td><a href="verPaquete.php?ID=<?php echo $IDpa; ?>">Ver  Paquete </a></td>
                <td><a href="eliminar_paquete.php?ID=<?php echo $IDpa; ?>">Eliminar  Paquete </a></td>







            </tr>
        <?php

        }           
        
      

        ?>
    </table>