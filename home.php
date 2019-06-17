<?php
session_start();
?>
<html>

<head>
    <link href="styleH.css" rel="stylesheet">
</head>

<body>
    <header>
         <div class="fix">
            <div class="logo">
                <p>Hair Stars <span>Studio</span>
            </div>
            <div class="nav">
            <div class="menu">
                <a href="sobre.php">Sobre nós</a>
                <a href="agendamentos.php">Agendamentos</a>
                <a href="servicos.php"> Serviços</a>
                <a href="galeria.php">Galeria</a>
                <a href="contato.php">Contato</a>
                    <?php if(!$_SESSION){
                echo '<a href="login.php">Login</a>';
                } else {echo "<a href='cliente/inicio.php'>Minha Área</a>".
                '<a href="exit.php">Sair</a>';}?>
            </div>
        </div>
        </div>
    </header>
    <section><img src="model.png" />
        <div class="call">
            <article>
                Promoção do mês: </br>
                Faça um corte e uma escova e ganhe
                <p>50% OFF!!!</p>
            </article>
            <div>
                na hidratação.
            </div>
        </div>
        <div class="button">
            <a href="login.php">
                <aside>Agende agora!</aside>
            </a>
        </div>
    </section>
    <section class="serv">
        <div class="fix">
            <p class="subtitulo">Conheça nossos serviços !</p>
            <article>
                <img src='icon/serv1.png' />
                <p>Um makeup pode ter efeitos mágicos, quando feito nas mãos de um profissional</p>
            </article>
            <article>
                <img src='icon/serv2.png' />
                <p>Deixe sua pele 10 anos mais nova, com nossas tecnicas de hidratação e esfoliamento</p>
            </article>
            <article>
                <img src='icon/serv3.png' />
                <p>Não é apenas um trabalho a se fazer, mas sim uma arte a ser elaborada</p>
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