<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro CRUD+PDO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .mensagens {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            z-index: 10;
        }

        .mensagem {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        .sucesso {
            background-color: green;
        }

        .erro {
            background-color: red;
        }

        .preencher {
            background-color: orange;
        }

        .form-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //validações
    if (!empty($dados['CadastroUsuario'])) {
        $empty_input = false;
        $dados = array_map('trim', $dados);

        if (in_array("", $dados)) {
            $empty_input = true;
            echo "<div class='mensagens'><div class='mensagem preencher'>Por favor, preencha todos os campos.</div></div>";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            echo "<div class='mensagens'><div class='mensagem preencher'>Por favor, preencha os campos com dados válidos (email).</div></div>";
        }
        //conexão com banco de dados e inserção dos dados
        if (!$empty_input) {
            try {
                $pdo = new PDO('mysql:host=mysql;dbname=dbCRUD', 'root', 'teste@123');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO Users (nome, email) VALUES (:nome, :email)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindparam(':nome', $dados['nome']);
                $stmt->bindparam(':email', $dados['email']);

                if ($stmt->execute()) {
                    echo "<div class='mensagens'><div class='mensagem sucesso'>Usuário cadastrado com sucesso!</div></div>";
                    unset($dados);
                } else {
                    echo "<div class='mensagens'><div class='mensagem erro'>Erro ao cadastrar o usuário.</div></div>";
                }
            } catch (PDOException $e) {
                echo "<div class='mensagens'><div class='mensagem erro'>Erro na conexão com o banco de dados: " . $e->getMessage() . "</div></div>";
            }
        }
    }
    ?>

    <div class="form-container">
        <h1>Cadastrar</h1>
        <form name="cad-user" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>"><br><br>

            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" placeholder="E-mail compatível" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>">

            <input type="submit" value="Cadastrar" name="CadastroUsuario">
        </form>
    </div>
</body>

</html>
