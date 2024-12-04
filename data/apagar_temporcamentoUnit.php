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
            <h2>Não foi edentificado um id mencionado, volte ao painel e recomece.</h2>
            <a href="../admin.php?page=painel" class="btn btn-danger">Voltar ao painel.</a>

        </center>
    <?php
    } else {
        $check = "SELECT * FROM temp_orcamento WHERE id='$id'";
        $result = mysqli_query($con,$check);
        while( $rot = mysqli_fetch_assoc($result)){
            $cliente = $rot['id'];
             }
        if(mysqli_num_rows($result) > 0){
       
        $sql = "DELETE FROM temp_orcamento WHERE id='$cliente'";    
        $inser = mysqli_query($con, $sql);
    ?>
        <center>
            <h2>Orçamento temporário para <?php echo $cliente; ?> foi deletado com successo!</h2>
            <a href="../admin.php?page=painel" class="btn btn-success">voltar ao painel</a>

        </center>
    <?php
        }else{
            ?>
<center>
            <h2>Orçamento temporário não existe, tente novamente.</h2>
            <a href="../admin.php?page=painel" class="btn btn-danger">Voltar ao painel</a>

        </center>
<?php
        }
    }
    ?>