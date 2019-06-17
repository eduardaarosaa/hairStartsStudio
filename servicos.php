<?php
session_start();
?>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <link href="styleSE.css" rel="stylesheet">
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
    <section><span class="span">Nossos Serviços</span></section>
    <section>
        <div class="fix">
            <p class="titulo">Conheça nossos serviços !</p></br>
            <article>
                <div><img src="image/luzes.jpg" /></div>
                <p><span>Luzes:</span> As luzes são a melhor técnica para a mulher que quer iluminar o cabelo de forma sutil. As mechas são
                    puxadas da raiz e não tem tanto contraste com a cor natural dos fios. Também é uma ótima opção para ficar
                    loira aos poucas!
                </p>
            </article>
            <article>
                <div><img src="image/escova.jpg" /></div>
                <p> <span>Escova:</span> A escova, é uma ótima auxiliar para um penteado, provisório, ressalta o cabelo e o também brilhoso
                    e leve, tirando da rotina de seus cabelos.
                </p>
            </article>
            <article>
                <div><img src="image/pedi.jpeg" /></div>
                <p><span>Manicure e Pedicure:</span> Toda mulher merece, estar arrumada da cabeça aos pés, e com as unhas não é diferente.
                    Temos manicure e pedicure profissionais que completam nosso time dentro do Hair Start Studio.
                </p>
            </article>
            <article>
                <div><img src="image/gel.jpg" /></div>
                <p><span>Gel:</span> Uma das melhores soluções para ter umas unhas cuidadas por mais tempo são as unhas de gel.
                </p>
            </article>
            <article>
                <div><img src="image/massagem.jpg" /></div>
                <p><span>Massagem:</span> Venha conferir nossas massagens para relaxamento!
                </p>
            </article>
            <article>
                <div><img src="image/sombra.jpg" /></div>
                <p><span>Design de sombrancelhas:</span> Design de sobrancelha, venha limpar e desenhar sua sobrancelha para realçar seu
                    olhar.
                </p>
            </article>
            <article>
                <div><img src="image/henna.jpg" /></div>
                <p><span>Sobrancelha com Hena:</span> Com a sobrancelha de hena, você pode pigmentar sua sobrancelha deixando ela mais visível.
                </p>
            </article>
            <article>
                <div><img src="image/micro.jpg" /></div>
                <p><span>Micropmentação:</span> Com a micropgmentação, você pode ter a facilidade e praticidade em ficar sem retocar sua
                    sobrancelha em até 2 anos.
                </p>
            </article>
            <article>
                <div><img src="image/penteados.jpg" /></div>
                <p><span>Penteados:</span> Trabalhamos com diversos penteados, usando coques, tranças, rabo de cavalo, tanto pra noivas,
                    madrinhas, convidados de casamento, debutante, venha conferir.
                </p>
            </article>
            <article>
                <div><img src="image/tintura.jpg" /></div>
                <p><span>Tintura:</span> Tinturas, trabalhamos com as melhores marcas do mercado, para que tenhamos os melhores resultados
                    e você saia do nosso Studio, com total satisfação.
                </p>
            </article>
            <article>
                <div><img src="image/noiva.jpg" /></div>
                <p><span>Dia da noiva:</span> Temos o dia da noiva venha nos visitar e conhecer nossos serviços do dia da noiva, temos manicure,
                    pedicure, peteados, massagem, depilação, maquiagem, sobrancelha, pele entre outros serviços temos pacotes,
                    venha conferir.
                </p>
            </article>
            <article>
                <div><img src="image/cortem.jpg" /></div>
                <p><span>Corte de cabelo masculino:</span> temos especialistas, para todos os tipos de cabelos.
                </p>
            </article>
            <article>
                <div><img src="image/corte.jpg" /></div>
                <p><span>Corte de cabelo feminino:</span> venha se sentir leve conosco.
                </p>
            </article>
            <article>
                <div><img src="image/sais.jpg" /></div>
                <p><span>Banho de sais:</span> Temos banho de sais, onde você poderá relaxar e trazer as energias novamente para sua pele
                    e seu corpo.
                </p>
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