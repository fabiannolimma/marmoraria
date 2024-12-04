<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar produto</h2>
            <div id="Allform">
                <?php
                if ($_GET['id']) {  /// pegando dado do cliente
                    $sql = "SELECT * FROM produto WHERE ID='" . $_GET['id'] . "' AND id_empresa='" . $_SESSION['empresa_id'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <form method="post" action="data/editarproduto.php?id=<?php echo $row['ID']; ?>">
                    <div class="form-group col-sm-8">
                        <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $row['Nome']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="submit" class="btn btn-success col-sm-12">Editar Produto</button>
                    </div>
                </form>
                    <?php
                    }
                } else {
                    ?>

                    <div class="form-group col-sm-12 text-center">
                        <h2>Produto não existente, por favor volte para a lista de produtos</h2>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

    <?php
    mysqli_close($con);
    ?>