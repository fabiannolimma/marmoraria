<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar Pedra</h2>
            <div id="Allform">
                <?php
                if($_GET['id']){  
                    $sql = "SELECT * FROM pedras WHERE ID='" . $_GET['id'] . "' AND id_empresa='".$_SESSION['empresa_id']."'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <form method="post" action="data/editarpedra.php?id=<?php echo $row['ID']; ?>">
                        <div class="form-group col-sm-3">
                    <label for="nome">Código referência:</label>
                        <input type="text" name="cod" class="form-control" value="<?php echo $row['ReferenciaN']; ?>" id="cod"  autocomplete="off">
                    </div>
                    <div class="form-group col-sm-3">
                    <label for="nome">Nome da Pedra:</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $row['Nome']; ?>" id="nome" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="nome">Cor da pedra:</label>
                        <input type="text" name="cor" class="form-control" value="<?php echo $row['Cor']; ?>" id="cor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Quantidade em estoque (M²):</label>
                        <input type="text" name="quant" class="form-control" value="<?php echo $row['Quantidade']; ?>" id="quant" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Valor de Compra:</label>
                        <input type="text" name="valor" class="form-control" value="<?php echo $row['valor']; ?>" id="valor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Valor de Venda: </label>
                        <input type="text" name="ganho" class="form-control" value="<?php echo $row['percentM']; ?>" id="valor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Editar pedra</button>
                    </div>
                        </form>
                    <?php
                    }
                } else {
                    ?>

                    <div class="form-group col-sm-12 text-center">
                        <h2>Pedra não existente, por favor volte para a lista de pedras</h2>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
