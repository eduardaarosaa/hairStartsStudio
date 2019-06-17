<?php 
include '../../../conn.php';

// Resgata os serviços que o atendente pode realizar, e a ID do atendente que estejam disponiveis
$sql = "SELECT idServ, idAtendente
FROM atendente WHERE idStatus = '1'";
$query = $mysqli->query($sql);

// Passa todos os resultados para dentro de uma array
while($row = $query->fetch_object()){
    $JSON[] = $row;
}
// A Array é convertida para uma formatação JSON, para posterior postagem a um AJAX
$j = json_encode($JSON);

echo $j;
?>