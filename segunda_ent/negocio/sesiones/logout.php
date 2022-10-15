<?php
session_start();

unset($_SESSION['session_username']);
session_destroy();
header('refresh: 0; url=../../../src/index.php');
?>