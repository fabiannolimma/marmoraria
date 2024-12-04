      <div class="row content">
    <div class="row">
        <div id ="imprimir" class="table col-sm-12">
            
        <table cellspacing="0" cellpadding="0" border="0" class="print col-sm-12" id="listausers">
        <tr>
        <td class="table-bordered alert-info" colspan="2"><?php echo $nomeEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2"><?php echo $ederecoEmpresa; ?></td>
        <td class="table-bordered alert-info" colspan="2">ORÇAMENTO 
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
                                       $preco = $Total + $desco + $deb;
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
        </div>
        <div class="text-right">
          <a href="?page=orcamento_aberto" class="btn btn-info">Voltar </a>
          <a href="imprimir.php?cliente=<?php echo $_GET['cliente']; ?>&tipo=<?php echo $_GET['tipo'] ?>" class="btn btn-primary"><i class="fa fa-print"></i> IMPRIMIR </button></a>
                            </div>