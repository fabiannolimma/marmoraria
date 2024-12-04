<?php 
session_start();// checando sessão
//////////////////////////////////
require_once('setting/config.php');
echo '<style>body { zoom: 0.9; }</style>';
error_reporting(E_ALL);
ini_set("display_errors", 0);
?>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
  }
  th {
    background-color: #f2f2f2;
  }
  .alert-info {
    background-color: #d9edf7;
  }
  .text-danger {
    color: #a94442;
  }
  .btn-primary {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
</style>
<table cellspacing="0" cellpadding="0" border="1" class="print col-sm-12" id="listausers">
        <tr border="0">
        <td class="table-bordered alert-info" colspan="2" border="0"><?php echo $nomeEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2" border="0"><?php echo $ederecoEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2" border="0">ORÇAMENTO 
        <?php  
        if($_GET['tipo'] == "cdebito"){ print('C. DÉBITO'); }
        if($_GET['tipo'] == "vpix"){ print(' A VISTA / PIX'); }
        if($_GET['tipo'] == "prazo"){ print('A PRAZO'); }
        ?>
        </td>
       </tr>
        <tr>
        <td class="table-bordered alert-info" colspan="2"><?php echo $referenciaEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2"><?php echo $foneEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2"><?php echo $emailEmpresa; ?></td>
       </tr>
       <?php
       $sqldata = "SELECT DISTINCT data_criacao FROM orcamento WHERE situacao='aberto' and cliente_id='". $_GET['cliente'] ."'";
       $resuldata = mysqli_query($con, $sqldata);
       while ($rowdata = mysqli_fetch_array($resuldata)) {
  $data = $rowdata['data_criacao'];
}

$sql2 = "SELECT * FROM clientes WHERE nome='". $_GET['cliente'] ."'";
$resultC = mysqli_query($con, $sql2);
while($rowc = mysqli_fetch_assoc($resultC)){
$nome = $rowc['nome'];
$end = $rowc['endereco'];
$n = $rowc['n'];
$ref = $rowc['referencia'];
$cid = $rowc['cidade'];
$bairro = $rowc['bairro'];
$cep = $rowc['cep'];
$cpf = $rowc['cpf'];
$tel = $rowc['telefone'];  


}       
       ?>
        <tr>
        <td class="table-bordered">Cliente:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $nome; ?></strong></td>
        <td class="table-bordered">Fone:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $tel; ?></strong></td>
       </tr>
       <tr>
        <td class="table-bordered">Endereço:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $end; ?>, <?php echo $n;?></strong></td>
        <td class="table-bordered">Bairro:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $bairro; ?></strong></td>
       </tr>
       <tr>
        <td class="table-bordered">P. refer:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $ref; ?></strong></td>
        <td class="table-bordered">Data:</td>
        <td colspan="2" class="table-bordered"><strong><?php echo $data; ?></strong></td>
       </tr>
       <tr>
        <td class="table-bordered">Cidade:</td>
        <td class="table-bordered"><strong><?php echo $cid; ?></strong></td>
        <td class="table-bordered">CPF:</td>
        <td class="table-bordered"><strong><?php echo $cpf; ?></strong></td>
        <td class="table-bordered">CEP:</td>
        <td class="table-bordered"><strong><?php echo $cep; ?></strong></td>
       </tr>
<tr class="alert-info">
                        <th>Descrição Item </th>
                        <th>Quantidade</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Preço Unit</th>
                        <th>Preço Geral</th>
 </tr>                       
                    <tbody>
                    <?php
                     $sql1 = "SELECT *FROM orcamento WHERE situacao='aberto' and cliente_id='". $_GET['cliente'] ."'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $rowp1['produto']; ?></td>
                                    <td><?php echo $rowp1['quant']; ?></td>
                                    <td><?php echo $rowp1['comp']; ?></td>
                                    <td><?php echo $rowp1['larg']; ?></td>
                                    <td>R$<?php 
                                    $unit = $rowp1['total'] / $rowp1['quant'];
                                    echo  $unit; ?></td>
                                    <td>R$<?php echo $rowp1['total'] + $rowp1['desconto'] ; ?></td>
                                    </tr>
                              <?php  
                                }
                                ?>

                                 <tr>
                                 <?php 
                                       $sql3 = "SELECT SUM(total),SUM(desconto),SUM(quant) FROM orcamento WHERE cliente_id='". $_GET['cliente'] ."' AND situacao='aberto'";
                                       $result3 = mysqli_query($con, $sql3);
                                       while ($rowp3 = mysqli_fetch_assoc($result3)) {
                                       $Total = $rowp3['SUM(total)'];
                                       $desco = $rowp3['SUM(desconto)'];
                                       $quantid = $rowp3['SUM(quant)'];
                                        }
                                        
                                        ////////////////////////
                                      if($_GET['tipo'] == "cdebito"){
                                       $perc = (($Total+$desco) * 5 ) / 100;
                                       $deb = number_format($perc,1,'.','');
                                       $desco1 = 0;
                                       $descontM = $desco1;
                                       $avista = 0;
                                       $preco = $Total + $perc;
                                      }
                                      if($_GET['tipo'] == "vpix"){
                                        $deb = 0;
                                        $preco = $Total;
                                        $avista = $Total;
                                        $descontM = $desco; 
                                      }
                                        if($_GET['tipo'] == "prazo"){
                                         $deb = 0;
                                         $preco = $Total+$desco;
                                         $avista = 0;
                                         $descontM = 0; 
                                      }
                                      
                                        /////////////

                                       ?>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">A Prazo:</td>
        <td class="table-bordered">R$<?php echo $Total + $desco; ?></td>
       </tr>
       <tr>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">C. Débito:</td>
        <td class="table-bordered">R$<?php echo $deb; ?></td>
       </tr>
       <tr>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">Desconto:</td>
        <td class="table-bordered text-danger">R$ -<?php echo $descontM; ?></td>
       </tr>
       <tr>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">A Vista:</td>
        <td class="table-bordered">R$<?php echo $avista; ?></td>
       </tr>
       <tr>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">Entrada:</td>
        <td class="table-bordered">R$0</td>
       </tr>
       <tr>
        <td colspan="4" class="table-bordered"></td>
        <td class="table-bordered alert-info">Total:</td>
        <td class="table-bordered alert-info"><strong>R$<?php echo number_format($preco,2,'.','.'); ?></strong></td>
       </tr>
                     </tbody>

                </table>
          <button onclick="window.print();" class="btn btn-primary">Imprimir</button>

          <script>
            window.onbeforeprint = function() {
              document.querySelector('link[media="print"]').media = 'all';
              document.body.style.margin = '0';
              document.body.style.padding = '0';
              document.body.style.pageBreakBefore = 'always';
              document.body.style.pageBreakAfter = 'always';
              document.body.style.pageBreakInside = 'avoid';
              document.body.style.size = 'A4 portrait';
            };
            window.onafterprint = function() {
              document.querySelector('link[media="print"]').media = 'print';
              document.body.style.margin = '';
              document.body.style.padding = '';
              document.body.style.pageBreakBefore = '';
              document.body.style.pageBreakAfter = '';
              document.body.style.pageBreakInside = '';
              document.body.style.size = '';
            };

          window.onload = splitTable;
          </script>