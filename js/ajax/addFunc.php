<html>
<!-- Sera incluso dentro de outra página via AJAX -->
<head>
<style>
    /*O nome/class "login" foi só um 
    padrão para os nomes e classes 
    de formularios no site*/
    .login{
        width: 550px;
    }
    .login [name~=nome]{
        width: 250px;
    }
    .login [name~=opt]{
        width:1.9em;
        position: absolute;
        right: 0;
        -webkit-appearance: none;
        height:1.9em;
    }
    .login [name~=opt]:checked{
        background-color: #FFEB3B;
    }
    .login [name~=opt]:active{
        text-decoration: none;
        color: none;
    }
    .opt{
        display: inline-block;
        position: relative;
        width:250px;
        height:2em;
        margin: 0 20px 10px 0; 
        font-weight:700;
        line-height: 2em;
        border-bottom: 1px solid #000000;
    }
    .login [name~=confirmar]{
        width:200px;
        text-align:center;
        margin-top:15px;
        padding: initial;
    }
</style>
</head>
<body>
<form action="#" name="add" class="login" id="id">
Nome do Funcionario:</br><input type="text" name="nome" id="nome" required></br>
Especialidades:</br>
<?php 
include "../../conn.php";

$sql = "SELECT idServ, nome FROM servicos";
$query = $mysqli->query($sql);
// Cria proceduralmente as opções com base nos serviços registrados no BD
while($row = $query->fetch_array()){
    echo "<div class='opt'>$row[1]<input type='checkbox' id='$row[0]' name='opt' value='$row[0]'></div>";
}
?>
<input readonly="readonly" name="confirmar" value="Adicionar Funcionario" onclick="formAdd()"/>
</form>
</body>
</html>