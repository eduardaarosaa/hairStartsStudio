<?php
session_start();
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleA.css" rel="stylesheet">
    <script src="js/ajax/ajaxGetServA.js"></script>
</head>

<body>
    <header>
    <div class="fix">
    <div class="logo">
        <p>Hair Stars <span>Studio</span>
    </div>
    <?php if($_SESSION){
    echo "<a class='loginArea' href='cliente/inicio.php'>Minha Área</a>";
    } ?>
            <div class="nav">
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="sobre.php">Sobre nós</a>
                <a href="agendamentos.php">Agendamentos</a>
                <a href="servicos.php"> Serviços</a>
                <a href="galeria.php">Galeria</a>
                <a href="contato.php">Contato</a>
                <?php if(!$_SESSION){
                echo '<a href="login.php">Login</a>';
                } else {echo '<a name="status" href="exit.php">Sair</a>';}?>
            </div>
        </div>
        </div>
        </div>
    </header>
    <section>
        <p class="span">Veja os dias disponíveis!</p>
    </section>
    <section>
        <div class="fix">
            <div class="calendario">
                <?php 
// Define, na ordem, o Ano (yy), Mês(m), Dia(d) e Hora atual(h - hh) 
$aAtual = date("y");
$mAtual = date("n");
$dAtual = date("j");
$hAtual = date("G");

// São definidos os dias da semana e meses, mudando o ponteiro inicial para "1"
$nomeSem = [1 => "Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"];
$nomeMes = [1 => "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

// Estipula uma limite para a quantia de meses a ser criado dentro do calendário (o numero somado é o numero total a ser criado de meses)
$mFinal = date("n")+3;
while($mAtual < $mFinal){
    // Define o dia limite do mês atual trabalhado
    $dLimite = date('t', mktime(0, 0, 0, $mAtual, 1));
    $dInicial = date("N", mktime(0, 0, 0, $mAtual, 1));
    $j=1;
    $e=1;
    // Mostra, ou não mostra a tabela atual na tela
    if($mAtual == date("n")){
        $display = "show";
    }else{
        $display = "hide";

    }
    echo '<table class='.$display.'>';
    echo '<thead><caption>'.$nomeMes[date("n",mktime(0,0,0,$mAtual,1))].'</caption></thead>';
    // Escreve os nomes dos dias da semana
    echo '<tbody><tr class="semana">';
    for($i = 1; $i < 8;$i++){
        echo '<td>'.$nomeSem[$i].'</td>';
    }
    echo '</tr><tr>';
    // Escreve os "dias em branco"
    while($dInicial != $j){
        echo "<td> </td>";
        $j++;
        $e++;
    }
    //Escreve os dias do mês
    for($i = 1; $i <= $dLimite; $i++){
        if($dAtual == $i){
            $atual = "atual";
        } else {
            $atual = "";
        }
            echo "<td><p class=".$atual.">".$i."</p></td>";
            if($e == 7){
                echo "</tr><tr>";
                $e = 0;
            }
            $e++;
}
    echo '</tbody>';
    echo '</table>';
    $mAtual++;
}

?>
            </div>
            <aside>
        <?php
        // Caso o usuario não esteja logado, um link aparece no lugar do formulario de agendamento
		if(!$_SESSION){
            	echo 'Você precisa estar logado para realizar agendamentos</br><a href="login.php">Clique aqui para logar</a>';
        } else {
        /*
        Assim como o calendario, essa sessão é criada proceduralmente, primeiro os Cabeleleiro disponiveis
        são pesquisados e organizados em ordem alfabética, o <select> é criado, e cada atendente é passado
        como uma opção de escolha (<option>), sua ID é passada para uma segunda busca (em caso de selecionado)
        dentro de um arquivo JSON criado paralelamente com a pagina, o JS irá reagir a escolha do usuario, e
        irá disparar uma função que irá relacionar a ID do atendente com o arquivo JSON, e escrever as opções
        no proximo <select> de serviços de competência do mesmo, a seleção de uma dessas opções ira revelar um
        Tempo Estimado (TE) para a conclusão do mesmo

        Os espaços de seleção do dia e hora serão sincronizados com mês atualmente exibido na tela,
        e os dados serão revalidados por outro arquivo PHP, numa chamada AJAX para evitar que tenham sido
        adulterados
        */
        include "conn.php";
		echo  '<form name="agenda" id="agenda" class="agenda" action="#" method="GET">'.
                '<div id="cabelos">'.
                'Escolha um cabeleleiro(a):<br/>';
        $sql = "SELECT nome,idAtendente
                FROM atendente WHERE idStatus = '1' ORDER BY nome ASC";
        $query = $mysqli->query($sql);
        echo '<select name="cabelo" id="cabelo" onchange="getServ(this)">'.
        '<option disabled selected value> --- </option>';
        while($row = $query->fetch_array()){
            // São criadas as opções de atendentes
            echo "<option id='$row[1]' value='$row[1]'>$row[0]</option>";
        }
        echo '</select>'.
             '</div>'.
             '<div id="servis" id="servis">'.
             'Escolha um serviço:<br/>'.
             '<select onchange="TE(this)" name="serv" id="serv">'.
             '<option disabled selected value> --- </option>'.
             // Aqui é inserido a partir do JS, 
             // onde ele resgata e organiza as informações via um documento JSON
                    '</select><br/>'.
                    'Tempo Estimado: <span id="TE"> --- </span><br/><br/>'.
                '</div>'.
                '<div id="horarios" name="horarios">'.
                'Escolha um horario para agendar:<br/>'.
                '<select id="dia" name="dia" class="data"></select>'.
                '<select id="hora" name="hora" class="data"></select>'.
                '</div>'.
                '<input readonly="readonly" name="agendar" value="Agendar"/>'.
                '</form>'.
            '</aside>';
        }
        ?>
        </aside>
    </section>
    <footer class="footer">
    <div class="fix">
            <div class="elemento">
                <span class="titulo">Contatos</span>
                <span class="content"><img src='image.png' width="200"/><br>
                Email:hair@gmail.com<br>Telefone(11)2222-4444</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">Redes Sociais</span>
                <span class="content"><img src="redes.png" width="100"/><br>
                Facebook: Hair Starts Studio<br>Instagram: Hair Studio</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">Trabalhe conosco</span>
                <span class="content"><img src="trabalho.png" width="100"/><br>
                Faça parte da nossa equipe<br>Email: Hair@trabalheconosco.com.br</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">Localização</span>
                <span class="content"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.4720000899!2d-46.54229168544499!3d-23.443433084741624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef51eaf09ecbd%3A0x5f30af73346803ff!2sParque+Shopping+Maia!5e0!3m2!1spt-BR!2sbr!4v1511097328698" width="350" height="290" frameborder="0" style="border:0" allowfullscreen></iframe></span><br>

            </div>
        </div>
    </footer>

</body>

</html>