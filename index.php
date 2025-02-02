<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>FMU-Parking</title>
  <link rel="stylesheet" href="estilos/inicio.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="text-center">
  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">FMU - Parking</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link active" href="#">Home</a>
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
    <main role="main" class="inner cover">
      <h1 class="cover-heading">FMU - Parking</h1>
      <p class="lead">Sistema para administração e funcionamento de estacionamentos</p>
      <p class="lead">
        <?php
        if (isset($_SESSION['login'])) {
          echo "<a href='cadastro.php' class='btn btn-lg btn-secondary'>Comece agora mesmo</a>";
        } else {
          echo "<a href='login.php' class='btn btn-lg btn-secondary'>Faça o login para começar</a>";
        }

        ?>
      </p>
    </main>
    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>Desenvolvido por Lucas Teixeira, Felipe Rocha e Hugo Mol</p>
      </div>
    </footer>
  </div>
</body>

</html>