<?php 
session_start();
    //Verifica se foi feito o login, se sim, encaminha para sua devida area
    if($_SESSION == true){
        if($_SESSION['tipo'] == 3){
            $acc = 'cliente/inicio.php';
        }if($_SESSION['tipo'] == 1){
            $acc = 'adm/inicio.php';
        }if($_SESSION['tipo'] == 0){
            $acc = "atendente/inicio.php";
        }
    header('Location: '.$acc);
    }
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleAr.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="fix">
            <div class="logo">
                <p>Hair Stars <span>Studio</span>
                </p>
            </div>
            <p class="local">Área de Login</p>
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
                Login:</br><input name="nome" type="text"/></br>
                Senha:</br><input name="pass" type="password"/></br>
                <a href="cadastro.php">Cadastre-se</a>
                <button type="reset">Limpar</button>
                <button type="submit" name='login'>Logar</button>
                <?php
                    if (isset($_POST['login'])) {
                        @include "validar.php";
                    }
                ?>
            </form>
        </div>
    </section>
    <footer>
        <div class="fix">
            
        </div>
    </footer>

</body>

</html>