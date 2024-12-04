<?php
session_start(); // checando sessão
include('../setting/config.php'); // buscando conexão

$q = intval($_GET['q']);

$sql = "SELECT * FROM pedras WHERE ID = '" . $q . "'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo $row['valorM'];
}
mysqli_close($con);
