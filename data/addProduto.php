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

    //////////////////////////
    if (empty($nome)){
    ?>

        <center>
            <h2>Existe campos obrigatórios em branco, por favor refaça o cadastro</h2>
            <a href="../admin.php?page=add_produto" class="btn btn-danger">Cadastrar novo produto</a>

        </center>

    <?php
    } else {
        $sql = "insert into produto (
                        nome,
                        id_empresa)
                        values
                        ('" . $nome . "',
                        '" . $_SESSION['empresa_id'] . "')
                        ";
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Produto <strong><?php echo $nome; ?></strong> cadastrado com successo!</h2>
            <a href="../admin.php?page=add_produto" class="btn btn-success">Cadastrar novo produto</a>

        </center>
    <?php
    }
    ?>