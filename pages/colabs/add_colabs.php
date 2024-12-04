<?php 
if($usuarioNivel == 1){
?>
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cadastrar novo Colaborador</h2>
            <div id="Allform">
                <form method="post" action="data/addColabs.php">
                    <div class="form-group col-sm-4">
                    <label for="nome">Nome do Colaborador:</label>
                        <input type="text" name="nome" class="form-control" id="nome" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-8">
                    <label for="nome">Email do Colaborador:</label>
                        <input type="email" name="email" class="form-control" id="email" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Usuário do Colaborador:</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Senha do Colaborador:</label>
                            <input type="text" name="senha" class="form-control" id="senha" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Nível do Colaborador:</label>
                        <select class="form-control" name="nivel">
                            <option value="1">Administrador</option>
                            <option value="2">Colaborador</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Adicionar Colaborador</button>
                    </div>
                </form>
            </div>



            <table id="tableuser" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Nível</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, $UsuariosEmpresa);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row['nome']; ?> </td>
                            <td class="text-center"><?php echo $row['email']; ?> </td>
                            <td class="text-center"><?php if($row['nivel'] == 1){ echo "Adminstrador"; }else{ echo "Colaborador"; } ?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="?page=editaColabs&id=<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-danger" href="data/apagarColabs.php?id=<?php echo $row['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Nível</th>
                        <th class="text-center">Comandos</th>
                    </tr>
                </tfoot>
            </table>





        </div>

    </div>

    <?php
    } else {
        echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Você não tem permissão para acessar essa página.</h1></div>";
    }
    mysqli_close($con);
    ?>