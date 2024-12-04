<?php 
session_start(); // checando sessão
$logout = isset($_GET['logout']) ? $_GET['logout'] : "";

if ($logout == 1)
{
unset($_SESSION['user_marmo']);
header('location: ../index.php');
}
?>