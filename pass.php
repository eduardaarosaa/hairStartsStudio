<?php 
session_start();

// Verifica se foi feito o login
// A Variavel $b garante que o código siga o procedimento correto
$b = false;
if(!$_SESSION['login']){   
    $acc="../login.php";
    $b = true;
}
// Re-valida o nivel de acesso do usuario em certas areas do site
include "conn.php";
    
// Vê onde está a pagina atual
$atual = $_SERVER["PHP_SELF"];

// Se o login foi feito:
if(!$b){
    $tipo = $_SESSION['tipo'];

    // Verifica se o tipo de usuario bate com a pagina onde ele está
    // Pega o endereço do PHP_SELF, e verifica se o usuario está presente
    // em algum desses lugares, ou subpastas

    // 3 = Cliente
    // 1 = Administrador
    // 0 = Atendente

    if($atual == '/tcm/adm/'.substr($atual, 9) && $tipo != 1){
        if($tipo == 0){
            $acc = "../atendente/inicio.php";
        } else {
            $acc = "../cliente/inicio.php";
        }
    }if($atual == "/tcm/atendente/".substr($atual, 15) && $tipo != 0){
        if($tipo == 1){
            $acc = "../adm/inicio.php";
        }if($tipo == 3) {
            $acc = "../cliente/inicio.php";
        }
    }if($atual == "/tcm/cliente/".substr($atual, 13) && $tipo != 3){
        if($tipo == 1){
            $acc = "../adm/inicio.php";
        } else {
            $acc = "../atendente/inicio.php";
        }
    }
}
// Por ultimo encaminha o usuario para o seu devido lugar
@header("Location: ".$acc);
?>