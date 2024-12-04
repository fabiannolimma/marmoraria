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
    $id = $_GET['id'];
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
        empty($id) 
    ) {
    ?>
        <center>
            <h2>Não fo passada nenhum ID para editar esse usuário.</h2>
            <a href="../admin.php?page=add_cliente" class="btn btn-danger">Voltar a lista de cliente</a>

        </center>

    <?php
    } else {
        $sql ="update clientes set 
                        nome='" . $nome . "',
                        endereco='" . $endereco . "',
                        n='" . $n . "',
                        referencia='" . $pontoref . "',
                        cidade='" . $cidade . "',
                        bairro='" . $bairro . "',
                        cep='" . $cep . "',
                        cpf='" . $cpf . "',
                        telefone='" . $numero . "',
                        telefone1='" . $numero1 . "'
                        where ID='".$id."'";
        $update = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Cliente <strong><?php echo $nome; ?></strong> editado com successo!</h2>
            <a href="../admin.php?page=add_cliente" class="btn btn-success">Voltar a lista cliente</a>

        </center>
    <?php
    }
    ?>