<?php
// selecionando dados do usuário logado
$UsuariosEmpresa = "SELECT * FROM usuarios WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando acabamentos
$sqlAcabamentos = "SELECT * FROM acabamentos  WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando pedras
$sqlPedra = "SELECT * FROM pedras  WHERE id_empresa='".$_SESSION['empresa_id']."'";
// secelecionando clientes
$sqlClientes = "SELECT * FROM clientes  WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando produtos
$sqlProduts = "SELECT * FROM produto  WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando relatório de orçamento empresa
$sqlOrcamento = "SELECT * FROM orcamento WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando relatório de vendas empresa
$sqlVendas = "SELECT * FROM vendas WHERE id_empresa='".$_SESSION['empresa_id']."'";
// selecionando relatório de empresa
$sqlEmpresa = "SELECT * FROM empresas WHERE id='".$_SESSION['empresa_id']."'";
$openEmpresa = mysqli_query($con,$sqlEmpresa);
while($root = mysqli_fetch_assoc($openEmpresa)){
$id_empresa = $root['id'];
$empresaNome = $root['NomeEmpresa'];
$empresaCnpj = $root['empresa_cnpj'];
$empresaEmail = $root['empresa_email'];
$empresaEndereco = $root['empresa_endereco'];
$empresaBairro = $root['empresa_bairro'];
$empresaNumero = $root['empresa_numero'];
$empresaCep = $root['empresa_cep'];
$empresaTel1 = $root['empresa_tel1'];
$empresaTel2 = $root['empresa_tel2'];
$empresaCard = $root['fee_card'];
$empresaAtivacao = $root['chave_ativacao'];
$empresaStatus = $root['status'];
}
// selecionando dados do usuário logado
$sqlUsuario = "SELECT * FROM usuarios WHERE usuario='".$_SESSION['user_marmo']."' AND id_empresa='".$_SESSION['empresa_id']."'";
$openUsuario = mysqli_query($con, $sqlUsuario);
if ($userM = mysqli_fetch_assoc($openUsuario)) {
    $usuarioId = $userM['id'];
    $usuarioNome = $userM['nome'];
    $usuarioEmail = $userM['email'];
    $usuarioNivel = $userM['nivel'];
    $usuarioSenha = $userM['senha'];
// Adicione outros campos conforme necessário
}
?>