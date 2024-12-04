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
            <h2>Não foi edentificado um id do produto mencionado, tente novamente.</h2>
            <a href="../admin.php?page=add_produto" class="btn btn-danger">Voltar a lista de produtos</a>

        </center>
    <?php
    } else {
        $check = "SELECT * FROM produto WHERE ID='$id'"; 
        if(mysqli_num_rows(mysqli_query($con,$check)) > 0){

        $sql = "DELETE FROM produto WHERE ID='$id'";    
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Produto com ID <?php echo $id; ?> foi deletado com successo!</h2>
            <a href="../admin.php?page=add_produto" class="btn btn-success">Voltar a lista de produtos</a>

        </center>
    <?php
        }else{
            ?>
<center>
            <h2>Esse produto não existe, tente novamente.</h2>
            <a href="../admin.php?page=add_produto" class="btn btn-danger">Voltar a lista de produtos</a>

        </center>
<?php
        }
    }
    ?>