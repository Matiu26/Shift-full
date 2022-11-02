<?php
require_once __DIR__."/../../dato/conexion.php";

function buscar_datos_paq($nombre)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM paquete WHERE Nombre='" . $nombre . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}

function agregar_paq($Nombre,$precio,$descu,$descripcion)
{
    $con = conectar();
    mysqli_query($con, "insert into Paquete (Nombre,Precio,Descuento, Descripcion)
    VALUES('$Nombre', '$precio', '$descu','$descripcion')") or die;
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
function actualizar_prod($nombre, $stock,$tipos, $precio,$descripcion,$ruta, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE producto SET Nombre = '$nombre', Stock = '$stock',Tipo = '$tipos', 
    Precio = '$precio',  Descripcion = '$descripcion' , Foto = '$ruta' WHERE IdProducto = '$ID'") or die(mysqli_error($con));
    return true;
}

function actualizar_prod_comp($stock, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE producto  Set Stock = '$stock'  WHERE IdProducto = '$ID'") or die(mysqli_error($con));
    return true;
}
function agregar_desc($ID,$desc)
{
    $con = conectar();
    mysqli_query($con, "UPDATE producto  Set Descuento = '$desc'  WHERE IdProducto = '$ID'") or die(mysqli_error($con));


    mysqli_close($con);

    return true;
}

//CARRITO --------------------------------------------------------------------------------------------------------------------------------


function agregar_carrito($id_u,$id_p)
{
    $con = conectar();
    mysqli_query($con, "insert into carrito (IdUsuario,IdProducto) VALUES('$id_u', '$id_p')") or die;
    
    mysqli_close($con);

    return true;
}

function existe_en_carrito($id)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdUsuario FROM carrito WHERE IdProducto='" . $id. "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function eliminar_carrito($id_p)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM carrito  WHERE IdProducto='" . $id_p . "'") or die;
    
    mysqli_close($con);

    return true;
}