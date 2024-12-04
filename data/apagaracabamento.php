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
    //////////////////////////
    if (empty($id)) {
    ?>
        <center>
            <h2>Não foi edentificado um id para a pedra mencionada, tente novamente.</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-danger">Voltar a lista de acabamento</a>

        </center>
    <?php
    } else {
        $check = "SELECT * FROM acabamentos WHERE ID='$id'"; 
        if(mysqli_num_rows(mysqli_query($con,$check)) > 0){

        $sql = "DELETE FROM acabamentos WHERE ID='$id'";    
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Pedra com ID <?php echo $id; ?> foi deletado com successo!</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-success">Voltar a lista de acabamento</a>

        </center>
    <?php
        }else{
            ?>
<center>
            <h2>Essa acabamento não existe, tente novamente.</h2>
            <a href="../admin.php?page=add_acabamento" class="btn btn-danger">Voltar a lista de acabamento</a>

        </center>
<?php
        }
    }
    ?>