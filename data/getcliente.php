<?php
session_start(); // checando sessão
include('../setting/config.php'); // buscando conexão

$sql = "SELECT * FROM clientes";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $a[] = $row['nome'];
}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<a href='?page=novo_orcamento&cliente=$name'>$name</a>";
            } else {
                $hint .= ",<a href='?page=novo_orcamento&cliente=$name'>$name</a>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
$html = '
 <!-- Modal -->
                <div id="novo" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cadastro de Novo cliente</h4>
                            </div>
                            <div class="modal-body">
                                <p>Some text in the modal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!---  modal  ---->
                <p>Cliente não encontrado! <a class="btn btn-success" data-toggle="modal" data-target="#novo"> Cadastre um novo cliente</a></p>
';


echo $hint === "" ? $html : $hint;
