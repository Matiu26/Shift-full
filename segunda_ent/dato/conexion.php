<?php

function conectar(){
    $user="root";
    $pass= "Mateobarsa04";
    $server="localhost";
    $db= "SISRDdb";
    $con=mysqli_connect($server,$user,$pass,$db);
 
    
    return $con;
    }
    

$con= conectar();
// if (isset($con)) {
// echo "se realizo correctamente la conexion";
// }
