<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar Colaborador</h2>
            <div id="Allform">
                <?php
                if($_GET['id']){  
                    $sql = "SELECT * FROM usuarios WHERE id='" . $_GET['id'] . "' and id_empresa='" . $_SESSION['empresa_id'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <form method="post" action="data/editarsColabs.php">
                    <div class="form-group col-sm-4">
                    <label for="nome">Nome do Colaborador:</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $row['nome']; ?>" id="nome" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-8">
                    <label for="nome">Email do Colaborador:</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" id="cor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Usuário do Colaborador:</label>
                        <input type="text" name="usuario" class="form-control" value="<?php echo $row['usuario']; ?>" id="quant" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nome">Senha do Colaborador:</label>
                            <input type="text" name="senha" class="form-control" value="<?php echo $row['senha']; ?>" id="valor" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-4">
                    <label for="nivel">Nivel do Colaborador:</label>
                        <select class="form-control" name="nivel">
                            <?php 
                            if($row['nivel'] == 1){
                                echo '<option value="1" selected>Administrador</option>';
                                echo '<option value="2">Colaborador</option>';
                            } else {
                                echo '<option value="2" selected>Colaborador</option>';
                                echo '<option value="1">Administrador</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Atualizar Colaborador</button>
                    </div>
                </form>
                    <?php
                    }
                } else {
                    ?>

                    <div class="form-group col-sm-12 text-center">
                        <h2>Colaborador não existente, por favor volte para a lista de Colaboradores</h2>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
