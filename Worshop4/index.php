<?php
require_once "base_BD.php";

// Instancias POO
$bd   = new BaseBD();
$conn = $bd->getConexion();
$repo = new UsuarioBD($conn);

// Traer provincias para el <select>
$provincias = $repo->obtenerProvincias();

// Esto se puede quitar
$bd->cerrar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de Usuarios</title>
</head>
<body>
  <h1>Registro</h1>

  
  <form action="registro.php" method="post" autocomplete="off">
    <label>
      Nombre:
      <input type="text" name="nombre" required />
    </label>
    <br />

    <label>
      Apellidos:
      <input type="text" name="apellidos" required />
    </label>
    <br />

    <label>
      Nombre de usuario:
      <input type="text" name="username" required />
    </label>
    <br />

    <label>
      Provincia:
      <select name="provincia" required>
        <option value="">Seleccione una provincia</option>
        <?php foreach ($provincias as $p): ?>
          <option value="<?= htmlspecialchars($p) ?>"><?= htmlspecialchars($p) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <br /><br />

    <button type="submit">Guardar</button>
  </form>
</body>
</html>