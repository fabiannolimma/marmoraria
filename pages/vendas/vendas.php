<div class="row content">
    <div class="row">
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
                                $sql1 = "SELECT DISTINCT id_orcamento,id_admin,cliente_id FROM vendas  WHERE id_empresa='". $_SESSION['empresa_id'] ."' AND situacao='pendente'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td>Feito por <?php echo $rowp1['id_admin']; ?> <span class="badge badge-primary"><?php echo $rowp1['id_orcamento']; ?></span></td>
                                    <td><?php echo $rowp1['cliente_id']; ?></td>
                                    <td>
                                        R$ <?php 
                                        $sql2 = "SELECT SUM(total) FROM vendas WHERE id_orcamento='". $rowp1['id_orcamento'] ."' AND situacao='pendente'";
                                        $result2 = mysqli_query($con, $sql2);
                                        while ($rowp2 = mysqli_fetch_array($result2)) {
                                    echo number_format($rowp2['SUM(total)'], 2, ',', '.');
                                        } 
                                       ?>
                                </td>
                                    <td>
                                    <a href="?page=ver_vendas&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=prazo" class="btn btn-info"> A Prazo</a>
                                    <a href="?page=ver_vendas&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=cdebito" class="btn btn-primary"> C. Debito</a>
                                    <a href="?page=ver_vendas&cliente=<?php echo $rowp1['cliente_id']; ?>&tipo=vpix" class="btn btn-warning">Avista/PIX</a>
                                    <a href="data/apagar_vendas.php?id=<?php echo $rowp1['id_orcamento']; ?>" class="btn btn-danger"> X </a>
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