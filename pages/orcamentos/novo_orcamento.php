<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h4>Novo Orçamento</h4>

            <?php if (!isset($_GET['cliente'])) { ?>
                <div class="form-group col-sm-12">
                    <label for="cliente">Cliente</label>
                    <form action="">
                        <input type="text" id="cliente" name="cliente" onkeyup="showCliente(this.value)" class="form-control">
                    </form>
                    <p>Suggestions: <span id="clientes"></span></p>

                </div>
            <?php } else {
                $check= "SELECT * FROM  clientes WHERE nome='".$_GET['cliente']."'";
                $checkCliente = mysqli_query($con,$check);
                if(mysqli_num_rows($checkCliente) == 0){
            echo "<div class='alert alert-danger text-center'>Cliente não existe por favor tente novamente.<a href='?page=novo_orcamento' class='btn btn-danger'>Reiniciar orçamento</a></div>";
                }else{
             while($row = mysqli_fetch_assoc($checkCliente)){
             $idUser =  $row['id'];
             $nome =  $row['nome'];
             
                ?>
                <div id="Allform">
                    <form class="form-control" method="post" action="data/addTempOrcamento.php">
                    <div class="form-group col-sm-12">
                            <p class="text-lefty"><span class="text-strong">Orçamento para:</span> <?php echo $nome;  ?> </p>
                            <input type="hidden" name="idcliente" value="<?php echo $idUser; ?>" class="form-control" id="idcliente">
                            <input type="hidden" name="idadmin" value="<?php echo $_SESSION['admin_id']; ?>" class="form-control" id="idadmin">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Produtos">Produto</label>
                            <select name="Produtos" class="form-control">
                                <option value="">Selecione o produto:</option>
                                <?php
                                $sql1 = "SELECT * FROM produto";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp = mysqli_fetch_array($result1)) {
                                    echo " <option value='" . $rowp['ID'] . "'>" . $rowp['Nome'] . "</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="pedras">Cor / Pedra</label>
                            <select name="pedras" onchange="showPedras(this.value)" class="form-control">
                                <option value="">Selecione a Pedra/cor:</option>
                                <?php
                                $sql = "SELECT * FROM pedras";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo " <option value='" . $row['ID'] . "'>" . $row['Nome'] . ' / ' . $row['Cor'] . " (R$".$row['valorM'].")</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="quantidade">Quantidade</label>
                            <input type="text" name="quantidade" class="form-control" id="quantidade">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="comprimento">Comprimento</label>
                            <input type="text" name="comprimento" class="form-control" id="comprimento">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="largura">Largura</label>
                            <input type="text" name="largura" class="form-control" id="largura">
                        </div>
                        <div class="form-group col-sm-3">
                        <label for="acabamento">Acabamento:</label>
                            <select name="acabamento" class="form-control">
                                <option>Selecione o acabamento:</option>
                                <?php
                                $sql1 = "SELECT * FROM acabamentos";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp = mysqli_fetch_array($result1)) {
            echo "<option value='" . $rowp['ID'] . "'>" .$rowp['nome'].' ( Maior:'.$rowp['maior'].' | Menor:'.$rowp['menor'].')' .$rowp['valor']. "</option>";
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                        <label for="acabamento">Valor Acabamento:</label>
                        <input type="text" name="valoracabamento" class="form-control" id="valoracabamento">
                           
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="desconto">Desconto (%)</label>
                            <input type="text" name="desconto" class="form-control" value="0" id="desconto">
                        </div>
                        <div class="form-group col-sm-3 text-right">
                            <label for="acresc1"> Acréscimo (%)</label>
                            <input type="text" name="acresc1" class="form-control" value="10" id="acresc1">
                        </div>
                        <div class="form-group col-sm-6 text-left">
                           <div class="alert alert-danger text-center">Acrescimento padrão 10% referente a materias usado, qualsquer novo acréscimo adicionar manualmente.</div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-success col-sm-12">Guardar Orçamento</button>
                        </div>
                        <div class="form-group col-sm-6">
                            <a class="btn btn-info col-sm-12" href="?page=novo_orcamento&cliente=<?= $_GET['cliente']; ?>">Refazer Orçamento</a>
                        </div>
                    </form>
                </div>
            <?php } } } ?>
        </div>
        <!---
        <div class="col-sm-4">
            <div class="well bg-info">
                <h2>Revisar Orçamento</h2>
                <p>Valor m²:R$<span id="pedras"></span></p>
                <script>
                    jQuery('input').on('keyup', function() {
                        var pricP = jQuery('#pedras').val() != '' ? jQuery('#pedras').val() : 0;
                        var quant = jQuery('#quantidade').val() != '' ? jQuery('#quantidade').val() : 0;
                        var comp = jQuery('#comprimento').val() != '' ? jQuery('#comprimento').val() : 0;
                        var larg = jQuery('#largura').val() != '' ? jQuery('#largura').val() : 0;
                        var desc = jQuery('#desconto').val() != '' ? jQuery('#desconto').val() : 0;
                        var acab = jQuery('#acabamento').val() != '' ? jQuery('#acabamento').val() : 0;
                        var ac1 = jQuery('#acresc1').val() != '' ? jQuery('#acresc1').val() : 0;
                        var ac2 = jQuery('#acresc2').val() != '' ? jQuery('#acresc2').val() : 0;
                        var calc = acab.toFixed(2); // preço acabamento
                        //jQuery('#total').val(comp * larg * quant).toFixed(2); //result
                        jQuery('#total').val((comp * larg * quant) * 200).toFixed(2); //preço total do m²
                        //jQuery('#total').val.pricP.toFixed(2);
                    })
                </script>
                <p>Quantidade:<input type="text" id="quant" value="" disabled></p>
                <p>Comprimento: <input type="text" id="com" value="" disabled></p>
                <p>Largura: <input type="text" id="larg" value="" disabled></p>
                <p>Acabamento: <input type="text" id="acab" value="" disabled></p>
                <p>Acréscimos1: <input type="text" id="ac1" value="" disabled></p>
                <p>Acréscimos2: <input type="text" id="ac2" value="" disabled></p>
                <p>Desconto: <input type="text" id="desc" value="" disabled></p>
                <hr style="color:blue; border:3px solid;">

                <p>Valor Total: <input type="text" name="total" id="total" disabled>
                </p>
            </div>
        </div>
