<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Clientes</title>
    <link rel="stylesheet" href="estilos/manager.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Voltar</a></li>
                <li><a href="cadastro-entrada.php">Cadastrar entrada e saida</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <form action="cadastro.php" method="post">
        <h1>Cadastrar Cliente</h1>
        <input type="text" name="cli_nome" placeholder="Nome do cliente" required><br>
        <input type="text" name="cli_endereco" placeholder="Endereço" required><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>

<?php
require_once 'banco.php';
$bc = new Banco;
if (isset($_POST['enviar'])) {
    $conc = $bc->conectar();
    $cli_nome = $_POST['cli_nome'];
    $telefone = $_POST['telefone'];
    $sql = "INSERT INTO cliente (cli_nome, telefone) VALUES ('$cli_nome', '$telefone')";
    $bc->query($conc, $sql);
    mysqli_close($conc);
}
?>