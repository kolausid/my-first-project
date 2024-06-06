<?php
session_start();
    $_SESSION['auth'] = null;
    $_SESSION['reg'] = null;
header('Location: day36Regis.php');
die();
?>