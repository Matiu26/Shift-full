<?php
session_start();
$sesion_i = $_SESSION['session_username'];

if ($sesion_i == null ||  $sesion_i = "") {

    echo '
    <script language="javascript">
    alert("No has iniciado sesión");
    </script>
    ';
    header('refresh: 0; url=../negocio/usuario/login.php');
    die();
}

?>