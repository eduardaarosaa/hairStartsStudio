<?php 
    if($_POST){
        include "../../../conn.php";
        // Os dados são passados de um Array para string, e depois gravados no BD
        $d = $_POST['r'];
        $dados = explode(",", $d);
        // Aqui previne duplicatas no BD
        $sql = "SELECT nome FROM servicos WHERE nome like '%".$dados[0]."%'";
        $query = $mysqli->query($sql);
        if($row = $query->fetch_array()){
            echo "Serviço ja registrado";
        } else {
            $sql = "INSERT INTO `servicos`(`nome`, `idStatus`, `TE`) VALUES (BINARY '$dados[0]','$dados[1]','$dados[2]')";
            $query = $mysqli->query($sql);
            if($query){
                echo "Serviço inserido com sucesso!";
            } else {
                echo "Não foi possivel registrar o serviço";
            }
        }
    }
?>