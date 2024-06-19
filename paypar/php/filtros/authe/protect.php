<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_cielnte'])){
        die("Você não pode acessar a está página porque não esta logado. <p><a href=\"Entrar.php\">Entrar</a></p>");
    }
?>