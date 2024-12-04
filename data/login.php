<?php
session_start(); // checando sessão
echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
';
include '../setting/config.php'; // buscando conexão

$user = mysqli_real_escape_string($con, $_POST['username']);
$pass = mysqli_real_escape_string($con, $_POST['password']);

if (empty($user) || empty($pass)) {
    echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Não é permitido que esse formulário contenha campos em branco.</h1><a class='btn btn-danger' href='../login.php'>Volte para tela de login e tente novamente</a></div>";
} else {
  echo  $hashed_pass = hash('sha256', $pass);
    $check = mysqli_prepare($con, "SELECT * FROM usuarios WHERE usuario=? AND senha=?");
    mysqli_stmt_bind_param($check, 'ss', $user, $hashed_pass);
    mysqli_stmt_execute($check);
    $result = mysqli_stmt_get_result($check);
    $ad = mysqli_fetch_assoc($result);
    /////////////////////////////////
    if ($ad) {
        $admincheck = $ad['usuario'];
       echo  $passcheck = $ad['senha'];
        $idcheck = $ad['id'];
        $idcheckEmpresa = $ad['id_empresa'];

        $checkEmpresa = mysqli_prepare($con, "SELECT * FROM empresas WHERE id=?");
        mysqli_stmt_bind_param($checkEmpresa, 'i', $idcheckEmpresa);
        mysqli_stmt_execute($checkEmpresa);
        $resultEmpresa = mysqli_stmt_get_result($checkEmpresa);
        $empresa = mysqli_fetch_assoc($resultEmpresa);

        if ($empresa) {
            $statusEmpresa = $empresa['status'];

            if ($hashed_pass == $passcheck) {
                if ($statusEmpresa == "ativo") {
                    $_SESSION['user_marmo'] = $admincheck;
                    $_SESSION['admin_id'] = $idcheck;
                    $_SESSION['empresa_id'] = $idcheckEmpresa;
                    header('location: ../admin.php');
                } else {
                    header('location: ../pendente.php');
                }
            } else {
                echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Essa Senha está diferente.</h1><a class='btn btn-danger' href='../login.php'>Volte para tela de login e tente novamente</a></div>";
            }
        } else {
            echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Erro ao verificar a empresa.</h1><a class='btn btn-danger' href='../login.php'>Volte para tela de login e tente novamente</a></div>";
        }
    } else {
        echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Esse administrador não existe.</h1><a class='btn btn-danger' href='../login.php'>Volte para tela de login e tente novamente</a></div>";
    }
}
?>

