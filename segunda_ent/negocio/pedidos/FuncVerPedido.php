<?php
    ob_start();
    // require_once("../../dato/conexion.php");
    require_once("miapp_pedidos.php");

    $consulta = mysqli_query($con, "SELECT * FROM compra") or die(mysqli_error($con));    
    ?>

    <table id="tabla" width="40%" border="1">
        <tr>
            <th>Id Compra</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Fecha Compra</th>
            <th>Siguiente Estado</th>
            <th>Volver Estado</th>





        </tr>
        <?php
        while ($filas = mysqli_fetch_array($consulta)) {
            $IDc = $filas['IdCompra'];
            $nom = $filas['Nombre'];
            $ape = $filas['Apellido'];
            $mail = $filas['Email'];
            $dir = $filas['Direccion'];
            $estado = $filas['Estado'];
            $fec = $filas['Fecha_Compra'];

            if($estado== 0){
                $estado="Pago Pendiente";
            }
             else if($estado== 1){
                $estado="Pago realizado";

            }
            else if($estado== 2){
                $estado="En Transporte";

            }
            else if($estado== 3){
                $estado="Entregado";

            } else {
                $estado="Compra finalizada";

            }

            if (isset($_POST['buscar'])) {
                if (isset($_POST['id'])) {

                    if (empty($_POST['id'])) {

                        return;
                    }

                    $id_u = $_POST['id'];

                    if (buscar_datos_compra($id_u) == true) {
                        $consulta = mysqli_query($con, "SELECT * FROM compra WHERE IdCompra='" . $id_u . "'") or die(mysqli_error($con));

                        while ($filas = mysqli_fetch_array($consulta)) {
                            $IDc = $filas['IdCompra'];
                            $nom = $filas['Nombre'];
                            $ape = $filas['Apellido'];
                            $mail = $filas['Email'];
                            $dir = $filas['Direccion'];
                            $estado = $filas['Estado'];
                            $fec = $filas['Fecha_Compra'];
                            
                            if($estado== 0){
                                $estado="Pago Pendiente";
                            }
                             else if($estado== 1){
                                $estado="Pago realizado";
                
                            }
                            else if($estado== 2){
                                $estado="En Transporte";
                
                            }
                            else if($estado== 3){
                                $estado="Entregado";
                
                            } else {
                                $estado="Compra finalizada";
                
                            }
                        }
                    
                    } else {
                        $id_u = null;
                        echo '<script language="javascript">alert("El pedido ingresado no existe");</script>';
                        header('refresh: 0; url=verPedido.php');

                    }
                }
            }
        ?>
            <tr>
                <td><?php echo "<p style='padding:6px;'>" . $IDc . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $nom . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $ape . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $mail . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $dir . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $estado . "</p>"; ?></td>
                <td><?php echo "<p style='padding:6px;'>" . $fec . "</p>"; ?></td>
                <td><a href="estado_pedido.php?ID=<?php echo $IDc; ?>"><strong class="total">Siguiente Estado </a></td>
                <td><a href="volver_pedido.php?ID=<?php echo $IDc; ?>"><strong class="total">Volver Estado </a></td>





            </tr>
        <?php

        }           
    
    

        ?>
    </table>