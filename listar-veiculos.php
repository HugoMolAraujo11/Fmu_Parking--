
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link rel="stylesheet" href="estilos/manager.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Voltar</a></li>
                <li><a href="listar.php">Listar Clientes</a></li>
                <li><a href="listar-entrada.php">Listar entrada e saida por cliente</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <table id="customers">
  <tr>
    <th>ID</th>
    <th>Placa</th>
    <th>Dono do veiculo</th>
  </tr>
  <?php
    require_once 'banco.php';
    $bc = new Banco;
    $con = $bc->conectar();
    $query = "SELECT veiculo.id, veiculo.placa, cliente.nome FROM `veiculo` inner join cliente on veiculo.id_cliente = cliente.id";
    $dados = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
    if($total > 0) {
    do { 
      echo "<tr>".
            "<td>".$result['id']."</td>".
            "<td>".$result['placa']."</td>".
            "<td>".$result['nome']."</td>".
            "</tr>";
      }while($result = mysqli_fetch_assoc($dados));
  }
  ?>
</table>
</body> 
</html>

