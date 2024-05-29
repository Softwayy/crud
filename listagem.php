<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Lista de Usuários</title>
</head>
<title>Agenda</title>

<body>
    <div class="container">
        <h1>Lista de Usuários</h1>
        <table>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>email</th>
            <th>descrição</th>
            <th>sexo</th>
            <th>experiencias</th>
        </tr>
        

        <?php
        include("conexao.php");

        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['sexo'] . "</td>";
                echo "<td>" . $row['experiencias'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Nenhum usuário encontrado.";
        }

        mysqli_close($conexao);
        ?>
    </table>
    </div>
</body>
</html>
