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

    <title>Técnicas - Dragon Ball Archive</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header class="cabecalho">

    <div class="logo">
        🐉 DRAGON BALL ARCHIVE
    </div>

    <nav>

        <a href="home.php">
            Início
        </a>

        <a href="personagens.php">
            Personagens
        </a>

        <a href="tecnicas.php">
            Técnicas
        </a>

        <a href="transformacoes.php">
            Transformações
        </a>

        <a href="sagas.php">
            Sagas
        </a>

    </nav>

    <div class="usuario">

        Olá,
        <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>

        <a href="logout.php">
            Sair
        </a>

    </div>

</header>


<main class="pagina-tecnicas">

    <section class="topo-tecnicas">

        <span>
            DRAGON BALL ARCHIVE
        </span>

        <h1>
            TÉCNICAS
        </h1>

        <p>
            Conheça algumas das principais técnicas do universo Dragon Ball.
        </p>

    </section>


    <section class="cards-tecnicas">


        <article class="card-tecnica">

            <h2>
                KAMEHAMEHA
            </h2>

            <p>
                Uma poderosa técnica de concentração e
                lançamento de energia, criada pelo Mestre Kame.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIOS
                </strong>

                <span>
                    Goku, Mestre Kame e Gohan
                </span>

            </div>

        </article>


        <article class="card-tecnica">

            <h2>
                FINAL FLASH
            </h2>

            <p>
                Uma das técnicas mais poderosas de Vegeta,
                concentrando uma enorme quantidade de energia.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIO PRINCIPAL
                </strong>

                <span>
                    Vegeta
                </span>

            </div>

        </article>


        <article class="card-tecnica">

            <h2>
                GALICK GUN
            </h2>

            <p>
                Técnica de energia utilizada por Vegeta,
                disparada pelas mãos em direção ao adversário.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIO PRINCIPAL
                </strong>

                <span>
                    Vegeta
                </span>

            </div>

        </article>


        <article class="card-tecnica">

            <h2>
                GENKI-DAMA
            </h2>

            <p>
                Técnica que reúne energia vital de seres vivos
                para formar uma enorme esfera de energia.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIO PRINCIPAL
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


        <article class="card-tecnica">

            <h2>
                MASENKO
            </h2>

            <p>
                Técnica de energia utilizada principalmente
                por guerreiros Namekuseijins e seus alunos.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIO PRINCIPAL
                </strong>

                <span>
                    Gohan
                </span>

            </div>

        </article>


        <article class="card-tecnica">

            <h2>
                KAIoken
            </h2>

            <p>
                Técnica ensinada pelo Senhor Kaio que aumenta
                temporariamente o poder do usuário.
            </p>

            <div class="tecnica-detalhe">

                <strong>
                    USUÁRIO PRINCIPAL
                </strong>

                <span>
                    Goku
                </span>

            </div>

        </article>


    </section>

</main>


</body>

</html>
