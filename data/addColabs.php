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
    $usuario = $_POST['usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha = hash('sha256', $_POST['senha']);
    $nivel = $_POST['nivel'];
   
    //////////////////////////
    if (
        empty($usuario)|| empty($email) || empty($senha) || empty($nivel)
    ) {
    ?>

        <center>
            <h2>Existe campos obrigatórios em branco, por favor refaça o cadastro</h2>
            <a href="../admin.php?page=addColabs" class="btn btn-danger">Volta ao cadastro de Colaboradores</a>

        </center>

    <?php
    } else {
        $sql = "insert into usuarios (
                        usuario,
                        senha,
                        email,
                        nome,
                        nivel,
                        id_empresa)
                        values
                       ('" . $usuario . "',
                        '" . $senha . "',
                        '" . $email . "',
                        '" . $nome . "',
                        '" . $nivel . "',
                        '" . $_SESSION['empresa_id'] . "')
                        ";
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Colaboradores cadastrado com successo!</h2>
            <a href="../admin.php?page=addColabs" class="btn btn-success">Cadastrar novo Colaborador.</a>

        </center>
    <?php
    }
    ?>