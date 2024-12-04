    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    session_start(); // checando sessão
    include('../setting/config.php'); // buscando conexão
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    //buscando dados do formulário
    /////////////////////////
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $n = $_POST['n'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $pontoref = $_POST['pr'];
    $cpf = $_POST['cpf'];
    $numero = $_POST['num'];
    $numero1 = $_POST['num1'];
    //////////////////////////
    if (
        empty($nome) ||
        empty($endereco) ||
        empty($n) ||
        empty($cep) ||
        empty($cidade) ||
        empty($bairro) ||
        empty($pontoref) ||
        empty($cpf) ||
        empty($numero)
    ) {
    ?>

        <center>
            <h2>Existe campos obrigatórios em branco, por favor refaça o cadastro</h2>
            <form method="get" action="../admin.php?page=add_cliente&">
                <input type="hidden" name="nome" value="<?=$nome;?>" >
                <input type="hidden" name="endereco" value="<?=$endereco;?>" >
                <input type="hidden" name="n" value="<?=$n;?>" >
                <input type="hidden" name="cep" value="<?=$cep;?>" >
                <input type="hidden" name="cidade" value="<?=$cidade;?>" >
                <input type="hidden" name="bairro" value="<?=$bairro;?>" >
                <input type="hidden" name="pr" value="<?=$pontoref;?>" >
                <input type="hidden" name="cpf" value="<?=$cpf;?>" >
                <input type="hidden" name="num" value="<?=$numero;?>" >
                <input type="hidden" name="num1" value="<?=$numero1;?>" >
                <button class="btn btn-danger">Cadastrar novo cliente</button>
    </form>

        </center>

    <?php
    } else {
        $sql = "insert into clientes (
                        nome,
                    endereco,
                    n,
                    referencia,
                        cidade,
                        bairro,
                        cep,
                        cpf,
                        telefone,
                        telefone1,
                        id_empresa)
                        values
                        ('" . $nome . "',
                        '" . $endereco . "',
                        '" . $n . "',
                        '" . $pontoref . "',
                        '" . $cidade . "',
                        '" . $bairro . "',
                        '" . $cep . "',
                        '" . $cpf . "',
                        '" . $numero . "',
                        '" . $numero1 . "',
                        '" . $_SESSION['empresa_id'] . "')
                        ";
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Cliente <strong><?php echo $nome; ?></strong> cadastrado com successo!</h2>
            <a href="../admin.php?page=add_cliente" class="btn btn-success">Cadastrar novo cliente</a>

        </center>
    <?php
    }
    ?>