<html>
    <body>
<?php 
session_start();
@include "conn.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$coment = $_POST['comentario'];
// Verificação se o comentarios ja foi realizado pelo usuario
$sql = "SELECT comentario, email FROM comentarios WHERE nome = BINARY '$nome' AND comentario = BINARY '$coment'";
$query2 = $mysqli->query($sql);
if($row = $query2->fetch_array()){
    echo "<span class='error'>Falha no registro do comentário,</br>Comentário ja foi realizado por você</span>";
}else{
    // Se for um usuario mandando o comentario, as informações dele são zeradas, e será mandado apenas a ID dele como referencia
    if($_SESSION['tipo'] == 3){
       $id = $_SESSION['id'];
       $sql = "INSERT INTO comentarios(idLogin, nome, email, telefone, comentario) VALUES ('$id','0','0','0','$coment')";
       $query = $mysqli->query($sql);
    // Caso contrario tudo é mandado sem interferencias pelo código
    }else{
       $sql = "INSERT INTO comentarios(nome, email, telefone, comentario) VALUES ('$nome', '$email', '$tel', '$coment')";
       $query = $mysqli->query($sql);
    }

    if($query == true){
        echo "<span class='sucess'>Comentario registrado com sucesso</span>";
    }else{
        echo "<span class='error'>Falha no registro do comentário</span>";
    }
}
?>

    </body>
</html>