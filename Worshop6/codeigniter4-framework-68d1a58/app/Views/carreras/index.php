<!DOCTYPE html>
<html>
<head>
    <title>Carreras</title>
</head>
<body>
    <h1>Lista de Carreras</h1>
    <a href="/carreras/create">+ Agregar Nueva Carrera</a>
    <ul>
        <?php foreach ($carreras as $carrera): ?>
            <li>
                <?= esc($carrera['nombre']) ?>
                <a href="/carreras/edit/<?= $carrera['id'] ?>">Editar</a> |
                <a href="/carreras/delete/<?= $carrera['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>
    <a href="/estudiantes">Ver Estudiantes</a>
</body>
</html>