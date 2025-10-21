<?php
$username = $_GET['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form>
    <label>Usuario:
      <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" readonly />
    </label><br /><br />
    <label>Contraseña:
      <input type="password" name="contraseña" />
    </label><br />
    <button type="button">Entrar</button>
  </form>
</body>
</html>