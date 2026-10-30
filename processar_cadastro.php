<?php
session_start();
require_once __DIR__ . "/includes/funcoes.php";

// Só processa requisições POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

// Recebimento dos dados
$nome  = limparTexto(filter_input(INPUT_POST, "nome", FILTER_DEFAULT) ?? "");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

// Validação (ordem: nome, e-mail, idade)
$erro = "";
if ($nome === "") {
    $erro = "O nome é obrigatório.";
} elseif ($email === false || $email === null) {
    $erro = "Informe um e-mail válido.";
} elseif ($idade === false || $idade === null || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

// Cadastro inválido: volta ao formulário preservando os dados
if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    $_SESSION["dados_anteriores"] = [
        "nome"  => $nome,
        "email" => $_POST["email"] ?? "",
        "idade" => $_POST["idade"] ?? "",
    ];
    header("Location: cadastro.php");
    exit;
}

// Cadastro válido
$_SESSION["aluno"] = [
    "nome"  => $nome,
    "email" => $email,
    "idade" => $idade,
];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
