<?php
require_once("miapp_pedidos.php");
$ID = $_GET["ID"];
$query = mysqli_query($con, "SELECT Estado FROM compra WHERE IdCompra='" . $ID . "'") or die(mysqli_error($con));
$row = $query->fetch_assoc();
$estado= $row["Estado"];
$estado= $estado -1;
echo $estado;
if (actualizar_estado($ID,$estado)  == true) {
    header('refresh: 0; url=verPedido.php');
}


?>