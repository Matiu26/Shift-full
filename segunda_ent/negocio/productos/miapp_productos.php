<?php
require_once __DIR__."/../../dato/conexion.php";

function existe_prod($nombre)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdProducto FROM producto WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}

function buscar_datos_prod($nombre)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM producto WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}




function agregar_prod($Nombre, $stock,$tipo, $precio,$descripcion,$ruta,$id_e)
{
    $con = conectar();
    mysqli_query($con, "insert into producto (Nombre,Stock,Tipo, Precio, Descripcion, Foto)
    VALUES('$Nombre', '$stock', '$tipo', '$precio', '$descripcion', '$ruta' )") or die;
         $id = mysqli_insert_id($con);
         mysqli_query($con, "insert into provee(IdEmpresa,IdProducto) values (" . $id_e . ", '$id')");

    mysqli_close($con);

    return true;
}

function eliminar_prod($id)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM producto  WHERE IdProducto='" . $id . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}
function actualizar_prod($nombre, $stock, $precio,$descripcion, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE producto SET Nombre = '$nombre', Stock = '$stock',Tipo = 'null', 
    Precio = '$precio',  Descripcion = '$descripcion'  WHERE IdProducto = '$ID'") or die(mysqli_error($con));
    return true;
}
