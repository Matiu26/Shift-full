<?php
require_once __DIR__."../../../dato/conexion.php";

function agregar_datos($nombre, $apellido, $email,$direccion,$tarjeta, $CVV,$date)
{
    $con = conectar();
    mysqli_query($con, "insert into compra (Nombre, Apellido,Email,Direccion,Tarjeta,CVV,Fecha_Compra,Estado) 
    VALUES('$nombre', '$apellido','$email', '$direccion','$tarjeta','$CVV','$date',0)") or die;
    $id = mysqli_insert_id($con);
    mysqli_close($con);
    return $id;
}
function carrito_a_tiene($id,$id_p,$cant,$id_u)
{
    $con = conectar();
    mysqli_query($con, "insert into tiene (IdCompra, IdProducto, Cantidad) VALUES('$id','$id_p','$cant')") or die;
    mysqli_query($con, "DELETE FROM carrito  WHERE IdUsuario='" . $id_u . "'") or die;
    
    mysqli_close($con);
}


?>
      