<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    session_start(); // checando sessão
    include('../setting/config.php'); // buscando conexão
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $cliente = $_GET['idcliente'];
    $criadoEm = date('d-m-Y');
    $ref_Orcamento = mt_rand('10000','99999');    //buscando dados do formulário
    /////////////////////////////////////////////////
        $buscaCliente = "select * from clientes where id='".$cliente."'";
        $verCliente = mysqli_query($con,$buscaCliente);
        while($vercli = mysqli_fetch_assoc($verCliente)){
        $nCliente = $vercli['nome'];
         }
    /////////////////////////////////////////////////
    $buscaTemp = "select * from temp_orcamento where cliente_id='".$nCliente."'";
    $verTemp = mysqli_query($con,$buscaTemp);
    while($temp = mysqli_fetch_assoc($verTemp)){

       $sql =" insert into orcamento (id_orcamento,
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
                                       'aberto')";

     $salvaOrc = mysqli_query($con,$sql);


     /////////////////////////////////////
     $sqlapaga = "DELETE FROM temp_orcamento WHERE id='" .$temp['id']. "'";    
     $apagar = mysqli_query($con, $sqlapaga);

    }  
     

    
echo'   <center>
     <h2>Orçamento liberado! Você poderá encontra-lo em orçamentos abertos.</h2>
     <a href="../admin.php?page=novo_orcamento&cliente='.$nCliente.'" class="btn btn-success">Inicar novo orçamento.</a>
      ou 
      <a href="../admin.php?page=orcamento_aberto" class="btn btn-info">Ver Orçamentos abertos.</a>

 </center>
';
  
    ?>
