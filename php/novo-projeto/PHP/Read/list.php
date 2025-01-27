<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar CRUD+PDO</title>
</head>
<body>

    <div class="form-container">
        <h1>Listar</h1>
        <form name="cad-user" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome completo" required><br>

            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" placeholder="E-mail compatível" required>

            <input type="submit" value="Cadastrar" name="CadastroUsuario">
        </form>
    </div>

</body>
</html>