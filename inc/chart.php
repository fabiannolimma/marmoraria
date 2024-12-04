<?php 

$sql = "SELECT * FROM vendas WHERE YEARWEEK(data_criacao, 1) = YEARWEEK(CURDATE(), 1)";
$stmt = mysqli_query($con, $sql);

// Cria o array primário
$dados = array();

// Laço dos dados
while ($ln = mysqli_fetch_array($stmt)) {
    // Cria o array secundário, onde estarão os dados.
    $temp_hora = array();
    $temp_hora['data_criacao'] = $ln['data_criacao'];
    $temp_hora['quantidade'] = $ln['quant']; // Supondo que há uma coluna 'quantidade' na tabela 'vendas'

    // Recebe no array principal, os dados.
    $dados[] = $temp_hora;
}

// Transforma os dados em JSON
$jsonTable = json_encode($dados);

// Echo o JSON para ser usado no gráfico
echo $jsonTable;

?>