---->
        <div class="col-sm-12">
            <?php if (isset($_GET['cliente'])) { ?>
                <h4>Previsão de Orçamento</h4>
                <p class="text-lefty"><span class="text-strong">Cliente:</span><?= $nome; ?></p>
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
                        <th>Acresc</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                    <?php
                                $sql1 = "SELECT * FROM temp_orcamento WHERE cliente_id='".$nome."' and id_empresa='".$_SESSION['empresa_id']."'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($rowp1 = mysqli_fetch_array($result1)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $rowp1['id']; ?></td>
                                    <td><?php echo $rowp1['produto']; ?></td>
                                    <td>R$<?php echo number_format($rowp1['preco_unit'], 2, ',', '.'); ?></td>
                                    <td><?php echo $rowp1['quant']; ?></td>
                                    <td><?php echo $rowp1['comp']; ?></td>
                                    <td><?php echo $rowp1['larg']; ?></td>
                                    <td><?php echo $rowp1['quantM']; ?></td>
                                    <td class="text-danger"> - R$<?php echo number_format($rowp1['desconto'], 2, ',', '.'); ?> </td>
                                    <td>R$<?php echo number_format($rowp1['acab'], 2, ',', '.'); ?></td>
                                    <td>R$<?php echo number_format($rowp1['acresc'], 2, ',', '.'); ?></td>
                                    <td>R$<?php echo number_format($rowp1['total'], 2, ',', '.'); ?></td>
                                    <td><a class="btn bbtn-sm btn-danger col-sm-12" href="data/apagar_temporcamentoUnit.php?id=<?php echo $rowp1['id']; ?>">X</a></td>
                                    </tr>
                              <?php  
                                }
                                ?>
                               
                     </tbody>
                     <?php
                     if(mysqli_num_rows($result1) > 0 ){       
                        $sql2 = "SELECT DISTINCT SUM(total) FROM temp_orcamento WHERE cliente_id='".$nome."' and id_empresa='".$_SESSION['empresa_id']."'";
                        $result2 = mysqli_query($con, $sql2);
                          while ($rowp2 = mysqli_fetch_array($result2)) {
                     ?>
                       
                                  <tr>
          
                                    <td colspan="13" class="text-right">Orçamento Total: R$ <?php echo number_format($rowp2['SUM(total)'], 2, ',', '.'); ?></td>
                                   
                                    <?php } ?>
                                </tr>
                                  
                     <tr>
                        <td colspan='6' class="text-right"><a class="btn btn-danger col-sm-12" href="data/apagar_temporcamento.php?idcliente=<?php echo $idUser; ?>">Limpar orçamentos temporarios</a></td>
                        <td colspan='7' class="text-left"><a class="btn btn-success col-sm-12" href="data/salvar_em_aberto.php?idcliente=<?php echo $idUser; ?>">Salvar orçamentos em aberto</button></td>
 
                                   </tr>
                     <?php
                     }      
                       ?>
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
                        <th>Acresc</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </thead>
                </table>
        </div>
    </div>

<?php } ?>
</div>

<?php
mysqli_close($con);
?>