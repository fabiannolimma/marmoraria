<?php
session_start(); // checando sessão
error_reporting(E_ALL);
ini_set("display_errors", 0);
////////////////////////////////
include('setting/config.php');
////////////////////////////////
if (!isset($_SESSION['user_marmo'])) {
    header('location: login.php');
}
////////////////////////////////
include('inc/mysqls.php');
include('inc/header.php');
////////////////////////////////
?>
    <div class="main">
<?php
$setpage = $_GET['page'];
switch ($setpage) {

    default:
        include "pages/painel.php";
        break;

    case 'painel';
        include "pages/painel.php";
        break;
       //////////////////////////
        // relatórios      //////
        ///////////////////////// 
    case 'relatorios';
        include "pages/relatorios/relatorios.php";
        break;
    case 'relatorio';
        include "pages/relatorios/relatorioUsuario.php";
        break;
        //////////////////////////
        // financeiro      //////
        /////////////////////////
    case 'configuracao';
        include "pages/configuracao.php";
        break;
        case 'gerarnotafiscal';
        include "pages/nfs/gerar_notafiscal.php";
        break;
        //////////////////////////
        // colaboradores     /////
        //////////////////////////
    case 'addColabs';
        include "pages/colabs/add_colabs.php";
        break;
    case 'editaColabs';
        include "pages/colabs/editar_Colabs.php";
        break;
        //////////////////////////
        // tipo de orçamentos ////
        //////////////////////////
    case 'orcamento_aberto';
        include "pages/orcamentos/orcamentos_aberto.php";
        break;
    case 'novo_orcamento';
        include "pages/orcamentos/novo_orcamento.php";
        break;
    case 'ver_orcamento';
        include "pages/orcamentos/ver_orcamento.php";
        break;
        //////////////////////////
        // vendas           //////
        //////////////////////////
        case 'vendasPendentes';
        include "pages/vendas/vendaspendentes.php";
        break;
        case 'vendasQuitadas';
        include "pages/vendas/vendasquitadas.php";
        break;
        case 'ver_vendas';
        include "pages/vendas/vendas.php";
        break;
        //////////////////////////
        // clientes         //////
        //////////////////////////
    case 'add_cliente';
        include "pages/add_cliente.php";
        break;
    case 'editacliente';
        include "pages/editaCliente.php";
        break;
    case 'apagarcliente';
        include "pages/apagarcliente.php";
        break;
        //////////////////////////
        // form add produtos /////
        //////////////////////////
    case 'add_produto';
        include "pages/add_produto.php";
        break;
    case 'editaproduto';
        include "pages/editaProduto.php";
        break;
    case 'apagarproduto';
        include "pages/apagarProduto.php";
        break;
        //////////////////////////
        // form add pedras /////
        //////////////////////////
    case 'add_pedras';
        include "pages/add_pedra.php";
        break;
    case 'editapedra';
        include "pages/editaPedra.php";
        break;
    case 'apagarpedra';
        include "pages/apagarPedra.php";
        break;
        //////////////////////////
        // form add acabamentos /////
        //////////////////////////
    case 'add_acabamento';
    include "pages/add_acabamento.php";
    break;
case 'editaracabamento';
    include "pages/editaracabamento.php";
    break;
case 'apagaracabamento';
    include "pages/apagaracabamento.php";
    break;
}
?>
    </div>
<?php
////////////////////////////////
include('inc/footer.php');
////////////////////////////////
