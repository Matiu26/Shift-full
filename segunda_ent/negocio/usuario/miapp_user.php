<?php
require_once __DIR__."/../../dato/conexion.php";

function login($email, $password)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $email . "'and Contraseña='" . $password . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function existe($email)
{
    $con = conectar();  
      $query = mysqli_query($con, "SELECT IdUsuario FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
// function contra($email)
// {
//     $con = conectar();  
//     $query = mysqli_query($con, "SELECT Contraseña FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));
//     $row = $query->fetch_assoc();
//         $passo = $row["Contraseña"];
// }
function aprobacion($email)
{
    $con = conectar();  
      $query = mysqli_query($con, "SELECT IdUsuario FROM usuario_aprobar WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}


function buscar_datos($email)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function existe_aprobar($email)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT IdUsuario FROM usuario_aprobar WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}

function buscar_datos_aprobar($email)
{
    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario_aprobar WHERE Email='" . $email . "'") or die(mysqli_error($con));

    $row = $query->fetch_assoc();
    mysqli_close($con);

    if ($row == null) {
        return false;
    }

    return true;
}
function existe_cliente($email, $password)
{

    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM cliente WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}


function existe_vendedor($email, $password)
{

    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM vendedor WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}
function existe_comprador($email, $password)
{

    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM comprador WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return
        true;
}
function existe_jefe($email, $password)
{

    $con = conectar();
    $query = mysqli_query($con, "SELECT * FROM usuario WHERE Email='" . $email . "' and Contraseña='" . $password . "'");

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    $query = mysqli_query($con, "SELECT * FROM jefe WHERE IdUsuario=" . $row["IdUsuario"]);

    $row = $query->fetch_assoc();

    if ($row == null) {
        mysqli_close($con);
        return false;
    }

    mysqli_close($con);
    return true;
}



function reg_clin($nombre, $apellido, $email, $password, $telefono)
{
    $con = conectar();
    mysqli_query($con, "insert into usuario_aprobar (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    $id = mysqli_insert_id($con);
    mysqli_query($con, "insert into telusr_aprobar values (" . $id . ", '$telefono')");

    mysqli_close($con);

    return true;
}
function agregar_vendedor($nombre, $apellido, $email, $password)
{
    $con = conectar();
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    $id = mysqli_insert_id($con);
    mysqli_query($con, "insert into vendedor values (" . $id . ")");
    mysqli_query($con, "insert into telusr values (" . $id . ", '1')");
    (mysqli_error($con));
    mysqli_close($con);
    return true;
}

function agregar_comprador($nombre, $apellido, $email, $password)
{
    $con = conectar();
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    $id = mysqli_insert_id($con);
    mysqli_query($con, "insert into comprador values (" . $id . ")");
    mysqli_query($con, "insert into telusr values (" . $id . ", '1')");
    (mysqli_error($con));
    mysqli_close($con);
    return true;
}


function eliminar($id)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM usuario  WHERE IdUsuario='" . $id . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}
function actualizar($nombre, $apellido, $password, $email, $telefono, $ID)
{
    $con = conectar();
    mysqli_query($con, "UPDATE usuario SET Nombre = '$nombre',Apellido = '$apellido', Contraseña = '$password', Email = '$email'   
        WHERE IdUsuario = '$ID'") or die(mysqli_error($con));
    mysqli_query($con, "UPDATE telusr SET Telefono = '$telefono' WHERE IdUsuario = '$ID'") or die(mysqli_error($con));
    return true;
}
function aprobado($nombre, $apellido, $email, $password, $telefono)
{
    $con = conectar();
    mysqli_query($con, "insert into usuario (Nombre, Apellido, Contraseña, Email) VALUES('$nombre', '$apellido','$password', '$email')") or die;
    $id = mysqli_insert_id($con);
    mysqli_query($con, "insert into cliente values (" . $id . ")");
    mysqli_query($con, "insert into telusr values (" . $id . ", '$telefono')");

    mysqli_close($con);

    return true;
}
function eliminar_reg($id)
{
    $con = conectar();
    mysqli_query($con, "DELETE FROM usuario_aprobar  WHERE IdUsuario='" . $id . "'") or die;
    (mysqli_error($con));
    mysqli_close($con);

    return true;
}

?>