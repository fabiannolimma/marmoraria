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
            <h2>Não foi edentificado um id para o colaborador mencionado, tente novamente.</h2>
            <a href="../admin.php?page=addColabs" class="btn btn-danger">Voltar a lista de colaboradores</a>

        </center>
    <?php
    } else {
        $check = "SELECT * FROM usuarios WHERE id='$id' AND id_empresa='" . $_SESSION['empresa_id'] . "'"; 
        if(mysqli_num_rows(mysqli_query($con,$check)) > 0){

        $sql = "DELETE FROM usuarios WHERE id='$id'";    
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Cliente com ID <?php echo $id; ?> foi deletado com successo!</h2>
            <a href="../admin.php?page=addColabs" class="btn btn-success">Voltar a lista de colaboradores</a>

        </center>
    <?php
        }else{
            ?>
<center>
            <h2>Esse Colaborador não existe, tente novamente.</h2>
            <a href="../admin.php?page=addColabs" class="btn btn-danger">Voltar a lista de colaboradores</a>

        </center>
<?php
        }
    }
    ?>