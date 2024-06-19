<?php
session_start();
ob_start();
include("conexao.php");

// Capturar os dados enviados via POST
$nome = mysqli_real_escape_string($conn, trim($_POST['name']));
$snome = mysqli_real_escape_string($conn, trim($_POST['sname']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$senha = mysqli_real_escape_string($conn, trim($_POST['senha']));
$nivel_acesso = isset($_POST['nivel_acesso']) ? $_POST['nivel_acesso'] : 'admin'; // Define 'usuario' como padrão

// Verificar se o usuário já existe
$sql = "SELECT COUNT(*) AS total FROM cliente WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['email_existe'] = true;
    header('Location: cadastrar.php');
    exit;
}

// Inserir novo usuário
$senha_hash = password_hash($senha, PASSWORD_BCRYPT); // Hash da senha
$insert = "INSERT INTO cliente (nome, snome, email, senha, nivel_acesso) VALUES ('$nome', '$snome', '$email', '$senha_hash', '$nivel_acesso')";

if ($conn->query($insert) === true) {
    $_SESSION['status_cadastrar'] = true;
    header('Location: Entrar.php'); // Redirecionar para a tela de login
    exit;
} else {
    $_SESSION['erro_cadastrar'] = true;
    header('Location: cadastrar.php');
    exit;
}

$conn->close();
?>