<?php 
    include "../pass.php";
?>
<html>

<head>
    <link href="../style.css" rel="stylesheet">
    <link href="../styleAr.css" rel="stylesheet">
    <link href="../styleInter.css" rel="stylesheet">
    <script src="../js/ajax/ajaxGerAtendente.js"></script>
</head>

<body>
    <header>
        <div class="fix">
            <div class="logo">
                <p>Hair Stars
                    <span>Studio</span>
                </p>
            </div>
            <p class="local">Área do Administrador</p>
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
    <div class="fix">
    <section>
            <center>
            </center>
            <aside>
                <article class="ativo">
                    <img src="../icon/plus.ico" />
                    <p>Adicionar Atendente</p>
                </article>
                <article>
                    <img src="../icon/plus.ico" />
                    <p>Alterar Atendente</p>
                </article>
                <a href="inicio.php">
                    <article>
                        <img src="../icon/voltar.png" />
                        <p>Voltar</p>
                    </article>
                </a>
            </aside>
    </section>
    <section></section>
    </div>
    <footer>
        <div class="fix"></div>
    </footer>
</body>

</html>