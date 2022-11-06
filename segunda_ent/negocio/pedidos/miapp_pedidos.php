<?php
require_once __DIR__."../../../dato/conexion.php";

function agregar_datos($nombre, $apellido, $email,$direccion,$tarjeta, $CVV,$date)
{
    $con = conectar();
    mysqli_query($con, "insert into compra (Nombre, Apellido,Email,Direccion,Tarjeta,CVV,Fecha_Compra,Estado) 
    VALUES('$nombre', '$apellido','$email', '$direccion','$tarjeta','$CVV','$date',0)") or die;

    mysqli_close($con);
    return true;
}
?>
      