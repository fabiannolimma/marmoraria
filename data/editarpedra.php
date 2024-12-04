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
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $quant = $_POST['quant'];
    $valor1 = $_POST['valor'];
    $ganho = $_POST['ganho'];
    //////////////////////////
    $valor = $ganho;
    if (
        empty($id) 
    ) {
    ?>
        <center>
            <h2>Não foi passada nenhum ID para editar essa pedra.</h2>
            <a href="../admin.php?page=add_pedras" class="btn btn-danger">Voltar a lista de cliente</a>

        </center>

    <?php
    } else {
        $sql ="update pedras set 
                        referenciaN='" . $cod . "',
                        Nome='" . $nome . "',
                        Cor='" . $cor . "',
                        Quantidade='" . $quant . "',
                        valor='" . $valor1 . "',
                        valorM='" . $valor . "'
                        where ID='".$id."'";
        $update = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Pedra <strong><?php echo $nome; ?> <?php echo $cor; ?></strong> editada com successo!</h2>
            <a href="../admin.php?page=add_pedras" class="btn btn-success">Voltar a lista pedras</a>

        </center>
    <?php
    }
    ?>