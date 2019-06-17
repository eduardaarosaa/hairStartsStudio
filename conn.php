<?php
$serv='localhost';
$user='root';
$pass='';
$db='teste';
//Abre conexão com o banco de dados
$mysqli = new mysqli($serv,$user,$pass,$db);
// Muda o tipo de conexão para uma com formatação UTF8
mysqli_set_charset( $mysqli, 'utf8');
// Caso não consiga estabelecer conexão, dispara um erro
if(mysqli_connect_errno()){
    trigger_error(mysql_connect_errno());
}
?>