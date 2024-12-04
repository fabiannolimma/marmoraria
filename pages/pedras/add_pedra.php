<?php 
if($usuarioNivel == 1){
?>
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cadastrar nova Pedra</h2>
            <div id="Allform">
                <form method="post" action="data/addPedra.php">
                    <div class="form-group col-sm-3">
                    <label for="nome">Código referência:</label>
                        <input type="text" name="cod" class="form-control" id="cod" maxlength="4" pattern="\d{4}" title="Apenas 4 números" autocomplete="off">
                    <script>
                    document.getElementById('cod').addEventListener('blur', function (e) {
                        let value = e.target.value;
                        if (value.length < 4) {
                            e.target.value = value.padStart(4, '0');
                        }
                    });
                    </script>
                    </div>
                    <div class="form-group col-sm-3">
                    <label for="nome">Nome da Pedra:</label>
                        <input type="text" name="nome" class="form-control" id="nome" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="nome">Cor da pedra:</label>
                        <input type="text" name="cor" class="form-control" id="cor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Quantidade em estoque (M²):</label>
                        <input type="text" name="quant" class="form-control" id="quant" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Valor de compra:</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="text" name="valor" class="form-control" id="valor" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Valor de venda:</label>
                        <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="text" name="ganho" class="form-control" id="valor" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Guardar Nova pedra</button>
                    </div>
                </form>
            </div>



            <table id="tableuser" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Cor</th>
                        <th class="text-center">M² disponível</th>
                        <th class="text-center">Preço de compra</th>
                        <th class="text-center">Preço de venda</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, $sqlPedra);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr><td class="text-center"><?php echo str_pad($row['ReferenciaN'], 4, '0', STR_PAD_LEFT); ?> </td>
                            <td class="text-center"><?php echo $row['Nome']; ?> </td>
                            <td class="text-center"><?php echo $row['Cor']; ?> </td>
                            <td class="text-center"><?php echo number_format($row['Quantidade'], 2, ',', '.') . ' M²'; ?> </td>
                            <td class="text-center"><?php echo 'R$ ' . number_format($row['valor'], 2, ',', '.'); ?> </td>
                            <td class="text-center"><?php echo 'R$ ' . number_format($row['valorM'], 2, ',', '.'); ?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="admin.php?page=editapedra&id=<?php echo $row['ID']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-danger" href="data/apagarpedras.php?id=<?php echo $row['ID']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Cor</th>
                        <th class="text-center">M² disponível</th>
                        <th class="text-center">Preço de compra</th>
                        <th class="text-center">Preço de venda</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </tfoot>
            </table>





        </div>

    </div>

    <?php
    }else{
        echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Você não tem permissão para acessar essa página.</h1></div>";
    }
    mysqli_close($con);
    ?>