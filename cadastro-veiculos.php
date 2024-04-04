<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Veiculos</title>
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
    <form action="cadastro-veiculos.php" method="post">
        <h1>Cadastrar Veiculo</h1>
        <input type="text" name="nome" placeholder="Nome do dono do veiculo"><br>
        <input type="text" name="placa" placeholder="Placa do veiculo"><br>
        <input type="text" name="modelo" placeholder="Modelo do veiculo"><br>
        <input type="text" name="cor" placeholder="Cor do veiculo"><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>


<?php
require_once 'banco.php';
$bc = new Banco;
if (isset($_POST['enviar'])) {
    $conc = $bc->conectar();
    $nome = $_POST['nome'];
    $placa = $_POST['placa'];
    $sql = "SELECT id FROM `cliente` WHERE nome='$nome'";
    $result = mysqli_query($conc, $sql);
    $dados = mysqli_fetch_assoc($result);
    $id = $dados['id'];
    $sql = "INSERT INTO veiculo (placa, id_cliente) VALUES ('$placa', '$id')";
    $bc->query($conc, $sql);
    mysqli_close($conc);
}
?>