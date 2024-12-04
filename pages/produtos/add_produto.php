<?php 
if($usuarioNivel == 1){
?>
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cadastrar novo Produto</h2>
            <div id="Allform">
                <form method="post" action="data/addProduto.php">
                    <div class="form-group col-sm-8">
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Escreva o nome do produto" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="submit" class="btn btn-success col-sm-12">Guardar Novo Produto</button>
                    </div>
                </form>
            </div>



            <table id="tableuser" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $result = mysqli_query($con, $sqlProduts);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row['Nome']; ?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="admin.php?page=editaproduto&id=<?php echo $row['ID']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-danger" href="data/apagarproduto.php?id=<?php echo $row['ID']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center"> Nome</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </tfoot>
            </table>





        </div>

    </div>

    <?php
    }else{
        echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Você não tem permissão para acessar essa página.</h1></div>";
    }
    mysqli_close($con);
    ?>