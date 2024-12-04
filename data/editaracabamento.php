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
    $nome = $_POST['valor'];
    //////////////////////////
    if (
        empty($id) 
    ) {
    ?>
        <center>
            <h2>Não foi passada nenhum ID para editar esse acabamento.</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-danger">Voltar a lista de produtos</a>

        </center>

    <?php
    } else {
        $sql ="update acabamentos set 
                        valor='" . $nome . "'
                        where ID='".$id."'";
        $update = mysqli_query($con, $sql);
    ?>
        <center>
            <h2><strong>Acabamento</strong> editado com successo!</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-success">Voltar a lista acabamentos</a>

        </center>
    <?php
    }
    ?>