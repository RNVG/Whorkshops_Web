<!DOCTYPE html>
<html>
<head>
    <title>Crear Estudiante</title>
</head>
<body>
    <h1>Agregar Nuevo Estudiante</h1>
    <form action="/estudiantes/store" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        
        <label>Apellido:</label>
        <input type="text" name="apellido" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Carrera:</label>
        <select name="carrera_id" required>
            <option value="">Seleccione una carrera</option>
            <?php foreach ($carreras as $carrera): ?>
                <option value="<?= $carrera['id'] ?>"><?= esc($carrera['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Guardar</button>
        <a href="/estudiantes">Cancelar</a>
    </form>
</body>
</html>