<?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(!empty($dados['CadastroUsuario']))
    {
        
        if(!empty($dados['nome']) && !empty($dados['email']))
        { 
            $sql = "INSERT INTO Users (nome, email) VALUES (:nome, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindparam(':nome', $dados['nome']);
            $stmt->bindparam(':email', $dados['email']);

            if ($stmt->execute()) 
            {
                echo "Usuário cadastrado com sucesso!";
            } 
            else 
            {
                echo "Erro ao cadastrar o usuário.";
            }
        } 
            else 
            {
                echo "Por favor, preencha todos os campos.";
            }
    }
                

?>