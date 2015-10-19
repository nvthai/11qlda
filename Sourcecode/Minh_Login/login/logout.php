<?php
session_start();

if (isset($_SESSION['myname'])) {

unset($_SESSION['myname']); 

}

header('Location: index.php');
?>