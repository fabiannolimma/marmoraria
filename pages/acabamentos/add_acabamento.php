<?php 
if($usuarioNivel == 1){
?>
<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cadastrar novo acabamento</h2>
            <div id="Allform">
                <form method="post" action="data/addacabamento.php">
                <div class="form-group col-sm-12">
                        <div class="alert alert-info"> Escolha quantos lados existe no acabamento. </div>
                </div>
                <div class="form-group col-sm-6">
                            <label for="lados">Lados</label>
                            <select name="lados" class="form-control">
                                <option value="">selecione quantos lados:</option>
                                <option value='0'>0 lado</option>
                                <option value='1'>1 lado</option>
                                <option value='2'>2 lado</option>
                                <option value='3'>3 lado</option>
                                <option value='4'>4 lado</option>
                            </select>
                </div>
                <div class="form-group col-sm-6">
                            <label for="maior">Quantidade maior</label>
                            <select name="maior" class="form-control">
                                <option value="">selecione quantos lados maiores:</option>
                                <option value='0'>0 lado</option>
                                <option value='1'>1 lado</option>
                                <option value='2'>2 lado</option>
                                <option value='3'>3 lado</option>
                                <option value='4'>4 lado</option>
                            </select>
                </div>
                <div class="form-group col-sm-6">
                            <label for="menor">Quantidade menor</label>
                            <select name="menor" class="form-control">
                                <option value="">selecione quantos lados menores:</option>
                                <option value='0'>0 lado</option>
                                <option value='1'>1 lado</option>
                                <option value='2'>2 lado</option>
                                <option value='3'>3 lado</option>
                                <option value='4'>4 lado</option>
                            </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nome">Nome de acabamento:</label>
                        <input type="text" name="nome" class="form-control" id="cod"  autocomplete="off">
                </div>
                   
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Guardar novo tipo de acabamento</button>
                    </div>
                </form>
            </div>



            <table id="tableuser" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Lados</th>
                    <th class="text-center">Quant. Menor</th>
                    <th class="text-center">Quant. Maior</th>
                    <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $result = mysqli_query($con, $sqlAcabamentos);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row['nome']; ?> </td>
                            <td class="text-center"><?php echo $row['lados']; ?> </td>
                            <td class="text-center"><?php echo $row['menor']; ?> </td>
                            <td class="text-center"><?php echo $row['maior']; ?> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="admin.php?page=editaracabamento&id=<?php echo $row['ID']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-danger" href="data/apagaracabamento.php?id=<?php echo $row['ID']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Lados</th>
                    <th class="text-center">Quant. Menor</th>
                    <th class="text-center">Quant. Maior</th>
                    <th class="text-center">Ações</th>
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