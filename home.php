<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dragon Ball Archive</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header class="cabecalho">

        <div class="logo">
            🐉 DRAGON BALL ARCHIVE
        </div>

        <nav>

            <a href="home.php">Início</a>

            <a href="personagens.php">Personagens</a>

            <a href="tecnicas.php">Técnicas</a>

            <a href="transformacoes.php">Transformações</a>

            <a href="sagas.php">Sagas</a>

        </nav>

        <div class="usuario">

            Olá, <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>

            <a href="logout.php">Sair</a>

        </div>

    </header>


    <main class="home">

        <section class="hero">

            <div class="hero-conteudo">

                <span>DRAGON BALL ARCHIVE</span>

                <h1>
                    EXPLORE O UNIVERSO
                    <br>
                    DRAGON BALL
                </h1>

                <p>
                    Descubra personagens, técnicas, transformações
                    e histórias que marcaram o universo Dragon Ball.
                </p>

                <a href="personagens.php" class="botao">
                    EXPLORAR PERSONAGENS
                </a>

            </div>

        </section>


        <section class="categorias">

            <h2>EXPLORE O ARQUIVO</h2>

            <div class="cards">

                <a href="personagens.php" class="card">

                    <div class="icone">👤</div>

                    <h3>PERSONAGENS</h3>

                    <p>
                        Conheça os personagens
                        do universo Dragon Ball.
                    </p>

                </a>


                <a href="tecnicas.php" class="card">

                    <div class="icone">⚡</div>

                    <h3>TÉCNICAS</h3>

                    <p>
                        Descubra golpes e
                        habilidades especiais.
                    </p>

                </a>


                <a href="transformacoes.php" class="card">

                    <div class="icone">🔥</div>

                    <h3>TRANSFORMAÇÕES</h3>

                    <p>
                        Explore as principais
                        transformações.
                    </p>

                </a>


                <a href="sagas.php" class="card">

                    <div class="icone">📖</div>

                    <h3>SAGAS</h3>

                    <p>
                        Reviva as histórias
                        do universo Dragon Ball.
                    </p>

                </a>

            </div>

        </section>

    </main>

</body>

</html>
