<?php
include('config.php');

// Verifica se o campo de entrada "logout" foi enviado
if (isset($_POST['logout']) && $_POST['logout'] == 'true') {
    // Chama a função de logout
    logout();
}

function logout() {
   // Limpa todas as variáveis de sessão
   $_SESSION = array();

   // Destroi a sessão
   session_destroy();

   // Redireciona para a página de login
   header("Location: index.php");
}