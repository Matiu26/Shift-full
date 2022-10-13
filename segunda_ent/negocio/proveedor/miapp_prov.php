<?php
require_once __DIR__."/../../dato/conexion.php";

function existe_prov($email)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdEmpresa FROM proveedor WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}

function buscar_datos_prov($nombre)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM proveedor WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}




function agregar_prov($nombre, $email, $direccion, $telefono)
{
    $con = conectar();
    mysqli_query($con, "insert into proveedor (Nombre, Email, Direccion) VALUES('$nombre','$email', '$direccion')") or die;
    $id = mysqli_insert_id($con);
    mysqli_query($con, "insert into telproveedor values (" . $id . ", '$telefono')");

    mysqli_close($con);

    return true;
}

function eliminar_prov($id)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM proveedor  WHERE IdEmpresa='" . $id . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}

function actualizar_prov($nombre, $email, $direccion, $telefono, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE proveedor SET Nombre = '$nombre', Email = '$email' , Direccion = '$direccion'  
        WHERE IdEmpresa = '$ID'") or die(mysqli_error($con));
    mysqli_query($con, "UPDATE telproveedor SET Num_Telefono = '$telefono' WHERE IdEmpresa = '$ID'") or die(mysqli_error($con));
    return true;
}
