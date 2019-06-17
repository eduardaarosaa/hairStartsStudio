<html>
    <body>
    <style>
    .login{
        margin: 100px 0 0 0;
    }
    .login input:last-of-type{
        float: right;
        width: 135px;
        margin: 15px 0 0 0;
    }
    </style>
    <!-- Formulario para registro de serviços, sera incluso dentro de outra pagina via AJAX -->
<form action="#" method="POST" name="add" class="login">
    Nome do Serviço<br/>
    <input type="text" name="serv" id="serv" required="required" /><br/> 
    Tempo Estimado<br/>
    <select required="required" name="TE">
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
    <select required="required" name="status">
        <option value="1" selected="selected">Ativo</option>
        <option value="5">Em Breve</option>
        <option value="2">Indisponivel</option>
        <option value="3">Desabilitado</option>
    </select><br/>
    <input readonly="readonly" value="Adicionar Serviço" onclick="formAdd()"/>
</form>
</body>
</html>