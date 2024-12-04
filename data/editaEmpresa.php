<?php
// Inicia a sessão
session_start();
include('../setting/config.php');
////////////////////////////////
if (!isset($_SESSION['user_marmo'])) {
    header('location: ../login.php');
}
// Verifica se a sessão da empresa está definida
if (!isset($_SESSION['empresa_id'])) {
    die("Erro: Sessão da empresa não definida.");
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $cnpj = mysqli_real_escape_string($con, $_POST['cnpj']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $bairro = mysqli_real_escape_string($con, $_POST['bairro']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $cep = mysqli_real_escape_string($con, $_POST['cep']);
    $telefone_fixo = mysqli_real_escape_string($con, $_POST['telefone_fixo']);
    $celular = mysqli_real_escape_string($con, $_POST['celular']);
    $taxa_cartao = mysqli_real_escape_string($con, $_POST['taxa_cartao']);

    // Pega o ID da empresa da sessão
    $empresa_id = $_SESSION['empresa_id'];

    // Atualiza os dados na tabela empresas
    $sql = "UPDATE empresas SET 
                NomeEmpresa = '$nome',
                empresa_cnpj = '$cnpj',
                empresa_email = '$email',
                empresa_endereco = '$endereco',
                empresa_bairro = '$bairro',
                empresa_numero = '$numero',
                empresa_cep = '$cep',
                empresa_tel1 = '$telefone_fixo',
                empresa_tel2 = '$celular',
                fee_card = '$taxa_cartao'
            WHERE id = '$empresa_id'";

    if (mysqli_query($con, $sql)) {
        echo "Dados da empresa atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($con);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>