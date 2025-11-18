<!DOCTYPE html>
<html>
<head>
    <title>Editar Carrera</title>
</head>
<body>
    <h1>Editar Carrera</h1>
    <form action="/carreras/update/<?= $carrera['id'] ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= esc($carrera['nombre']) ?>" required><br><br>
        
        <button type="submit">Actualizar</button>
        <a href="/carreras">Cancelar</a>
    </form>
</body>
</html>