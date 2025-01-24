<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        /* Estilo para a centralização das mensagens */
        .mensagem {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
        }

        .sucesso {
            background-color: #e0f7e0;
            color: #008000;
            border: 1px solid #008000;
        }

        .erro {
            background-color: #f8d7da;
            color: #FF0000;
            border: 1px solid #FF0000;
        }

        .alerta {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
    </style>
</head>
<body>
<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($dados['CadastroUsuario'])) {

    if (!empty($dados['nome']) && !empty($dados['email'])) {
        $sql = "INSERT INTO Users (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindparam(':nome', $dados['nome']);
        $stmt->bindparam(':email', $dados['email']);

        if ($stmt->execute()) {
            echo "<div class='mensagem sucesso'>Usuário cadastrado com sucesso!</div>";
        } else {
            echo "<div class='mensagem erro'>Erro ao cadastrar o usuário.</div>";
        }
    } else {
        echo "<div class='mensagem alerta'>Por favor, preencha todos os campos.</div>";
    }
}
?>
</body>
</html>
