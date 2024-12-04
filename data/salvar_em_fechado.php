<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    // buscando conexão
    session_start();
    include '../setting/config.php';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    /////////////////////////////////////////////////
    $cliente = $_GET['idcliente'];
    $criadoEm = date('d-m-Y');
    $ref_Orcamento = mt_rand('10000','99999');    //buscando dados do formulário      
    /////////////////////////////////////////////////
    $buscaTemp = "select * from orcamento where cliente_id='{$cliente}'";
    $verTemp = mysqli_query($con,$buscaTemp);
    while($temp = mysqli_fetch_assoc($verTemp)){
    /////////////////////////////////////////////////////////////////
       $sql =" insert into vendas (id_orcamento,
                                      pedraRef,
                                      produto,
                                      preco_unit,
                                      quant,
                                      comp,
                                      larg,
                                      quantM,
                                      desconto,
                                      acab,
                                      acresc,
                                      total,
                                      cliente_id,
                                      id_admin,
                                      data_criacao,
                                      id_empresa,
                                      situacao)
                                      values
                                      ('". $ref_Orcamento ."',
                                       '". $temp['pedraRef'] ."',
                                       '". $temp['produto'] ."',
                                       '". $temp['preco_unit'] ."',
                                       '". $temp['quant'] ."',
                                       '". $temp['comp'] ."',
                                       '". $temp['larg'] ."',
                                       '". $temp['quantM'] ."',
                                       '". $temp['desconto']."',
                                       '". $temp['acab'] ."',
                                       '". $temp['acresc'] ."',
                                       '". $temp['total'] ."',
                                       '". $temp['cliente_id'] ."',
                                       '". $temp['id_admin'] ."',
                                       '". $criadoEm ."',
                                       '" . $_SESSION['empresa_id'] . "',
                                       'pendente')"; 
     ///////////////////////////////////////////////////////////////
     $salvaOrc = mysqli_query($con,$sql);
     $lastTemp = $temp; // Store the last $temp value
    } 
    ///////////////////////////////////////////////// 
    $sqlapaga = "DELETE FROM orcamento WHERE ID='" .$lastTemp['ID']. "'";    
    $apagar = mysqli_query($con, $sqlapaga);
    /////////////////////////////////////////////////
    if($salvaOrc){
   ///////////////////////////////////////////////////////////////
   $quantidadeM = $lastTemp['comp'] * $lastTemp['larg'];
   $QuantM = $quantidadeM * $lastTemp['quant'];
   $dimPedra = "update pedras set Quantidade = Quantidade - '$QuantM' where ReferenciaN='". $lastTemp['pedraRef'] ."'";// Diminuindo a quantidade de pedras
   $atualizaPedra = mysqli_query($con, $dimPedra);
       /////////////////////////////////////
  
    echo'   <center>
     <h2>Orçamento Marcado com vendido com sucesso! Você poderá encontra-lo em orçamentos fechamos agora.</h2>
     <a href="../admin.php?page=vendas" class="btn btn-success">Ir a vendas finalizadas.</a>
      ou 
      <a href="../admin.php?page=orcamento_aberto" class="btn btn-info">Ver Orçamentos abertos novamente.</a>

    </center>
    ';
    }else{
       echo'
       <center>
       <h2>Ops! tem algo errado.</h2> 
       <a href="../admin.php?page=orcamento_aberto" class="btn btn-danger">Voltar a Orçamentos abertos.</a>
       </center>
       ';    
    }
    ////////////////////////////////////////////////  
    ?>