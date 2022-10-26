<?php

function cone(){
    $user="root";
    $pass= "Mateobarsa04";
    $server="localhost";
    $db= "SISRDdb";
    $con=mysqli_connect($server,$user,$pass,$db);
 
    
    return $con;
    }
    

$con= cone();
// if (isset($con)) {
// echo "se realizo correctamente la conexion";
// }
