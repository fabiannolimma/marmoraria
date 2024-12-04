<?php
session_start(); // checando sessão
include  'setting/config.php';
$checkEmpresa = mysqli_query($con, "select * from empresas where id='".$_SESSION['empresa_id']."'"); 
while($empresa = mysqli_fetch_assoc($checkEmpresa)){
    $statusEmpresa = $empresa['status'];
    }

if(isset($_SESSION['user_marmo']) && $statusEmpresa == "ativo"){
header('location: admin.php');
}else if($statusEmpresa == "inativo"){
header('location: pendente.php');
}else{
header('location: login.php');
}

?>