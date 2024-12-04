    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    session_start(); // checando sessão
    include('../setting/config.php'); // buscando conexão
    //error_reporting(E_ALL);
    //ini_set("display_errors", 1);
    //buscando dados do formulário
    /////////////////////////////////////////////////
    $vendedor = $_POST['idadmin']; // nome do produto
    $cliente = $_POST['idcliente']; // nome do produto
    $produto = $_POST['Produtos']; // nome do produto
    $idPedra = $_POST['pedras']; // cor e tipo de pedra
    $quant = $_POST['quantidade']; // quantidade do produto
    $comprimento = $_POST['comprimento']; // comprimento do produto
    $largura = $_POST['largura']; //largurra do produto
    $acabamento = $_POST['acabamento'];// tipo e valor de acabamento
    $valorAcabamento = $_POST['valoracabamento'];// tipo e valor de acabamento
    $desconto = $_POST['desconto']; // desconto considerado ou não
    $acrescimo1= $_POST['acresc1'];// acrescimo 1
        /////////////////////////////////////////////////
        $buscaCliente = "select * from clientes where id='$cliente'";
        $verCliente = mysqli_query($con,$buscaCliente);
        while($vercli = mysqli_fetch_assoc($verCliente)){
        $nCliente = $vercli['nome'];
         }
             /////////////////////////////////////////////////
    $buscaVendedor = "select * from usuarios where id='$vendedor'";
    $vervendor = mysqli_query($con,$buscaVendedor);
    while($verven = mysqli_fetch_assoc($vervendor)){
    $nVendor = $verven['usuario'];
     }
    /////////////////////////////////////////////////
    $buscaProd = "select * from produto where ID='$produto'";
    $verProd = mysqli_query($con,$buscaProd);
    while($verprod = mysqli_fetch_assoc($verProd)){
    $nP = $verprod['Nome'];
     }
    /////////////////////////////////////////////////
    $buscaP = "select * from pedras where ID='$idPedra'";
    $verpedra = mysqli_query($con,$buscaP);
    while($verPed = mysqli_fetch_assoc($verpedra)){
    $pedraRef = $verPed['ReferenciaN'];
    $vm = $verPed['Nome'];
    $vc = $verPed['Cor'];
    $vp = $verPed['valorM'];
    }
    /////////////////////////////////////////////////
    $buscaAc = "select * from acabamentos where ID='$acabamento'";
    $verAcab = mysqli_query($con,$buscaAc);
    while($verac = mysqli_fetch_assoc($verAcab)){ 
    $maior =$verac['maior'];
    $menor =$verac['menor'];
    }
    /////////////////////////////////////////////////
echo "Produto: ".$nP." ".$vc." ".$vm."<br>"; // produto e pedra usada.
$acabamentosMenor =  $largura * $valorAcabamento  * $menor;
$acabamentosMaior =  $comprimento * $valorAcabamento  * $maior;
$acabamentos =  $acabamentosMaior + $acabamentosMenor;
echo "acabamento menor: R$ ".    $acabamentosMenor ."<br>";
echo "acabamento maior:R$ ".   $acabamentosMaior ."<br>";
echo  "total acabamento: R$ ". $acabamentos ."<br>";

$acrescimos = $acrescimo1 + 0;
$quantidadeM = $comprimento * $largura;
$QuantM = $quantidadeM * $quant;
$valorp = $QuantM * $vp ;
echo "Valor sem acabamento: R$". round($valorp,2)  ."<br>";
$valorP = $valorp + $acabamentos;
echo "Valor sem desconto: R$". round($valorP,2)  ."<br>";
$descontos = ($desconto * $valorP ) / 100;
echo "Desconto ". $desconto ."% : R$". round($descontos,2) ."<br>";
$valorFD = $valorP - $descontos;
echo "Valor final : R$". round($valorFD,2) ."<br>";
if($acrescimo1 > 0){
  $calcAcresc01 = $QuantM + $valorFD + $acrescimo1;
  $calcAcresc1 =  ($calcAcresc01 * $acrescimo1) / 100; 
}else{
  $calcAcresc1 = "0";
}
echo "porcentagem de ". $acrescimo1 ."%a adicionar referente a acrescimo 1: R$". round($calcAcresc1,2) ."<br>";
//acrsc =   m2 x valop X %
//acrsc1 =  valorp + acab  * acresc1 
$ac1 = $valorFD + $calcAcresc1;
echo "total final R$". round($ac1,2) ."<br>";
//ac
$ac2 = $ac1;
echo "total geral  R$". round($ac2,2) ."<br>";

   /////////////////////////////////////////////////
   $pegProduto = $nP." ".$vc." ".$vm; // produto e pedra usada.
   $pegQuantidade = $_POST['quantidade']; // quantidade do produto.
   $pegComprimento = $_POST['comprimento']; // comprimento do produto.
   $pegLargura = $_POST['largura']; //largurra do produto.
   $pegAcabamento = $acabamentos;// tipo e valor de acabamento.
   $pegDesconto = $_POST['desconto']; // desconto considerado ou não.
   /////////////////////////////////////////////////
   $pegValorP = $valorP; //Valor final após calculos sem desconto.
   $pegDescontos = $descontos; //Valor final do desconto em porcentagem. 
   $pegaValorDF = $valorFD; // valor final  com ou sem desconto
   $pegaAcresc1 = $calcAcresc1; // valor acrescimo1 em porcentagem
   $pegaAc1 = $ac1; // valor final com ou sem acrescimo1
   //$pegaAcresc2 = $calcAcresc2; // valor acrescimo2 em porcentagem
   $pegaAc2 = $ac2; // valor final sem ou com acrescimo 1 e 2
   /////////////////////////////////////////////////


   $sql =" insert into temp_orcamento (pedraRef,
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
                                      id_empresa)
                                      values
                                      ('". $pedraRef ."',
                                       '". $pegProduto ."',
                                       '". $vp ."',
                                       '". $pegQuantidade ."',
                                       '". $pegComprimento ."',
                                       '". $pegLargura ."',
                                       '". $pegValorP ."',
                                       '".$pegDescontos."',
                                       '". $pegAcabamento ."',
                                       '". $pegaAcresc1 ."',
                                       '". $pegaAc2 ."',
                                       '". $nCliente ."',
                                       '". $nVendor ."',
                                       '" . $_SESSION['empresa_id'] . "')";

     $salvaOrc = mysqli_query($con,$sql);
     
  echo'   <center>
     <h2>Orçamento temporario cadastrado com successo!</h2>
     <a href="../admin.php?page=novo_orcamento&cliente='.$nCliente.'" class="btn btn-success">Cadastrar novo orçamento.</a>

 </center>
';
    ?>
