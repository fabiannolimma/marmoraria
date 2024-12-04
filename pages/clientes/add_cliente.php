
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h4>Procure o cliente na lista a baixo, se não existe por favor cadastre o novo cliente usando o formulário abaixo:</h4>
            <div id="Allform">
                <?php
                if (isset($_POST['cep'])) {
                    function get_endereco($cep)
                    {
                        // formatar o cep removendo caracteres nao numericos
                        $cep = preg_replace("/[^0-9]/", "", $cep);
                        $url = "https://viacep.com.br/ws/$cep/xml/";
                        $xml = @simplexml_load_file($url);
                        if ($xml === false) {
                            return null;
                        }
                        return $xml;
                    }

                    $endereco = get_endereco($_POST['cep']);
                    if ($endereco === null) {
                        echo "<p>Erro ao buscar o endereço. Verifique o CEP e tente novamente.</p>";
                    } else {
                ?>
                    <form method="post" action="data/addCliente.php">
                        <div class="form-group col-sm-12">
                            <label for="nome">Nome do Cliente:</label>
                            <input type="text" name="nome" value="<?php echo $_GET['nome']; ?>" class="form-control" id="nome" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="endereco">Endereço:</label>
                            <input type="text" name="endereco" value="<?php if(!isset($_GET)){ echo $_GET['endereco']; }else{ echo $endereco->logradouro; } ?>" class="form-control" id="endereco" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="n">Nº:</label>
                            <input type="text" name="n" value="<?php echo $_GET['n']; ?>"class="form-control" id="n" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cep">CEP:</label>
                            <input type="text" name="cep" class="form-control" value="<?php if(!isset($_GET)){ echo $_GET['cep']; }else{  echo $endereco->cep; } ?>" id="cep" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" value="<?php if(!isset($_GET)){ echo $_GET['cidade']; }else{  echo $endereco->localidade; }?> / <?php echo $endereco->uf; ?>" " class=" form-control" id="cidade" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="bairro">Bairro:</label>
                            <input type="text" name="bairro" value="<?php if(!isset($_GET)){ echo $_GET['bairro']; }else{ echo $endereco->bairro; } ?>" class="form-control" id="bairro" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="pr">Ponto Referência:</label>
                            <input type="text" name="pr" value="<?php echo $_GET['pr']; ?>" class="form-control" id="pr" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cpf">CPF cliente:</label>
                            <input type="text" name="cpf" value="<?php echo $_GET['cpf']; ?>" class="form-control" id="cpf" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="num">Telefone 1</label>
                            <input type="text" name="num" value="<?php echo $_GET['num']; ?>" class="form-control" id="celular" placeholder="(00) 00000-0000" maxlength="15">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="num1">Telefone 2:</label>
                            <input type="text" name="num1" value="<?php echo $_GET['num1']; ?>" class="form-control" id="celular" placeholder="(00) 00000-0000" maxlength="15">
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-success col-sm-12">Guardar Novo Cliente</button>
                        </div>
                        <div class="form-group col-sm-6">
                            <a class="btn btn-info col-sm-12" href="?page=add-cliente">Refazer Cadastrado</a>
                        </div>
                    </form>
                <?php
                    }
                } else {
                ?>
                    <form method="post" action="admin.php?page=add_cliente">
                        <div class="form-group col-sm-12 text-center">
                            <label for="cep">Digite CEP para prosseguir:</label>
                            <input type="text" name="cep" class="form-control" id="cep" autocomplete="off">
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-success col-sm-12">Iniciar cadastro</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>



            <table id="tableuser" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Bairro</th>
                        <th class="text-center">Telefone 1</th>
                        <th class="text-center">CPF</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   
                    $result = mysqli_query($con, $sqlClientes);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row['nome']; ?> </td>
                            <td class="text-center"><?php echo $row['bairro']; ?> </td>
                            <td class="text-center"><?php echo preg_replace("/(\d{2})(\d{5})(\d{4})/", "($1) $2-$3", $row['telefone']); ?> </td>
                            <td class="text-center"><?php echo preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $row['cpf']); ?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="admin.php?page=relatorio&idcliente=<?php echo $row['nome']; ?>"><i class="fa fa-eye" aria-hidden="true" style="color: white;"></i></a>
                                <a class="btn btn-sm btn-success" href="admin.php?page=novo_orcamento&cliente=<?php echo $row['nome']; ?>"><i class="fa fa-file" aria-hidden="true" style="color: white;"></i></a>
                                <a class="btn btn-sm btn-warning" href="admin.php?page=editacliente&id=<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></a>
                                <a class="btn btn-sm btn-danger" href="data/apagarcliente.php?id=<?php echo $row['id']; ?>"><i class="fa fa-minus" aria-hidden="true" style="color: white;"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center"> Nome</th>
                        <th class="text-center">Bairro</th>
                        <th class="text-center">Telefone 1</th>
                        <th class="text-center">CPF</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </tfoot>
            </table>





        </div>

    </div>

    <?php
    mysqli_close($con);
    ?>