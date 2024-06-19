<?php
session_start();
ob_start();

include("filtros/conexao.php");

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Preencha com seu E-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha com sua Senha";
    } else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        // Consulta SQL para buscar o usuário pelo email
        $sql_code = "SELECT * FROM cliente WHERE email = ?";
        $stmt = $conn->prepare($sql_code);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verifica a senha utilizando password_verify
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['id_cliente'] = $user['id_cliente'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nivel_acesso'] = $user['nivel_acesso'];

                // Redireciona conforme o nível de acesso
                if ($user['nivel_acesso'] == 'admin') {
                    header("Location: dash.php");
                } else {
                    header("Location: usuario.php");
                }
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginEstilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
<section class="split-screen">
    <div class="left">
        <section class="copy">
            <h1>Escolha o melhor parque de estacionamento!</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem velit nesciunt quidem maiores nisi aperiam alias veritatis adipisci totam illo sapiente laborum maxime cupiditate.</p>
        </section>
    </div>
    <div class="right">
        <form action="" method="POST">
            <section class="copy">
                <h2>Entrar</h2>
                <div class="login-container">
                    <p>Ainda não possui uma conta? <a href="cadastrar.php"><strong>Registrar</strong></a></p> 
                </div>
            </section>

            <div class="input-container email">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required="">
            </div>

            <div class="input-container password">
                <label for="password">Password</label>
                <input type="password" id="senha" name="senha" placeholder="Deve ter pelo menos 8 caracteres" max="8" required="">
                <i class="fa-solid fa-eye-low-vision"></i>
            </div>

            <div class="input-container cta">
                <label for="" class="input-container">
                    <input type="checkbox">
                    Se mantenha sempre logado.
                </label>
            </div>

            <button class="entrar-btn" type="submit"> Entrar</button>
            <section class="copy legal">
                <p><span class="small">Apertando em continuar, você concorda em aceitar a nossa <br> <a href="#">Politica de Privacidade</a> &amp; <a href="#">Termos de Serviço</a>.</span></p>
                <p><span class="small">Se deseja sair desta tela <a href="index.php">Clique Aqui</a>.</span></p>
            </section>
        </form>
    </div>

</section>

</body>
</html>