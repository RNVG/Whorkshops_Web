<!DOCTYPE html>
<html>
<head>
    <title>Editar Estudiante</title>
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form action="/estudiantes/update/<?= $estudiante['id'] ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= esc($estudiante['nombre']) ?>" required><br><br>
        
        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= esc($estudiante['apellido']) ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= esc($estudiante['email']) ?>" required><br><br>

        <label>Carrera:</label>
        <select name="carrera_id" required>
            <option value="">Seleccione una carrera</option>
            <?php foreach ($carreras as $carrera): ?>
                <option value="<?= $carrera['id'] ?>" <?= $carrera['id'] == $estudiante['carrera_id'] ? 'selected' : '' ?>>
                    <?= esc($carrera['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Actualizar</button>
        <a href="/estudiantes">Cancelar</a>
    </form>
</body>
</html>