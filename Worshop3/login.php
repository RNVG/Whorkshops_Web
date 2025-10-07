<?php
// Si viene el nombre de usuario desde el registro, lo mostramos en el campo
$username = $_GET['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <form>
    <label>
      Nombre de usuario:
      <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" readonly />
    </label>
    <br /><br />

    <label>
      Contraseña:
      <input type="text" name="contraseña" />
    </label>

    <button type="button">Entrar</button>
  </form>
</body>
</html>