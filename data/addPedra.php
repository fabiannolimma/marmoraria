    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    session_start(); // checando sessão
    include('../setting/config.php'); // buscando conexão
    error_reporting(E_ALL);
    ini_set("display_errors", 0);
    //buscando dados do formulário
    /////////////////////////
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $quant = $_POST['quant'];
    $valor1 = $_POST['valor'];
    $ganho = $_POST['ganho'];
    //////////////////////////
    $valor = $ganho;
   
    //////////////////////////
    if (
        empty($cod) ||
        empty($nome) ||
        empty($cor) ||
        empty($quant) ||
        empty($valor1) ||
        empty($ganho)
    ) {
    ?>

        <center>
            <h2>Existe campos obrigatórios em branco, por favor refaça o cadastro</h2>
            <a href="../admin.php?page=add_pedras" class="btn btn-danger">Cadastrar novo pedra</a>

        </center>

    <?php
    } else {
        $sql = "insert into pedras (
                        ReferenciaN,
                               Nome,
                                Cor,
                         Quantidade,
                              valor,
                             valorM,
                             id_empresa)
                        values
                        ('" . $cod . "',
                        '" . $nome . "',
                        '" . $cor . "',
                        '" . $quant . "',
                        '" . $valor1 . "',
                        '" . $valor. "',
                        '" . $_SESSION['empresa_id'] . "')
                        ";
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Pedr <strong><?php echo $cor; ?> <?php echo $nome; ?></strong> cadastrada com successo!</h2>
            <a href="../admin.php?page=add_pedras" class="btn btn-success">Cadastrar novo pedra</a>

        </center>
    <?php
    }
    ?>