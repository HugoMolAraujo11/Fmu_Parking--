
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
                <li><a href="listar-veiculos.php">Listar Veiculos</a></li>
                <li><a href="listar.php">Listar Clientes</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <table id="customers">
  <tr>
    <th>ID</th>
    <th>Data de entrada</th>
    <th>Hora da entrada</th>
    <th>Hora da saida</th>
    <th>Nome do cliente</th>
  </tr>
  <?php
    require_once 'banco.php';
    $bc = new Banco;
    $con = $bc->conectar();
    $query = "SELECT DISTINCT entrada.id,entrada.dataentrada, entrada.horaentrada, entrada.horasaida, cliente.nome FROM `entrada` INNER JOIN cliente on cliente.id = entrada.cliente
    ";
    $dados = mysqli_query($con, $query);
    $total = mysqli_num_rows($dados);
    if($total > 0) {
    while($result = mysqli_fetch_assoc($dados)){ 
      echo "<tr>".
            "<td>".$result['id']."</td>".
            "<td>".$result['dataentrada']."</td>".
            "<td>".$result['horaentrada']."</td>".
            "<td>".$result['horasaida']."</td>".
            "<td>".$result['nome']."</td>".
            "<td><a href='excluir.php?del=".$result['id']."'><input name='nome' type='button' value='Apagar'></a></td>
            <td><a href='editar.php?id=".$result['id']."&data=".$result['dataentrada']."&hora=".$result['horaentrada']."&saida=".$result['horasaida']."&nome=".$result['nome']."'><input name='nome' type='button' value='Editar'></a></td></tr>";
      }
  }
  ?>
</table>
</body> 
</html>

