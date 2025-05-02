<?php include('layouts/header.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Consulta de Signo</title>
</head>
<body>
  <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-white text-center">
    <h1 class="mb-4">Descubra seu Signo</h1>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="p-4 bg-dark bg-opacity-75 rounded shadow-lg">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" required>
      </div>
      <button type="submit" class="btn btn-primary">Consultar Signo</button>
    </form>
  </div>

  <?php include('layouts/footer.php'); ?>
</body>
</html>