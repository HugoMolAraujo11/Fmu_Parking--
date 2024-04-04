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
    <table id="customers">
      <tr>
        <th>Data Corrente</th>
        <th>Nome do cliente</th>
        <th>Valor Total</th>
      </tr>
      <?php
      //require_once 'banco.php';
      //$bc = new Banco;
      //$con = $bc->conectar();
      $query = "SELECT faturamento.data, cliente.nome, valor FROM faturamento INNER JOIN cliente on cliente.id = faturamento.cliente";
      //$dados = mysqli_query($con, $query);
      //$result = mysqli_fetch_assoc($dados);
      //$total = mysqli_num_rows($dados);
      if ($total > 0) {
        do {
          echo "<tr>" .
            "<td>" . $linha['data'] . "</td>" .
            "<td>" . $linha['nome'] . "</td>" .
            "<td>" . $linha['valor'] . "</td>" .
            "</tr> ";
        } while ($linha = mysqli_fetch_assoc($dados));
      }
      ?>

      <?php
      //require_once 'banco.php';
      //$bc = new Banco;
      if (isset($_POST['enviar'])) {
        //$conc = $bc->conectar();
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $data = $_POST['data'];
        $id = "SELECT * FROM `cliente` where nome = '$nome'";
        //$result = mysqli_query($conc, $id);
        //$dados = mysqli_fetch_assoc($result);
        $id = $dados['id'];
        $sql = "INSERT INTO faturamento (data, valor, cliente) VALUES ('$data', '$valor', '$id')";
        //$bc->query($conc, $sql);
        //mysqli_close($conc);
      }
      ?>
    </table>
</body>

</html>