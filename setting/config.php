<?php
//setting data bd 
$server = "localhost";
$bd = "marmoraria";
$pass = "";
$user = "root";
/////////////////////////////////////
//setting connection db
// setting site
$namesite = "Gerenciador";
$descsite = "gerenciar Marmoraria.";
$url = "marmoraria";
$metasite = "marmoraria, pedra, granito";
$footer = "Software produzido por Sistemas FL - Copyright ".date('Y');
$versão = "0.0.2";
$subversão = "alfa";
$version = "<span class='label label-info'>Versão ".$versão."-".$subversão."</span>";
///////////////////////////////////////////////////////////////
$nomeEmpresa = "MARMORARIA TESTE DE POBRE";
$ederecoEmpresa = "AV. SEI LA DE ONDE CHEGO , 1234";
$referenciaEmpresa = "DO LADO DA PRÓXIMA ESQUINA";
$emailEmpresa ="EMPRESA@CAGANDOEANDANDO.COM";
$foneEmpresa = "(00)0000-0000";

$con = mysqli_connect($server, $user, $pass, $bd);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//////////////////////////////////////////////////
/// funcões para porcentagem /////////////////////
// Função para achar porcentagem de ganho em cada pedra cadastrada
function porcentagem_nx ( $parcial, $total ) {
    return  $total * ($parcial/100);
}
//////////////////////////////////////////////////
