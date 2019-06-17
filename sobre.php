<?php
session_start();
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleS.css" rel="stylesheet">
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
    <section><span class="span">Sobre nós</span></section>
    <section>
        <div class="fix">
            <article> A Hair Stars Studio foi fundada em 2010, com o propósito de transformar sonhos em realidade. Trabalhamos com
                exclentes profissionais e as melhores marcas do mercado. Estamos localizados, na Av. Bartolomeu de Carlos, 230 - Jardim Flor da Montanha, Guarulhos - SP, 07097-420 dentro do Shopping Maia no
                2º andar na loja 53. Venha nos conhecer !
            </article>
            <span>Missão</span></br>
            <article>
                
                "Nossa missão é transformar, e renovar a real beleza que existe dentro de nossos clientes, deixando-os satisfeitos, e com
                alto estima elevada."
            </article>
            <span>Visão</span></br>
            <article>
                
                "Nossa visão dentro do mercado, é fazer com que nossa empresa cresça cada vez mais e que venha competir com grandes empresas
                de porte, mas além de crescer como empresa, tendo nome, nossa visão é que nos sejamos a 1º opção de nossos
                clientes sempre."
            </article>
            <span>Valores</span></br>
            <article>
                
                "Nossos valores são satisfazer sempre o cliente para que ele se agrade com sua nova imagem."</br> "Respeitar nossos clientes sendo
                sempre honestos com eles."</br> "Ser sempre transparente, e transparecer a felicidade."

            </article>

        </div>
        </form>
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