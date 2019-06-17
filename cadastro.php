<?php 
session_start();
    //Verifica se foi feito o login, se sim, encaminha para sua devida area
    if($_SESSION == true){
        if($_SESSION['tipo'] == 3){
            $acc = 'cliente/inicio.php';
        }if($_SESSION['tipo'] == 1){
            $acc = 'adm/inicio.php';
        } else {
            $acc = "atendente/inicio.php";
        }
    @header('Location: '.$acc);  
    }
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleAr.css" rel="stylesheet">
    <script src="js/ajax/ajaxValidarInfo.js"></script>
    <script>
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
                //a Diferença desse "setAttribute" pro AJAX "setAttributeNode" é que esse n está disponivel IE8 <<, o outro sim
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
            <p class="local">Área de Cadastro</p>
            <div class="nav">
                <div class="menu">
                    <a href="home.php">Home</a>
                    <a href="sobre.php">Sobre nós</a>
                    <a href="agendamentos.php">Agendamentos</a>
                    <a href="servicos.php"> Serviços</a>
                    <a href="galeria.php">Galeria</a>
                    <a href="contato.php">Contato</a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="fix">
            <form class="login" action="#" method="POST">
            
                Login:*</br><input name="login" id="login" type="text" onblur="limpar()" required/></br>
                Senha:*</br><input name="pass" id="senha" type="password" onblur="verificar(), limpar()" required/></br>
                Confirmar senha:*</br><input name="passV" id="csenha" type="password" onblur="verificar(), limpar()" required/></br>
                Nome:*</br><input name="nome" type="text" required/></br>
                Telefone:*</br><input name="telefone" type="number" required/></br>
                Endereço:</br><input name="end" type="text"/></br>
                Email:</br><input name="email" type="email"/></br>
                <a href="login.php">Voltar</a>
                <button type="reset">Limpar</button>
                <button type="submit" name='cadastrar'>Cadastrar</button>
                <?php
                    if ($_POST == true) {
                        @include "cad.php";
                    }
                ?>
            </form>
        </div>
    </section>
    <footer>
        <div class="fix">
            <div class="elemento">
                <span class="titulo">Titulo 1</span>
                <span class="content">Eduarda Cirina Rosa</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">Titulo 2</span>
                <span class="content">Milena Cirina Rosa</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">titulo 3</span>
                <span class="content">Rosangela Cirina Rosa</span><br>

            </div>
            <div class="elemento">
                <span class="titulo">titulo 4</span>
                <span class="content">Eduardo Aparecido Rosa</span><br>

            </div>
        </div>
        </div>
    </footer>

</body>

</html>