<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem</title>
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
    <table id="customers">
      <tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Placa</th>
        <th>dataentrada</th>
        <th>datasaida</th>

      </tr>
      <?php
      require_once 'banco.php';
      $bc = new Banco;
      $con = $bc->conectar();
      $query = "SELECT * FROM ``";
      $dados = mysqli_query($con, $query);
      $result = mysqli_fetch_assoc($dados);
      $total = mysqli_num_rows($dados);
      if ($total > 0) {
        do {
          echo "<tr>" .
            "<td>" . $result['cli_id'] . "</td>" .
            "<td>" . $result['cli_nome'] . "</td>" .
            "<td>" . $result['cli_telefone'] . "</td>" .
            "<td>" . $result['vei_placa'] . "</td>" .
            "<td>" . $result['reg_data_entrada'] . "</td>" .
            "<td>" . $result['reg_data_saida'] . "</td>" .
            "</tr>";
        } while ($result = mysqli_fetch_assoc($dados));
      }
      ?>
    </table>
</body>

</html>