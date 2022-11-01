<?php
require_once("../negocio/usuario/miapp_user.php");
$sesion_i = $_SESSION['session_username'];

 if(existe_jefe($sesion_i)==true){

 } else{

    echo '
    <script language="javascript">
    alert("No  tienes el rol necesario");
    </script>
    ';
    header('refresh: 0; url=../productos/pags/index.php');
    die();
 }
?>