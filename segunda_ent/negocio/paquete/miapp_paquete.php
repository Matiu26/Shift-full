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

function agregarApaq($id_paq,$id_pr)
{
    $con = conectar();
    mysqli_query($con, "insert into genera (IdPaquete,IdProducto) VALUES('$id_paq', '$id_pr')") or die;
    
    mysqli_close($con);

    return true;
}

function existe_en_paquete($IDpa,$IDp)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdPaquete  FROM genera WHERE  IdPaquete='" . $IDpa. "' AND IdProducto='" . $IDp. "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function eliminar_de_paquete($id_p)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM genera WHERE IdProducto='" . $id_p . "'") or die;
    
    mysqli_close($con);

    return true;
}function eliminar_paquete($IDpa)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM paquete  WHERE IdPaquete='" . $IDpa . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}
function actualizar_paq($nom2,$pre2,$descu2,$desc2, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE Paquete  Set Nombre = '$nom2',
      Precio = '$pre2', Descuento = '$descu2',
    Descripcion = '$desc2'  WHERE IdPaquete = '$ID'") or die(mysqli_error($con));
    return true;
}
function agregar_carrito_paq($id_u,$id_p,$cant)
{
    $con = conectar();
    mysqli_query($con, "insert into carrito_paq (IdUsuario,IdPaquete,cantidad) VALUES('$id_u', '$id_p','$cant')") or die;
    
    mysqli_close($con);

    return true;
}

function existe_en_carrito_paq($id)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdUsuario FROM carrito_paq WHERE IdPaquete='" . $id. "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}