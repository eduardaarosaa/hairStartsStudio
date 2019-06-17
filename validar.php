<?php
    session_start();
    include "conn.php";
    $login = $_POST['nome'];
    $pass = $_POST['pass'];
    
    if(!empty($login) || !empty($senha)){ 
    $sql = "SELECT * FROM login WHERE `userLogin` = BINARY '$login' AND `userPass` = BINARY '$pass'";
    $sqlADM = "SELECT * FROM `loginadm` WHERE `admLogin` = BINARY '$login' AND `admPass` = BINARY '$pass'";
    $queryADM = $mysqli->query($sqlADM);
    $query = $mysqli->query($sql);

    if($row = $query->fetch_array()){
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        $_SESSION['id'] = $row[0];
        $_SESSION['tipo'] = 3;

        $sql = "SELECT * FROM usuario a INNER JOIN login b ON b.idLogin = a.idLogin WHERE a.idLogin = $row[0]";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['end'] = $row['endereco'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefone'] = $row['telefone'];

        $acc = "cliente/inicio.php";
        $a = true;
    } elseif($row2 = $queryADM->fetch_array()){
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        $_SESSION['id'] = $row2[0];

        $sql = "SELECT nome, tipo FROM administrador a INNER JOIN loginadm b ON b.idLogin = a.idLogin WHERE a.idLogin = $row2[0]";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = "Hair Stars Studio";
        $_SESSION['telefone'] = "00000000";
        $_SESSION['tipo'] = $row['tipo'];
        if($row){

        } else {
        $sql = "SELECT nome FROM atendente a INNER JOIN loginadm b ON b.idLogin = a.idLogin WHERE a.idLogin = $row2[0]";
        $query = $mysqli->query($sql);
        $row = $query->fetch_array();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['telefone'] = "00000000";
        $_SESSION['tipo'] = 0;
        }
        if($_SESSION['tipo'] == 1){
            $acc = "adm/inicio.php";
            $a = true;
        } else{
            $a = true;
            $acc = "atendente/inicio.php";
        }
    }
    if ($a == true){
        header("Location: ".$acc);
    }
     else {
        echo "<span class='error'>Informações erradas, tente novamente</span>";
    }
} else {
    echo "<span class='error'>Favor preencher os campos</span>";
}
?>