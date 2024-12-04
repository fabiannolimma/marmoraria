<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar Cliente</h2>
            <div id="Allform">
                <?php
                if ($_GET['id']) {  /// pegando dado do cliente
                    $sql = "SELECT * FROM clientes WHERE id='" . $_GET['id'] . "' AND id_empresa='" . $_SESSION['empresa_id'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <form method="post" action="data/editarcliente.php?id=<?php echo $_GET['id']; ?>">
                            <div class="form-group col-sm-12">
                                <label for="nome">Nome do Cliente:</label>
                                <input type="text" name="nome" value="<?php echo $row['nome']; ?>" class="form-control" id="nome" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="endereco">Endereço:</label>
                                <input type="text" name="endereco" value="<?php echo $row['endereco']; ?>" class="form-control" id="endereco" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="n">Nº:</label>
                                <input type="text" name="n" value="<?php echo $row['n']; ?>" class="form-control" id="n" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="cep">CEP:</label>
                                <input type="text" name="cep" value="<?php echo $row['cep']; ?>" class="form-control" id="cep" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="cidade">Cidade:</label>
                                <input type="text" name="cidade" value="<?php echo $row['cidade']; ?>" class=" form-control" id="cidade" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="bairro">Bairro:</label>
                                <input type="text" name="bairro" value="<?php echo $row['bairro']; ?>" class="form-control" id="bairro" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="pr">Ponto Referência:</label>
                                <input type="text" value="<?php echo $row['referencia']; ?>" name="pr" class="form-control" id="pr" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="cpf">CPF cliente:</label>
                                <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>" class="form-control" id="cpf" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="num">Telefone 1</label>
                                <input type="text" name="num" value="<?php echo $row['telefone']; ?>" class="form-control" id="num" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="num1">Telefone 2:</label>
                                <input type="text" name="num1" value="<?php echo $row['telefone1']; ?>" class="form-control" id="num1" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn btn-success col-sm-12">Confirmar</button>
                            </div>
                            <div class="form-group col-sm-6">
                                <a class="btn btn-info col-sm-12" href="?page=add_cliente">Cancelar</a>
                            </div>
                        </form>
                    <?php
                    }
                } else {
                    ?>

                    <div class="form-group col-sm-12 text-center">
                        <h2>Cliente não existente, por favor volte para a lista de clientes</h2>
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