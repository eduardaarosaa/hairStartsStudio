<?php
session_start();
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleG.css" rel="stylesheet">
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
                } else {echo '<a href="exit.php">Sair</a>';}?>
                </div>
            </div>
        </div>
    </header>
    <section><span class="span">Galeria</span></section>
    <section>
        <div class="fix">
            <article>
                <p>Conheça um pouco de nossos espaços</p>
                <img src="image/s1.jpg" />
            </article>
            <article>
                <img src="image/s2.jpg" />
            </article>
            <article>
                <img src="image/s3.jpg" />
            </article>
            <article>
                <p>Tinturas</p>
                <img src="image/p1.jpg" />
            </article>
            <article>
                <img src="image/pintura.jpg" />
            </article>
            <article>
                <img src="image/p3.jpg" />
            </article>
            <article>
                <p>Luzes</p>
                <img src="image/l1.jpg" />
            </article>
            <article>
                <img src="image/luzes1.jpg" />
            </article>
            <article>
                <img src="image/l3.jpg" />
            </article>
            <article>
                <p>Penteados</p>
                <img src="image/t1.jpg" />
            </article>
            <article>
                <img src="image/t2.jpg" />
            </article>
            <article>
                <img src="image/t3.jpg" />
            </article>
            <article>
                <p>Unhas</p>
                <img src="image/u1.jpg" />
            </article>
            <article>
                <img src="image/unhas.jpg" />
            </article>
            <article>
                <img src="image/u3.jpg" />
            </article>
            <article>
                <p>Cortes</p>
                <img src="image/c1.jpg" />
            </article>
            <article>
                <img src="image/corte1.jpg" />
            </article>
            <article classe="corte">
                <img src="image/corte2.png" />
            </article>
        </div>
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