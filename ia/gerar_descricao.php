<?php

require_once "config_ia.php";

if (!isset($_GET["id"])) {
    echo "Personagem não informado.";
    exit;
}

$id = intval($_GET["id"]);

require_once "../conexao.php";

$sql = "SELECT * FROM personagens WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Personagem não encontrado.";
    exit;
}

$personagem = $resultado->fetch_assoc();

$nome = $personagem["nome"];
$raca = $personagem["raca"];
$planeta = $personagem["planeta_origem"];
$tecnica = $personagem["tecnica_principal"];
$transformacao = $personagem["transformacao"];

$url = "https://router.huggingface.co/v1/chat/completions";

$prompt = "Crie uma descrição curta e interessante sobre o personagem $nome de Dragon Ball. 
Raça: $raca.
Planeta de origem: $planeta.
Técnica principal: $tecnica.
Transformação: $transformacao.

Escreva somente em português. Não invente informações que não foram fornecidas.";

$dados = [
    "model" => "openai/gpt-oss-120b",
    "messages" => [
        [
            "role" => "user",
            "content" => $prompt
        ]
    ],
    "max_tokens" => 200
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $token_huggingface,
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));

$resposta = curl_exec($ch);

$codigo_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$resposta_json = json_decode($resposta, true);

if ($codigo_http !== 200) {
    echo "Erro na IA. Código HTTP: " . $codigo_http;
    exit;
}

$texto_ia = $resposta_json["choices"][0]["message"]["content"];

echo nl2br(htmlspecialchars($texto_ia));
?>
