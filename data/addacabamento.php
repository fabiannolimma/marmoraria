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
    $lados = $_POST['lados'];
    $menor = $_POST['menor'];
    $maior = $_POST['maior'];
    $nome = $_POST['nome'];
   
    //////////////////////////
    if (
        empty($nome)
    ) {
    ?>

        <center>
            <h2>Existe campos obrigatórios em branco, por favor refaça o cadastro</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-danger">Volta ao cadastro de acabamentos</a>

        </center>

    <?php
    } else {
        $sql = "insert into acabamentos (
                        lados,
                        nome,
                        menor,
                        maior,
                        id_empresa)
                        values
                       ('" . $lados . "',
                        '" . $nome . "',
                        '" . $menor . "',
                        '" . $maior . "',
                        '" . $_SESSION['empresa_id'] . "')
                        ";
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Acabamento cadastrado com successo!</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-success">Cadastrar novo orçamento.</a>

        </center>
    <?php
    }
    ?>