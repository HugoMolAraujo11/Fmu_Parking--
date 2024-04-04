
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finanças Cadastro</title>
    <link rel="stylesheet" href="estilos/manager.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Voltar</a></li>
                <li><a href="financas.php">Lista de finanças</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <form action="financas-cadastrar.php" method="post">
        <h1>Cadastrar Cliente</h1>
        <input type="date" name="data" placeholder="Data Corrente" required><br>
        <input type="text" name="valor" placeholder="Valor" required><br>
        <input type="text" name="nome" placeholder="Nome do cliente" required><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body> 
</html>

<?php
    require_once 'banco.php';
    $bc = new Banco;
    if (isset($_POST['enviar'])){
        $conc = $bc->conectar();
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $data = $_POST['data'];
        $id = "SELECT * FROM `cliente` where nome = '$nome'";
        $result = mysqli_query($conc, $id);
        $dados = mysqli_fetch_assoc($result);
        $id = $dados['id'];
        $sql = "INSERT INTO faturamento (data, valor, cliente) VALUES ('$data', '$valor', '$id')";
        $bc->query($conc, $sql);
        mysqli_close($conc);
    }
?>