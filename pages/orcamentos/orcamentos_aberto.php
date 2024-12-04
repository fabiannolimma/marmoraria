<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h4> Orçamentos Abertos</h4>        
        </div>

        <div class="col-sm-12">
        <table id="tableuser" class="table table-bordered" style="width:100%">
                    <thead>
                        <th>Referências do Orçamento</th>
                        <th>Nome Cliente</th>
                        <th>Valor do pedido</th>
                        <th>opções</th>
                        
                    </thead>
                    <tbody>
                    <?php
                                $sql1 = "SELECT DISTINCT id_orcamento,id_admin,cliente_id FROM orcamento WHERE situacao='aberto'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td>(<?php echo $rowp1['id_orcamento']; ?>) Feito por <strong><?php echo $rowp1['id_admin']; ?></strong></td>
                                    <td><?php echo $rowp1['cliente_id']; ?></td>
                                    <td>
                                        R$ <?php 
                                        $sql2 = "SELECT SUM(total),SUM(desconto) FROM orcamento WHERE id_orcamento='". $rowp1['id_orcamento'] ."' AND situacao='aberto'";
                                        $result2 = mysqli_query($con, $sql2);
                                        while ($rowp2 = mysqli_fetch_array($result2)) {
                                       $total = $rowp2['SUM(total)'];
                                       $desconto  =$rowp2['SUM(desconto)'];
                                       echo $geral = $total + $desconto;
                                        }
                                       ?>
                                </td>
                                    <td>
                                    <a href="?page=ver_orcamento&&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=prazo" class="btn btn-info"> A Prazo</a>
                                    <a href="?page=ver_orcamento&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=cdebito" class="btn btn-primary"> C. Debito</a>
                                    <a href="?page=ver_orcamento&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=vpix" class="btn btn-warning">Avista/PIX</a>
                                    <a href="data/salvar_em_fechado.php?idcliente=<?php echo $rowp1['cliente_id']; ?>" class="btn btn-success">Vendas Concluida</a>
                                    <a href="data/apagarorcamento.php?id=<?php echo $rowp1['id_orcamento']; ?>" class="btn btn-danger"> X </a>
                                </td>
                                    </tr>
                              <?php  
                                }
                                ?>
                               
                     </tbody>
                     
                    <thead>
                        <th>Referência Orçamento</th>
                        <th>Nome Cliente</th>
                        <th>Nome Cliente</th>
                        <th>opções</th>
                    </thead>
                </table>
        </div>
    </div>

</div>
