<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    session_start(); // checando sessão
    // buscando conexão
    include('../setting/config.php'); 
    //error_reporting(E_ALL);
    //ini_set("display_errors", 1);
    $id = $_GET['id'];
    $preco = $_GET['preco'];
    $tipo = $_GET['tipo'];
    $criadoEm = date('d-m-Y');  //buscando dados do formulário
    /////////////////////////////////////////////////


  $sql ="update vendas set 
                        data_criacao='".$criadoEm."',  
                        situacao='quitada',
                        Tipo_de_pag='" . $tipo . "',
                        Preco_final='" . $preco . "'
                        where id_orcamento='".$id."'";
        $update = mysqli_query($con, $sql);
  /////////////////////////////////////
    ///////////////////////////////////////////////// 
    echo'   <center>
     <h2>Venda concluida! Você poderá encontra-lo em vendas agora.</h2>
     <a href="../admin.php?page=vendas" class="btn btn-success">Ir a vendas finalizadas.</a>
      ou 
      <a href="../admin.php?page=orcamento_aberto" class="btn btn-info">Ver Orçamentos abertos.</a>

    </center>
    ';

    ////////////////////////////////////////////////  
    ?>