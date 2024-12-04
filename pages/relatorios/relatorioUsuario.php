<?php
// selecionando relatório de orçamento empresa
$sqlOrcamentoU = "SELECT * FROM orcamento WHERE id_empresa='".$_SESSION['empresa_id']."' AND cliente_id='". $_GET['idcliente'] ."'";
// selecionando relatório de vendas empresa
$sqlVendasU = "SELECT * FROM vendas WHERE id_empresa='".$_SESSION['empresa_id']."' AND cliente_id='". $_GET['idcliente'] ."'";
?>
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-light">Relatórios de <?php echo $_GET['idcliente']; ?></h2>
        </div>
        <ul class="nav nav-tabs">
  <li class="active col-sm-6 text-center"><a class="btn btn-warning" data-toggle="tab" href="#orcamentos"> Orçamentos </a></li>
  <li class="col-sm-6 text-center"><a class="btn btn-success" data-toggle="tab" href="#vendas"> Vendas </a></li>
</ul>
<br />
<div class="tab-content">
  <div id="orcamentos" class="tab-pane fade in active">
  <table id="tableuser" class="table table-bordered" style="width:100%">
                    <thead>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc. 1</th>
                        <th>Acresc. 2</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                    <tbody>
                    <?php
                            
                                $result1 = mysqli_query($con, $sqlOrcamentoU);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $rowp1['id']; ?></td>
                                    <td><?php echo $rowp1['produto']; ?></td>
                                    <td><?php echo $rowp1['preco_unit']; ?></td>
                                    <td><?php echo $rowp1['quant']; ?></td>
                                    <td><?php echo $rowp1['comp']; ?></td>
                                    <td><?php echo $rowp1['larg']; ?></td>
                                    <td><?php echo $rowp1['quantM']; ?></td>
                                    <td class="text-danger"> - R$<?php echo $rowp1['desconto']; ?> </td>
                                    <td>R$<?php echo $rowp1['acab']; ?></td>
                                    <td>R$<?php echo $rowp1['acresc1']; ?></td>
                                    <td>R$<?php echo $rowp1['acresc2']; ?></td>
                                    <td>R$<?php echo $rowp1['total']; ?></td>
                                    <td><?php echo $rowp1['situacao']; ?></td>
                                 </tr>
                              <?php  
                                }
                                ?>    
                     </tbody>
                    <thead>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc. 1</th>
                        <th>Acresc. 2</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                </table>
  </div>
  <div id="vendas" class="tab-pane fade">
  <table id="tableuser" class="table table-bordered" style="width:100%">
  <thead>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc. 1</th>
                        <th>Acresc. 2</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                    <tbody>
                    <?php
                            
                                $result2 = mysqli_query($con, $sqlVendasU);
                                while ($rowp2 = mysqli_fetch_array($result2)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $rowp2['id']; ?></td>
                                    <td><?php echo $rowp2['produto']; ?></td>
                                    <td><?php echo $rowp2['preco_unit']; ?></td>
                                    <td><?php echo $rowp2['quant']; ?></td>
                                    <td><?php echo $rowp2['comp']; ?></td>
                                    <td><?php echo $rowp2['larg']; ?></td>
                                    <td><?php echo $rowp2['quantM']; ?></td>
                                    <td class="text-danger"> - R$<?php echo $rowp2['desconto']; ?> </td>
                                    <td>R$<?php echo $rowp2['acab']; ?></td>
                                    <td>R$<?php echo $rowp2['acresc1']; ?></td>
                                    <td>R$<?php echo $rowp2['acresc2']; ?></td>
                                    <td>R$<?php echo $rowp2['total']; ?></td>
                                    <?php
                                    if($rowp2['situacao'] == "pendente"){
                                $situ = "label label-danger";
                                    }else{
                                $situ = "label label-success";
                                    }
                                    ?>
                                    <td><span class="<?php echo $situ; ?>"><?php echo $rowp2['situacao']; ?></span></td>
                                 </tr>
                              <?php  
                                }
                                ?>    
                     </tbody>
                    <thead>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc. 1</th>
                        <th>Acresc. 2</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                </table>
  </div>

</div>

        </div>
    </div>