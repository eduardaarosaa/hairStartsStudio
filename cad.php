<?php 
$login = $_POST['login'];
$senha = $_POST['pass'];
$conSenha = $_POST['passV'];
$nome = $_POST['nome'];
$tel = $_POST['telefone'];
$end = $_POST['end'];
$email = $_POST['email'];

include "conn.php";
// Verifica se ja existe tal usuario
$sql = "SELECT userLogin FROM login WHERE userLogin = BINARY '$login'";
$query = $mysqli->query($sql);
$row = $query->fetch_array();

$sql = "SELECT admLogin FROM loginadm WHERE admlogin = BINARY '$login'";
$query = $mysqli->query($sql);
$row2 = $query->fetch_array();

if($row['userLogin'] || $row2['admLogin']){
    echo "<span class='alert'>Login ja estava sendo utilizado!</span>";
    return;
}
elseif($senha != $conSenha){
    echo "<span class='alert'>Suas senhas não estavam batendo!</span>";
    return;
}
else{
    // Se não existir, o código continua com o registro no BD
    $sql = "INSERT INTO login (userLogin, userPass) VALUES ('$login','$senha')";
    $query1 = $mysqli->query($sql);

    $sql2 = "SELECT idLogin FROM login WHERE BINARY userLogin = BINARY '$login'";
    $query2 = $mysqli->query($sql2);

    $row = $query2->fetch_array();
    $id = "idLogin";
    $sql3 = "INSERT INTO usuario (idLogin, nome, endereco, telefone, email) 
             VALUES ('$row[$id]','$nome','$end','$tel','$email')"; 
    $query3 = $mysqli->query($sql3);

    if($query1 && $query3){
        echo '<span class="sucess">Conta criada com sucesso, retornando a pagina'. 
             'de login</span>';
        header('location:login.php');
    }else{
        echo '<span class="alert">Falha ao criar a conta no servidor</span>';
    }
}
?>