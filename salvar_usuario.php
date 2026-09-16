<?php

require_once "conexao.php";

$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, usuario, email, senha)
        VALUES (?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "ssss",
    $nome,
    $usuario,
    $email,
    $senha_hash
);

if ($stmt->execute()) {

    echo "Usuário cadastrado com sucesso!";

} else {

    echo "Erro ao cadastrar usuário: " . $conexao->error;

}

$stmt->close();
$conexao->close();

?>
