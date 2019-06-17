<?php 
/* As informações passadas via AJAX são tratadas antes de serem passadas ao banco
    ela vem no formato "nome;competencia[0],competencia[n].."

    Então, o nome é separado das competencias e guardado em outra variavel
    e as competencias são de um array, para uma string (formato: 1,2,4,8,9,10)
*/
$r = $_POST['r'];
$dados = explode(';', $r);
$nome = array_shift($dados);
$servicos = implode(",", $dados);

include "../../../conn.php";
/*  Aqui elas são sendo guardadas em suas respectivas tabelas no BD
    1º $sql -> Login e Senha
    2º $sql -> Pega a idLogin (chave primaria) do atendente que acabou de ser registrado
    3º $sql -> Na tabela "atendente" a ID dele (agora, uma chave estrangeira), as IDs das 
    competencias dele, e o Status dele (se está disponivel, por exemplo), assim como seu
    nome, são gravados no BD
*/
$sql = "INSERT INTO `loginadm`(`admLogin`, `admPass`) VALUES ('$nome','123')";
$query = $mysqli->query($sql);
$sql = "SELECT idLogin FROM `loginadm` WHERE admLogin = '$nome'";
$funcQ = $mysqli->query($sql);
$func = $funcQ->fetch_array();
$sql = "INSERT INTO `atendente`(`idLogin`, `idServ`, `idStatus`, `nome`) 
        VALUES ('$func[0]','$servicos','1','$nome')";
$query2 = $mysqli->query($sql);
if($query && $query2){
    echo "Registro realizado com sucesso";
} else {
    echo "Falha ao realizar registro";
}
echo "<br/>Lembrete: a senha padrão é 123";
?>