<?php 

include '../../../conn.php';
// Resgata todos os serviços do DB que estejam como "disponivel", "indisponivel" e "em breve"
$sql = "SELECT * FROM servicos WHERE idStatus = '1' OR idStatus = '2' OR idStatus = '5' ORDER BY nome ASC";
$query = $mysqli->query($sql);

// Passa todos os resultados para dentro de uma array
while($row = $query->fetch_object()){
$JSON[] = $row;
}
// A Array é convertida para uma formatação JSON, para posterior postagem a um AJAX
$j = json_encode($JSON);

echo $j;
?>