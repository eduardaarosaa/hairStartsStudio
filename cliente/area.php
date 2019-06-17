<?php 
    include "../pass.php";
?>
<html>

<head>
    <link href="../style.css" rel="stylesheet">
    <link href="../styleAr.css" rel="stylesheet">
    <link href="../styleCom.css" rel="stylesheet">
    <style>
        .login:first-of-type{
            margin: 100px 50px; 
        }
        .login{
            display: inline-block;
            margin: 100px 150px 100px 50px;
        }
        .voltar{
            display: inline-block;
        }
        .sucess{
            position: absolute;
            font-family: "nexa";
            margin: -40px;
            font-size: 1.20em;
            width: 100%;
            background-color: #329932;
            color: #ffffff;
            padding: 5px 0;
        }
        div.error{
            position: absolute;
            font-family: "nexa";
            margin: -40px;
            font-size: 1.20em;
            width: 100%;
            background-color: #d73232;
            color: #ffffff;
            padding: 5px 0;
        }
        section:first-of-type article {
            width: 250px;
            height: 250px;
            margin: 0 0 0 0;
            display: inline-flex;
            position: relative;
            background-color: #f2c22e;
        }
    </style>
    <script>
    window.onload = function(){                
        var req = new XMLHttpRequest;
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                var json = JSON.parse(this.responseText);
                document.getElementById("nome").value = json["nome"];
                document.getElementById("tel").value = json["telefone"];
                document.getElementById("end").value = json["endereco"];
                document.getElementById("email").value = json["email"];
            }
        };
        req.open("POST", "../js/ajax/ajaxPHP/ajaxInfoCliente.php", true);
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send();
    }
        function limpar(){
            try{
                document.getElementsByClassName("alert")[0].innerHTML = "";
            } catch(err){
                return;
            }
        }
        function verificar() {
            var pp = document.getElementById("csenha").value;
            var p = document.getElementById("senha").value;
            if(!p || !pp){
                return;
            }else{
                if (pp != p) {
                    var html = "<span class='error'>Senhas não batem</span>";
                    var x = document.getElementsByTagName("FORM");
                    var span = document.createElement("SPAN"); 
                    var ref = document.createElement("SPAN");
                    ref.setAttribute("id", "response");
                    span.innerHTML = html;       
                    
                    if (x[0].childNodes[3].tagName == "SPAN"){
                        document.getElementById("response").innerHTML = span.innerHTML;
                    } else {
                        x[0].insertBefore(ref, x[0].childNodes[3]);
                        document.getElementById("response").innerHTML = span.innerHTML;
                    }
                } else {
                    try {
                        document.getElementById("response").innerHTML = "";
                    } catch(err){
                        return;
                    }
                }
            }
        }
    </script>
</head>

<body>
    <header>
        <div class="fix">
            <div class="logo">
                <p>Hair Stars <span>Studio</span>
                </p>
            </div>
            <p class="local">Área do Cliente</p>
            <div class="nav">
                <div class="menu">
                    <p>
                        <?php echo "Bem vindo(a), ".$_SESSION['nome']." !" ?>
                    </p>
                    <a href="../exit.php">Sair</a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="fix">
            <form class="login" id="form" action="#" method="POST">
                Senha Atual:</br><input name="passA" id="pass" type="password" required/></br>
                Senha:</br><input name="pass" id="senha" type="password" onblur="verificar(), limpar()" required/></br>
                Confirmar senha:</br><input name="passV" id="csenha" type="password" onblur="verificar(), limpar()" required/></br>
                <button type="submit">Atualizar Senha</button>
           </form>
           <form class="login" id="form" action="#" method="GET">
                Nome:*</br><input name="nome" id="nome" type="text" required/></br>
                Telefone:*</br><input name="telefone" id="tel" type="number" required/></br>
                Endereço:</br><input name="end" id="end" type="text"/></br>
                Email:</br><input name="email" id="email" type="email"/></br>
                <button type="submit">Atualizar Dados</button>
            </form>
            <a class="voltar" href="inicio.php">
                <article>
                    <img src="../icon/voltar.png" />
                    <p>Voltar</p>
                </article>
            </a>
        </div>
    </section>
    <section>
        <div class="fix">
        <?php 
        if($_GET){
            $nome = $_GET['nome'];
            $tel = $_GET['telefone'];
            $end = $_GET['end'];
            $email = $_GET['email'];

            $_SESSION['nome'] = $nome;

            $id = $_SESSION['id'];
            $sql = "UPDATE usuario a
                    SET a.nome = '$nome', a.telefone = '$tel', 
                    a.endereco = '$end', a.email = '$email'
                    WHERE idLogin = $id";
            $query = $mysqli->query($sql);
            if($query){
                echo "<center><div class='sucess'>Dados Atualizados com sucesso!</span></center>";
            } else {
                echo "<center><div class='error'>Falha ao atualizar dados</span></center>";
            }
        }
        if($_POST){
            $atual = $_POST['passA'];
            $senha = $_POST['pass'];
            $conSenha = $_POST['passV'];

            $id = $_SESSION['id'];

            if($_SESSION['pass'] == $atual){
                if($senha == $conSenha){
                    $sql = "UPDATE login
                            SET userPass = BINARY '$senha'
                            WHERE idLogin = $id";
                    $query = $mysqli->query($sql);
                    if($query){
                        echo "<center><div class='sucess'>Senha atualizada com sucesso!</span></center>";
                    } else {
                        echo "<center><div class='error'>Falha ao atualizar senha</span></center>";
                    }
                } else {
                    echo "<center><div class='error'>Falha ao atualizar senha, senhas não batem</span></center>";
                }
            } else {
                echo "<center><div class='error'>Falha ao atualizar senha, senha atual incorreta</span></center>";
            }
        }
        ?>
        </div>
    </section>
    <footer>
        <div class="fix">
            
        </div>
    </footer>

</body>

</html>