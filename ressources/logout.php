<?php
session_start();
unset($_SESSION['first_name']);
session_destroy();
header('location: ./login.php');
?>