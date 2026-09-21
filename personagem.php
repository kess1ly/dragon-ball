<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "conexao.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: personagens.php");
    exit;
}

$sql = "SELECT * FROM personagens WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header("Location: personagens.php");
    exit;
}

$personagem = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>
        <?php echo htmlspecialchars($personagem["nome"]); ?>
        - Dragon Ball Archive
    </title>

    <link rel="stylesheet" href="style.css">

    <style>

        /* ==============================
           PÁGINA DO PERSONAGEM
        ============================== */

        .arquivo-personagem {

            min-height: calc(100vh - 75px);

            padding: 50px 70px 80px;

            background:
                linear-gradient(
                    rgba(3, 8, 18, 0.82),
                    rgba(3, 8, 18, 0.96)
                ),
                url("fundo-formulario.png");

            background-size: cover;

            background-position: center;

            background-repeat: no-repeat;

        }


        /* ==============================
           TOPO DO ARQUIVO
        ============================== */

        .cabecalho-personagem {

            max-width: 1200px;

            margin: 0 auto 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-bottom: 18px;

            border-bottom: 1px solid #24334a;

        }


        .codigo-arquivo {

            color: #aeb7c5;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 3px;

        }


        .status-arquivo {

            color: #ffb900;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 2px;

        }


        /* ==============================
           ÁREA PRINCIPAL
        ============================== */

        .personagem-principal {

            max-width: 1200px;

            margin: 0 auto;

            display: grid;

            grid-template-columns: 480px 1fr;

            gap: 60px;

            align-items: center;

        }


        /* ==============================
           IMAGEM
        ============================== */

        .personagem-imagem {

            width: 100%;

            height: 620px;

            background: #0d1626;

            border: 1px solid #24334a;

            border-radius: 12px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.5);

        }


        .personagem-imagem img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            display: block;

            transition: 0.4s;

        }


        .personagem-imagem:hover img {

            transform: scale(1.03);

        }


        /* ==============================
           INFORMAÇÕES
        ============================== */

        .categoria-personagem {

            color: #ffb900;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 4px;

        }


        .personagem-dados h1 {

            margin-top: 18px;

            margin-bottom: 20px;

            font-size: 64px;

            line-height: 0.95;

            font-weight: 900;

            font-style: italic;

            text-transform: uppercase;

            letter-spacing: 2px;

            color: white;

        }


        .descricao-arquivo {

            margin-bottom: 40px;

            color: #aeb7c5;

            font-size: 14px;

            line-height: 1.7;

        }


        /* ==============================
           DADOS
        ============================== */

        .dados-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 0 30px;

            border-top: 1px solid #24334a;

        }


        .dado {

            padding: 22px 0;

            border-bottom: 1px solid #24334a;

        }


        .dado strong {

            display: block;

            margin-bottom: 8px;

            color: #ffb900;

            font-size: 11px;

            letter-spacing: 2px;

        }


        .dado p {

            color: #d9dee7;

            font-size: 17px;

            font-weight: 600;

        }


        /* ==============================
           SEÇÕES
        ============================== */

        .estatisticas-personagem,
        .recursos-personagem {

            max-width: 1200px;

            margin: 80px auto 0;

            padding-top: 50px;

            border-top: 1px solid #24334a;

        }


        .titulo-secao span {

            color: #ffb900;

            font-size: 11px;

            font-weight: bold;

            letter-spacing: 4px;

        }


        .titulo-secao h2 {

            margin-top: 12px;

            margin-bottom: 35px;

            color: white;

            font-size: 30px;

            font-weight: 900;

        }


        /* ==============================
           ESTATÍSTICAS
        ============================== */

        .estatisticas-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 30px 50px;

        }


        .estatistica-topo {

            display: flex;

            justify-content: space-between;

            margin-bottom: 10px;

        }


        .estatistica-topo strong {

            color: #d9dee7;

            font-size: 12px;

            letter-spacing: 2px;

        }


        .estatistica-topo span {

            color: #ffb900;

            font-size: 12px;

            font-weight: bold;

        }


        .barra {

            width: 100%;

            height: 7px;

            background: #111a2b;

            border: 1px solid #24334a;

            overflow: hidden;

        }


        .barra div {

            height: 100%;

            background: #ffb900;

        }


        /* ==============================
           RECURSOS
        ============================== */

        .recursos-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;

        }


        .recurso {

            min-height: 150px;

            padding: 25px;

            text-align: left;

            background: #0d1626;

            border: 1px solid #24334a;

            border-radius: 8px;

            color: white;

            cursor: pointer;

            transition: 0.3s;

        }


        .recurso:hover {

            background: #111d31;

            border-color: #ffb900;

            transform: translateY(-4px);

        }


        .numero-recurso {

            display: block;

            margin-bottom: 20px;

            color: #ffb900;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 2px;

        }


        .recurso strong {

            display: block;

            margin-bottom: 8px;

            font-size: 16px;

        }


        .recurso small {

            color: #aeb7c5;

            font-size: 13px;

            line-height: 1.5;

        }


        /* ==============================
           RESULTADO
        ============================== */

        .resultado-ia {

            margin-top: 30px;

            min-height: 180px;

            background: #080f1c;

            border: 1px solid #24334a;

            border-radius: 8px;

            overflow: hidden;

        }


        .resultado-topo {

            display: flex;

            justify-content: space-between;

            padding: 16px 22px;

            background: #0d1626;

            border-bottom: 1px solid #24334a;

        }


        .resultado-topo span {

            color: #ffb900;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 3px;

        }


        .resultado-conteudo {

            padding: 25px;

        }


        .resultado-conteudo p {

            color: #aeb7c5;

            font-size: 14px;

            line-height: 1.7;

        }


        /* ==============================
           VOLTAR
        ============================== */

        .voltar-arquivo {

            display: block;

            max-width: 1200px;

            margin: 40px auto 0;

            color: #ffb900;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 2px;

        }


        .voltar-arquivo:hover {

            color: white;

        }

    </style>

