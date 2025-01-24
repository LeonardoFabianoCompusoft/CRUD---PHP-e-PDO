<?php
    require_once "Connection/connection.php";  // Conexão com o banco de dados
    require_once "PHP/register.php";           // Função de cadastro de usuários
    
    $modelo = file_get_contents("Template/index.html"); // Carrega o HTML
    
    echo $modelo;  // Exibe o conteúdo da página
?>
