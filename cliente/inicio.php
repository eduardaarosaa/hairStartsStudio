<?php 
    include "../pass.php";
?>
<html>

<head>
    <link href="../style.css" rel="stylesheet">
    <link href="../styleAr.css" rel="stylesheet">
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
                        <?php echo "Bem vindo(a), ".$_SESSION['nome']." !"?>
                    </p>
                    <a href="../exit.php">Sair</a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="fix">
            <article>
                <img src="../icon/calendario.png" />
                <p>Agendamentos</p>
            </article>
            <a href="area.php">
            <article>
                <img src="../icon/info.png" />
                <p>Info. Pessoal</p>
            </article>
            </a>
            <a href="../home.php">
                <article>
                    <img src="../icon/voltar.png" />
                    <p>Voltar</p>
                </article>
            </a>
            </article>
        </div>
    </section>
    <section>
        <div class="fix">
            <center>
                <p class="alerta">Clique em uma das opções!</p>
            </center>
        </div>
    </section>
    <footer>
        <div class="fix">
            
        </div>
    </footer>

</body>

</html>