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
            <p class="local">Área do Atendente</p>
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
            <article>
                <img src="../icon/calendario.png" />
                <p>Agendamentos</p>
            </article>
            <a href="comentarios.php">
                <article>
                    <img src="../icon/comentario.png" />
                    <p>Comentários</p>
                </article>
            </a>
            <article>
                <img src="../icon/clientes2.png" />
                <p>Clientes</p>
            </article>
        </div>
    </section>
    <section>
        <div class="fix">
            <center>
                <p class="alerta">Clique em uma das opções para gerenciar</p>
            </center>
        </div>
    </section>
    <footer>
        <div class="fix">

        </div>
        </div>
    </footer>

</body>

</html>