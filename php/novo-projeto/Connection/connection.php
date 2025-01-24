<?php 
$dsn = 'mysql:host=mysql;dbname=dbCRUD;charset=utf8mb4';  // Adicionei o nome do banco de dados
$user = 'root';
$password = 'teste@123';

    $pdo = null;
try {
    $pdo = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