</head>


<body>


<header class="cabecalho">

    <div class="logo">
        DRAGON BALL ARCHIVE
    </div>


    <nav>

        <a href="home.php">
            INÍCIO
        </a>

        <a href="personagens.php">
            PERSONAGENS
        </a>

        <a href="tecnicas.php">
            TÉCNICAS
        </a>

        <a href="transformacoes.php">
            TRANSFORMAÇÕES
        </a>

        <a href="sagas.php">
            SAGAS
        </a>

    </nav>


    <div class="usuario">

        <span>
            <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>
        </span>

        <a href="logout.php">
            SAIR
        </a>

    </div>

</header>


<main class="arquivo-personagem">


    <section class="cabecalho-personagem">

        <div class="codigo-arquivo">

            ARQUIVO Nº
            <?php echo str_pad($personagem["id"], 4, "0", STR_PAD_LEFT); ?>

        </div>


        <div class="status-arquivo">

            ● ARQUIVO ATIVO

        </div>

    </section>



    <section class="personagem-principal">


        <div class="personagem-imagem">

            <img
                src="<?php echo htmlspecialchars($personagem["imagem"]); ?>"
                alt="<?php echo htmlspecialchars($personagem["nome"]); ?>"
            >

        </div>



        <div class="personagem-dados">

            <span class="categoria-personagem">

                REGISTRO DE PERSONAGEM

            </span>


            <h1>

                <?php echo htmlspecialchars($personagem["nome"]); ?>

            </h1>


            <p class="descricao-arquivo">

                DADOS IDENTIFICADOS NO ARQUIVO OFICIAL
                DO DRAGON BALL ARCHIVE.

            </p>


            <div class="dados-grid">


                <div class="dado">

                    <strong>
                        RAÇA
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["raca"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        PLANETA DE ORIGEM
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["planeta_origem"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        TÉCNICA PRINCIPAL
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["tecnica_principal"]); ?>
                    </p>

                </div>


                <div class="dado">

                    <strong>
                        TRANSFORMAÇÃO
                    </strong>

                    <p>
                        <?php echo htmlspecialchars($personagem["transformacao"]); ?>
                    </p>

                </div>


            </div>

        </div>

    </section>



    <section class="estatisticas-personagem">


        <div class="titulo-secao">

            <span>
                ANÁLISE DE COMBATE
            </span>

            <h2>
                CAPACIDADE DO GUERREIRO
            </h2>

        </div>


        <div class="estatisticas-grid">


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>PODER</strong>

                    <span>95%</span>

                </div>

                <div class="barra">

                    <div style="width: 95%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>TÉCNICA</strong>

                    <span>90%</span>

                </div>

                <div class="barra">

                    <div style="width: 90%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>VELOCIDADE</strong>

                    <span>88%</span>

                </div>

                <div class="barra">

                    <div style="width: 88%;"></div>

                </div>

            </div>


            <div class="estatistica">

                <div class="estatistica-topo">

                    <strong>RESISTÊNCIA</strong>

                    <span>92%</span>

                </div>

                <div class="barra">

                    <div style="width: 92%;"></div>

                </div>

            </div>


        </div>

    </section>



    <section class="recursos-personagem">


        <div class="titulo-secao">

            <span>
                RECURSOS DO ARQUIVO
            </span>

            <h2>
                ANÁLISE INTELIGENTE
            </h2>

        </div>


        <div class="recursos-grid">


            <button class="recurso">

                <span class="numero-recurso">
                    01
                </span>

                <strong>
                    GERAR DESCRIÇÃO
                </strong>

                <small>
                    Criar uma descrição detalhada do personagem.
                </small>

            </button>


            <button class="recurso">

                <span class="numero-recurso">
                    02
                </span>

                <strong>
                    EXPLICAR TÉCNICA
                </strong>

                <small>
                    Descobrir como funciona sua principal técnica.
                </small>

            </button>


            <button class="recurso">

                <span class="numero-recurso">
                    03
                </span>

                <strong>
                    GERAR CURIOSIDADE
                </strong>

                <small>
                    Encontrar uma curiosidade sobre o personagem.
                </small>

            </button>


            <button class="recurso">

                <span class="numero-recurso">
                    04
                </span>

                <strong>
                    EXPLICAR HISTÓRIA
                </strong>

                <small>
                    Gerar um resumo da trajetória do personagem.
                </small>

            </button>


        </div>



        <div class="resultado-ia">


            <div class="resultado-topo">

                <span>
                    RELATÓRIO DO ARQUIVO
                </span>

                <span>
                    AI-ARCHIVE
                </span>

            </div>


            <div class="resultado-conteudo">

                <p>

                    Selecione um dos recursos acima para
                    gerar uma análise deste personagem.

                </p>

            </div>


        </div>


    </section>



    <a href="personagens.php" class="voltar-arquivo">

        ← VOLTAR PARA O ARQUIVO DE PERSONAGENS

    </a>


</main>


</body>

</html>
