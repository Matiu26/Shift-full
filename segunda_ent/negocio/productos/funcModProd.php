<?php
$mail = null;
$dir = null;
$tel = null;
ob_start();
require_once("../../dato/conexion.php");
require_once("miapp_productos.php");
$ID = $_GET["ID"];

$consultas = mysqli_query($con, "SELECT * FROM producto WHERE IdProducto='" . $ID . "'") or die(mysqli_error($con));

while ($filax = mysqli_fetch_array($consultas)) {
    $nom = $filax['Nombre'];
    $sto = $filax['Stock'];
    $pre = $filax['Precio'];
    $desc = $filax['Descripcion'];
}
if (isset($_POST['modificar'])) {

    if (isset($_POST['nom2'])  && isset($_POST['sto2'])  && isset($_POST['pre2']) && isset($_POST['desc2'])) {

        if (($_POST['tip']) == "0") {
            echo '<script language="javascript">alert("Es necesario agregar un tipo");</script>';
            header('refresh: 0; ');
            die;
        } else{
        if (empty($_POST['nom2']) || empty($_POST['sto2']) || empty($_POST['pre2']) || empty($_POST['desc2'])) {

            return;
        }

        $nom2 = $_POST['nom2'];
        $sto2 = $_POST['sto2'];
        $tipo = $_POST['tip'];
        $pre2 = $_POST['pre2'];
        $desc2 = $_POST['desc2'];

        $nombre_img = md5(date('d-m-Y H:m:s'));
        $temporal=$_FILES['foto']['tmp_name'];
        $carpeta = '../../img/uploads';
        $ruta =$carpeta.'/'.$nombre_img;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_img);

        
        if (($_POST['tip']) == "1") {
            if (actualizar_prod($nom2, $sto2,"Cabeza", $pre2, $desc2,$ruta, $ID)  == true) {
                echo '<script language="javascript">alert("Se ha modificado  el producto correctamente");</script>';
                header('refresh: 0; url=mostrar_prod.php');
            }
        }
           else if (($_POST['tip']) == "2") {
                if (actualizar_prod($nom2, $sto2,"Torso", $pre2, $desc2,$ruta, $ID)  == true) {
                    echo '<script language="javascript">alert("Se ha modificado  el producto correctamente");</script>';
                    header('refresh: 0; url=mostrar_prod.php');
                }
            }
              else if (($_POST['tip']) == "3") {

        if (actualizar_prod($nom2, $sto2,"Cintura", $pre2, $desc2,$ruta, $ID)  == true) {
            echo '<script language="javascript">alert("Se ha modificado  el producto correctamente");</script>';
            header('refresh: 0; url=mostrar_prod.php');
        }
                }
                else if (($_POST['tip']) == "4") {
          if (actualizar_prod($nom2, $sto2, "Piernas", $pre2, $desc2, $ruta, $ID)  == true) {
        echo '<script language="javascript">alert("Se ha modificado  el producto correctamente");</script>';
        header('refresh: 0; url=mostrar_prod.php');
          }
                }
            else if (($_POST['tip']) == "5") {

    if (actualizar_prod($nom2, $sto2, "Calzado", $pre2, $desc2, $ruta,$ID)  == true) {
        echo '<script language="javascript">alert("Se ha modificado  el producto correctamente");</script>';
    header('refresh: 0; url=mostrar_prod.php');
}
}
        else {
            echo '<script language="javascript">alert("Error al modificar el producto");</script>';
            header('refresh: 0;');
        }
} 

}
}

?>



<head>
    <meta charset="UTF-8">

    <title>Modificar Producto </title>
</head>
</body>

</html>