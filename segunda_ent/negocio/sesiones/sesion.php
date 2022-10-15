<?php
    error_reporting(0);
    session_start();
    $sesion_i = $_SESSION['session_username'];

    
    if ($sesion_i == null ||  $sesion_i = "") {
      $ola;
   
  } 
  else {
    ?>
  <h2> Bienvenido, <span> <?php  echo $_SESSION['session_username'];?> ! </span> </h2>
  <?php

}
?>