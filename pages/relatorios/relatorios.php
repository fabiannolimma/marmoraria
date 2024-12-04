<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center" style="color:#ffff;">Relatórios Gerais</h2>
        </div>
        <ul class="nav nav-tabs">
  <li class="active col-sm-6 text-center"><a class="btn" data-toggle="tab" href="#orcamentos">Orçamentos</a></li>
  <li class="col-sm-6 text-center"><a class="btn" data-toggle="tab" href="#vendas">Vendas</a></li>
</ul>
<br />
<div class="tab-content">
  <div id="orcamentos" class="tab-pane fade in active">
  <table id="tableuser" class="table table-bordered" style="width:100%">
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc.</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                    <tbody>
                    <?php
                            
                                $result1 = mysqli_query($con, $sqlOrcamento);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <>
                                    <td><?php echo $rowp1['ID']; ?></td>
                                    <td><?php echo $rowp1['cliente_id']; ?></td>
                                    <td><?php echo $rowp1['produto']; ?></td>
                                    <td>R$<?php echo number_format($rowp1['preco_unit'], 2, '.', ''); ?></td>
                                    <td><?php echo $rowp1['quant']; ?></td>
                                    <td><?php echo $rowp1['comp']; ?></td>
                                    <td><?php echo $rowp1['larg']; ?></td>
                                    <td>R$<?php echo number_format($rowp1['quantM'], 2, '.', ''); ?></td>
                                    <td class="text-danger"> - R$<?php echo number_format($rowp1['desconto'], 2, '.', ''); ?> </td>
                                    <td>R$<?php echo number_format($rowp1['acab'], 2, '.', ''); ?></td>
                                    <td>R$<?php echo number_format($rowp1['acresc'], 2, '.', ''); ?></td>
                                    <td>R$<?php echo number_format($rowp1['total'], 2, '.', ''); ?></td>
                                    <?php
                                    if($rowp1['situacao'] == "pendente"){
                                $situ = "label label-danger";
                                    }else{
                                $situ = "label label-success";
                                    }
                                    ?>
                                    <td><span class="<?php echo $situ; ?>"><?php echo $rowp1['situacao']; ?></span></td>
                              <?php  
                                }
                                ?>    
                                 </tr>
                     </tbody>
                    <thead>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc.</th>
                        <th>Total</th>
                        <th>Situação</th>
                    </thead>
                </table>
  </div>
  <div id="vendas" class="tab-pane fade">
  <table id="tableuser1" class="table table-bordered" style="width:100%">
                    <thead>
                        <th>ID Orc.</th>
                        <th>Cliente</th>
                        <th>Desc</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc.</th>
                        <th>Total</th>
                        <th>P. Final</th>
                        <th>Data</th>
                        <th>Situação</th>
                    </thead>
                    <tbody>
                    <?php
                            
                                $result1 = mysqli_query($con, $sqlVendas);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $rowp1['id_orcamento']; ?></td>
                                    <td><?php echo $rowp1['cliente_id']; ?></td>
                                    <td><?php echo $rowp1['produto']; ?></td>
                                    <td>R$<?php echo number_format($rowp1['preco_unit'], 2, '.', ''); ?></td>
                                    <td><?php echo $rowp1['quant']; ?></td>
                                    <td><?php echo $rowp1['comp']; ?></td>
                                    <td><?php echo $rowp1['larg']; ?></td>
                                    <td>R$<?php echo number_format($rowp1['quantM'], 2, '.', ''); ?></td>
                                    <td class="text-danger"> - R$<?php echo number_format($rowp1['desconto'], 2, '.', ''); ?> </td>
                                    <td>R$<?php echo number_format($rowp1['acab'], 2, '.', ''); ?></td>
                                    <td>R$<?php echo number_format($rowp1['acresc'], 2, '.', ''); ?></td>
                                    <td>R$<?php echo number_format($rowp1['total'], 2, '.', ''); ?></td>
                                    <td>R$<?php echo number_format($rowp1['preco_final'], 2, '.', ''); ?></td>
                                    <td><?php echo $rowp1['data_criacao']; ?></td>
                                    <?php
                                    if($rowp1['situacao'] == "pendente"){
                                $situ = "label label-danger";
                                    }else{
                                $situ = "label label-success";
                                    }
                                    ?>
                                    <td><span class="<?php echo $situ; ?>"><?php echo $rowp1['situacao']; ?></span></td>
                                 </tr>
                              <?php  
                                }
                                ?>    
                     </tbody>
                    <thead>
                        <th>ID Orc.</th>
                        <th>Cliente</th>
                        <th>Descrição</th>
                        <th>P.Unit</th>
                        <th>Quant.</th>
                        <th>Comp</th>
                        <th>Larg</th>
                        <th>Q. M²</th>
                        <th>Desc.</th>
                        <th>Acab.</th>
                        <th>Acresc.</th>
                        <th>Total</th>
                        <th>P. Final</th>
                        <th>Data</th>
                        <th>Situação</th>
                    </thead>
                </table>
  </div>

</div>

        </div>
    </div>