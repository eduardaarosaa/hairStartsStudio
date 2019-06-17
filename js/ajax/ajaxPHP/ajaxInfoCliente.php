<?php 
session_start();
include "../../../conn.php";
// Pega a ID do usuario
$id = $_SESSION['id'];
// Resgata todas as informações pessoais do usuario e passa elas para um objeto JSON
$sql = "SELECT userLogin, nome, endereco, telefone, email 
        FROM usuario a INNER JOIN login b where $id = a.idLogin";
$query = $mysqli->query($sql);
$JSON = json_encode($query->fetch_array());
echo $JSON;
?>