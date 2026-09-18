<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";


/* =========================
   PEGAR O ID DA URL
========================= */

if (!isset($_GET["id"])) {
    header("Location: personagens.php");
    exit;
}

$id = $_GET["id"];


/* =========================
   BUSCAR O PERSONAGEM
========================= */

$sql = "SELECT * FROM personagens WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();


/* =========================
   VERIFICAR SE EXISTE
========================= */

if ($resultado->num_rows !== 1) {
    echo "Personagem não encontrado.";
    exit;
}

$personagem = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($personagem["nome"]); ?>
        - Dragon Ball Archive
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- =========================
         CABEÇALHO
    ========================= -->

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


    <main class="perfil-personagem"
    >

        <section class="perfil-conteudo">


            <div class="perfil-imagem">

                <?php if (!empty($personagem["imagem"])): ?>

                    <img
                        src="<?php echo htmlspecialchars($personagem["imagem"]); ?>"
                        alt="<?php echo htmlspecialchars($personagem["nome"]); ?>"
                    >

                <?php else: ?>

                    <div class="sem-imagem">
                        SEM IMAGEM
                    </div>

                <?php endif; ?>

            </div>


            

            <div class="perfil-informacoes">

                <span>
                    PERSONAGEM
                </span>

                <h1>
                    <?php echo htmlspecialchars($personagem["nome"]); ?>
                </h1>


                <div class="informacao">

                    <strong>
                        RAÇA
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["raca"]); ?>
                    </p>

                </div>


                <div class="informacao">

                    <strong>
                        PLANETA DE ORIGEM
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["planeta_origem"]); ?>
                    </p>

                </div>


                <div class="informacao">

                    <strong>
                        TÉCNICA PRINCIPAL
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["tecnica_principal"]); ?>
                    </p>

                </div>


                <div class="informacao">

                    <strong>
                        TRANSFORMAÇÃO
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["transformacao"]); ?>
                    </p>

                </div>


            </div>

        </section>


        <section class="recursos-ia">

            <span>
                RECURSOS DO ARQUIVO
            </span>

            <h2>
                EXPLORE MAIS SOBRE ESTE PERSONAGEM
            </h2>

            <div class="ia-botoes">

                <button>
                    GERAR DESCRIÇÃO
                </button>

                <button>
                    EXPLICAR TÉCNICA
                </button>

                <button>
                    GERAR CURIOSIDADE
                </button>

                <button>
                    EXPLICAR HISTÓRIA
                </button>

            </div>

        </section>


        <a
            href="personagens.php"
            class="voltar"
        >
            ← VOLTAR PARA PERSONAGENS
        </a>

    </main>


</body>

</html>

<?php

$stmt->close();
$conexao->close();

?>
