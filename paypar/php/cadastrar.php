<?php
    session_start();
    include('filtros/conexao.php');
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
        <form action="filtros/registro.php" method="POST" enctype="multipar/form-data">
            <section class="copy">
                <h2>Cadastrar</h2>
                <div class="login-container">
                    <p>Já possui uma conta? <a href="Entrar.php"><strong>Entrar</strong></a></p> 
                </div>

            </section>


            <div class="input-container name">
                <label for="fname">Nome</label>
                <input type="text" id="fname" name="name" placeholder="Digite seu Nome" required>
            </div>

            <div class="input-container name">
                <label for="fname">SobreNome</label>
                <input type="text" id="fname" name="sname" placeholder="Digite seu SobreNome" required>
            </div>

            <div class="input-container email">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu E-mail" required>
            </div>

            <div class="input-container password">
                <label for="password">Password</label>
                <input type="password" id="password" name="senha" placeholder="Digite sua Senha" required>
             </div>

             <label for="nivel_acesso">Nível de Acesso:</label>
              <select id="nivel_acesso" name="nivel_acesso" required>
                 <option value="usuario">Usuário</optio>
                 <option value="admin">Administrador</option>
              </select><br><br>

            <button class="entrar-btn" type="submit" name="submit" value="Cadastrar">cadastrar</button>
            <section class="copy legal">
                <p><span class="small">Se deseja sair desta tela <a href="index.php">Clique Aqui</a>.</span></p>
            </section>
        </form>
    </div>

</section>

</body>
</html>