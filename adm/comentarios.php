<?php 
    include "../pass.php"; 
?>

<html>

<head>
    <link href="../style.css" rel="stylesheet">
    <link href="../styleAr.css" rel="stylesheet">
    <link href="../styleCom.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="fix">
            <div class="logo">
                <p>Hair Stars <span>Studio</span>
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
    <section>
        <div class="fix">
    </section>

    <section>
        <center>
            <?php
            // Seleciona tudo da tabela comentarios       
            $query = "SELECT * FROM comentarios";
            $result = $mysqli->query($query);

            // Passa cada resultado, para dentro de uma Array
            while($row = $result->fetch_array()){

                // Caso o comentario não tenha sido feito por um usuario (logado, ou seja, caso tenha idLogin)
                if($row[5]==null){
                $rows[] = $row;
                } else {
                    // As informações dele são substituidas pela registradas pelas do perfil dele,
                    // Para caso um dia, ele alterar as informações pessoais, as mesmas sejam "rebatidas" aqui
                    $sql = "SELECT b.idComent, a.nome, a.email, a.telefone, b.comentario 
                            FROM usuario a INNER JOIN comentarios b 
                            WHERE a.idLogin = $row[5] AND b.idComent = $row[0]";

                    $query = $mysqli->query($sql);
                    $row = $query->fetch_array();
                    // Feito isso essa linha de informação (array) é adicionada a outro array($rows[]),
                    // e o loop do while continua
                    $rows[] = $row;
            }
        }   
            // É pego cada array dentro do array "$rows[]" e passado um a um, por vez,
            // como um array menor com outro nome
            foreach($rows as $result){
                echo "<table id='$result[0]'><tbody>";
                echo "<tr><td>Nome:</td><td>$result[1]<div><img class='fechar' src='../icon/fechar.png'/></div></td></tr>";
                echo "<tr><td>Email:</td><td>$result[2]</td></tr>";
                echo "<tr><td>Telefone:</td><td>$result[3]</td></tr>";
                echo "<tr><td class='com' colspan='2'>$result[4]</td></tr>";
                echo "</tbody></table>";
            }
            
        ?>
        
        </center>
        <div class="fix">
        <a href="inicio.php">
                <article>
                    <img src="../icon/voltar.png" />
                    <p>Voltar</p>
                </article>
            </a>
        </div>
        </div>
    </section>
    <footer>
        <div class="fix">

        </div>
        </div>
    </footer>

</body>

</html>