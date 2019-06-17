<?php 
if($_POST){
    include "../../../conn.php";

    $d = $_POST['r'];
    $dados = explode(",", $d);
    // É formado um array a partir do $_POST
    // Nos comandos abaixo verifica se as informações para o serviço escolhido foi ou não alterado
    $sql = "SELECT nome, TE, idStatus FROM servicos WHERE nome like '%".$dados[0]."%' 
            AND TE = '$dados[2]' AND idStatus = '$dados[1]'";
    $query = $mysqli->query($sql);
    if($row = $query->fetch_array()){
        $a["alerta"] = "Serviço não modificado, revise as informações!";
        $a["id"] = $dados[3];
        $JSON = json_encode($a);
        echo $JSON;
    } else {
    // Ele tenha realmente sido alterado, o código procede para a atualização do serviço
    $sql = "UPDATE servicos a
            SET a.nome = '$dados[0]', a.idStatus = '$dados[1]', a.TE = '$dados[2]'
            WHERE idServ = '$dados[3]'";
    $query = $mysqli->query($sql);

    $sql = "SELECT * FROM servicos WHERE idServ = $dados[3]";
    $query = $mysqli->query($sql);
    $J = $query->fetch_array();
    // um objeto JSON (um feedback que envolve outros itens na pagina) é retornado ao pedido
    $J["sucess"] = "#329932";
    $J["aviso"] = "Serviço alterado com sucesso!";
    $JSON = json_encode($J);
    echo $JSON;
    }
}
?>