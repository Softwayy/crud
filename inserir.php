<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Formulário</h1>
            <form id="form"  method="post">
                <div>
                    <input type="text" placeholder="Digite seu nome" class="inputs required" name="nome">
                    <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                </div>
                <div>
                    <input type="email" placeholder="Digite seu melhor email" class="inputs required" name="email">
                    <span class="span-required">Digite um email válido</span>
                </div>
                <div>
                    <input type="password" placeholder="Senha" class="inputs required" name="senha">
                    <span class="span-required">Digite uma senha com no mínimo 8 caracteres</span>
                </div>
                <div>
                    <input type="password" placeholder="Repita a sua senha" class="inputs required" name="confirmar_senha">
                    <span class="span-required">Senhas devem ser compatíveis</span>
                </div>
                <textarea class="inputs" name="descricao" id="descricao" cols="25" rows="10" placeholder="Fale um pouco sobre você..." name="descricao"></textarea>
                <p>Sexo:</p>
                <div class="box-select">
                    <div>
                        <input type="radio" id="m" value="m" name="sexo">
                        <label for="m">Masculino</label>
                    </div>
                    <div>
                        <input type="radio" id="f" value="f" name="sexo">
                        <label for="f">Feminino</label>
                    </div>
                    <div>
                        <input type="radio" id="o" value="o" name="sexo">
                        <label for="o">Outro</label>
                    </div>
                </div>
                <p>Quais são seus gostos?</p>
                <div class="box-select">
                    <div>
                        <input type="checkbox" id="html" value="html" name="experiencias[]">
                        <label for="html">Html (sofre pouco)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="css" value="css" name="experiencias[]">
                        <label for="css">Css (depressão)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="js" value="js" name="experiencias[]">
                        <label for="js">JavaScript (pedido de socorro)</label>
                    </div>
                    <div>
                        <input type="checkbox" id="php" value="php" name="experiencias[]">
                        <label for="php">PHP (DEUS TE AMA)</label>
                    </div>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>

<?php

include("conexao.php");

if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['confirmar_senha']) && !empty($_POST['descricao']) && !empty($_POST['sexo'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $descricao = $_POST['descricao'];
    $sexo = $_POST['sexo'];
    $experiencias = implode(',', $_POST['experiencias']);

    if (strlen($nome) < 3) {
        echo "<script>alert('Nome deve ter no mínimo 3 caracteres.');</script>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Digite um email válido.');</script>";
        exit();
    }

    if (strlen($senha) < 8 || $senha !== $confirmar_senha) {
        echo "<script>alert('Digite uma senha com no mínimo 8 caracteres e que seja compatível.');</script>";
        exit();
    }

    $sql = "INSERT INTO usuarios (nome, email, senha, descricao, sexo, experiencias) VALUES ('$nome', '$email', '$senha', '$descricao', '$sexo', '$experiencias')";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo "<script>alert('Usuário inserido com sucesso.');</script>";
    } else {
        echo "<script>alert('Erro ao inserir usuário.');</script>";
    }

    mysqli_close($conexao);
} else {
    echo "<script>alert('Todos os campos são obrigatórios.');</script>";
}
?>


</html>
