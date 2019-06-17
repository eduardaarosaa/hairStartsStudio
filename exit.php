<?php 
session_start();
// Desfaz todas as Arrays $_SESSION criadas
session_destroy();
// e retorna para a pagina inicial
header('location:home.php');

?>