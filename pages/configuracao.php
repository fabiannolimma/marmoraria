<?php 
if($usuarioNivel == 1){
?>
<!-- Configuração da empresa -->
<div class="row content">
        <div class="row">
            <div class="col-sm-12">
                <h2>Configurações da empresa</h2>
            </div>
            <div id="Allform">
                <form method="post" action="data/editaEmpresa.php">
                    <div class="form-group col-sm-8">
                        <label for="nome">Nome da empresa:</label>
                        <input type="text" name="nome" class="form-control" autocomplete="off" value="<?php echo $empresaNome; ?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cnpj">CNPJ (Apenas Números):</label>
                        <input type="text" name="cnpj" class="form-control" autocomplete="off" id="cnpj" placeholder="00.000.000/0000-00" maxlength="18" value="<?php echo $empresaCnpj ?>">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $empresaEmail; ?>">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" autocomplete="off" value="<?php echo $empresaEndereco; ?>">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="bairro">Bairro:</label>
                        <input type="text" name="bairro" class="form-control" autocomplete="off" value="<?php echo $empresaBairro; ?>">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="numero">Numero:</label>
                        <input type="text" name="numero" class="form-control" autocomplete="off" value="<?php echo $empresaNumero; ?>">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" class="form-control" autocomplete="off" value="<?php echo $empresaCep ?>">
                    </div>
                    <h2>Configurações de contato</h2>
                    <div class="form-group col-sm-6">
                        <label for="telefone_fixo">Telefone Fixo (Apenas Números):</label>
                        <input type="text" name="telefone_fixo" class="form-control" autocomplete="off" id="telefone_fixo" placeholder="(00) 0000-0000" maxlength="14" value="<?php echo $empresaTel1 ?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="celular">Celular / WhatsApp (Apenas Números):</label>
                        <input type="text" name="celular" class="form-control" autocomplete="off" id="celular" placeholder="(00) 00000-0000" maxlength="15" value="<?php echo $empresaTel2 ?>">
                    </div>
                    <h2>Configurações de pagamento</h2>
                    <div class="form-group col-sm-8">
                        <span>Escolha porcentagem para adicionar taxa quando escolher a forma de pagamento Cartão de Débito/Crédito:</span>
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="text" name="taxa_cartao" class="form-control" autocomplete="off" value="<?php echo $empresaCard; ?>">
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-success col-sm-12">Atualizar dados da empresa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}else{
    echo "<div class='col-sm-12 text-center alert alert-danger'><h1>Você não tem permissão para acessar essa página.</h1></div>";
}
?>