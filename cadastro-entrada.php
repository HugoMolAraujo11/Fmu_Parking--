<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Entradas</title>
  <link rel="stylesheet" href="estilos/manager.css">
</head>

<body class="text-center">
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">FMU - Parking</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="index.php">Home</a>
          <a class="nav-link" href="cadastro-entrada.php">Cadastrar</a>
          <a class="nav-link" href="editar.php">Editar</a>
          <a class="nav-link" href="listar.php">Listagem</a>
          <a class="nav-link" href="financas.php">Finanças</a>
          <?php
          session_start();
          if ((isset($_SESSION['login']))) {
            echo "<a class='nav-link' href='deslogar.php'>Deslogar</a>";
          }
          ?>
        </nav>
      </div>
    </header>

    <div class="clearfix"></div>
    </header>
    <form action="cadastro-entrada.php" method="post">
      <h1>Cadastrar Entrada e saida</h1>
      <label for="horaentrada">Hora da entrada:</label>
      <input type="time" name="reg_data_entrada" required><br>
      <label for="horasaida">Hora da saida:</label>
      <input type="time" name="reg_data_saida" required><br>
      <label for="cpf">CPF:</label>
      <input type="text" name="cli_id" placeholder="cpf" required><br>
      <label for="telefone">Telefone:</label>
      <input type="text" name="cli_telefone" placeholder="Telefone" required><br>
      <h1>Cadastrar Veiculo</h1>
      <input type="text" name="cli_nome" placeholder="Nome do dono do veiculo" required><br>
      <input type="text" name="vei_placa" placeholder="Placa do veiculo" required><br>
      <input type="text" name="vei_modelo" placeholder="Modelo do veiculo"><br>
      <input type="text" name="vei_cor" placeholder="Cor do veiculo"><br>
      <input type="submit" value="Enviar" name="enviar">

    </form>

</body>

</html>

<?php
require_once 'banco.php';
$bc = new Banco;
if (isset($_POST['enviar'])) {
  $conc = $bc->conectar();
  $vei_cor = $_POST['vei_cor'];
  $cli_id = $_POST['cli_id'];
  $vei_modelo = $_POST['vei_modelo'];
  $cli_nome = $_POST['cli_nome'];
  $cli_telefone = $_POST['cli_telefone'];
  $sql_cli = "INSERT INTO cliente (cli_id, cli_nome, cli_telefone) VALUES ('$cli_id', '$cli_nome','$cli_telefone')";
  $reg_data_entrada = $_POST['reg_data_entrada'];
  $vei_placa = $_POST['vei_placa'];
  $reg_data_saida = $_POST['reg_data_saida'];
  $sql = "SELECT vei_placa FROM `veiculo` where vei_placa='$vei_placa'";
  $result = mysqli_query($conc, $sql);
  $dados = mysqli_fetch_assoc($result);
  $id = $dados['id'];
  $sql = "SELECT cli_id FROM `cliente` where cli_nome='$cli_nome'";
  $result = mysqli_query($conc, $sql);
  $dados = mysqli_fetch_assoc($result);
  $nome = $dados['id'];
  $sql = "INSERT INTO entrada (reg_data_entrada, reg_data_saida, vei_placa, cli_id) VALUES ('$reg_data_entrada', '$reg_data_saida', '$vei_placa', '$cli_id')";
  $bc->query($conc, $sql);
  mysqli_close($conc);
}
?>