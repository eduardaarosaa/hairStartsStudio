<?php 
include "../../../conn.php";
// Atraves do pedido AJAX, tudo dentro do Array $_POST é passado para a varaivel $d
$d = $_POST['r'];

//Todos os serviços são selecionados do BD e passados para um arquivo JSON
$sql = "SELECT * FROM servicos WHERE idServ = $d";
$query = $mysqli->query($sql);
$JSON = json_encode($query->fetch_array());

echo $JSON;
?>