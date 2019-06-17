<body>
<!-- Sera incluso dentro de outra pagina via AJAX-->
    <table class="t">
        <thead>
                <caption>
                    <b>Selecione um serviço</b>
                </caption>
        </thead>
        <tbody>
            <?php 
            // Cria proceduralmente uma listagem de todos os serviços registrados no BD
            include "../../conn.php";
            $sql = "SELECT nome, idServ FROM servicos ORDER BY nome ASC";
            $query = $mysqli->query($sql);

            $i = 1;
            // A Variavel $i=1 foi criada fora do while, para poder nomear de 1 a n cada <tr> criada
            // assim como preencher o argumento da função chamada dentro de cada
            while($row = $query->fetch_array()){
                echo "<tr onclick='selecionar($i)'><td id='$row[1]' name='$i' class='optDes'>"
                    ."$row[0]</td></tr>";
                $i++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td onclick="abrirForm()">Alterar</td>
            </tr>
        </tfoot>
    </table>
    <style>
        .login {
            margin: 0 0 0 50px;
        }
        .login input:last-of-type{
            cursor:pointer;
        }
    </style>
    <form action="#" method="POST" name="alt" class="login desativado">
    <input type="hidden" id="id" name="id" value=""/>
    Nome do Serviço<br/>
    <input type="text" name="serv" id="serv" required="required" /><br/> 
    Tempo Estimado<br/>
    <select required="required" id="TE" name="TE">
        <option value="15">15 Minutos</option>
        <option value="30">30 Minutos</option>
        <option value="45">45 Minutos</option>
        <option value="60">1 Hora</option>
        <option value="75">1 Hora e 15 Minutos</option>
        <option value="90">1 Hora e 30 Minutos</option>
        <option value="105">1 Hora e 45 Minutos</option>
        <option value="120">2 Horas</option>
    </select>
    Status do Serviço<br/>
    <select required="required" id="status" name="status">
        <option value="1" selected="selected">Ativo</option>
        <option value="5">Em Breve</option>
        <option value="2">Indisponivel</option>
        <option value="3">Desabilitado</option>
    </select><br/>
    <input readonly="readonly" value="Alterar Serviço" onclick="formAlt()"/>
</body>