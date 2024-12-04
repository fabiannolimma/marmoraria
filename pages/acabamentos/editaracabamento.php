<div class="row content">
    <div class="row">
        <div class="col-sm-12">
            <h2>Editar Acabamento</h2>
            <div id="Allform">
                <?php
                if($_GET['id']){  
                    $sql = "SELECT * FROM acabamentos WHERE ID='" . $_GET['id'] . "'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <form method="post" action="data/editaracabamento.php?id=<?php echo $row['ID']; ?>">
                        
                    <div class="form-group col-sm-12">
                    <label for="nome">Valor do acabamento:</label>
                        <input type="text" name="valor" value="<?php echo $row['valor']; ?>"class="form-control" id="nome" autocomplete="off">
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Editar</button>
                    </div>
                        </form>
                    <?php
                    }
                } else {
                    ?>

                    <div class="form-group col-sm-12 text-center">
                        <h2>Acabamento não existente, por favor volte para a lista de acabamento</h2>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
