<!DOCTYPE html>
<html>
<head>
    <title>Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <a href="/estudiantes/create">+ Agregar Nuevo Estudiante</a>
    <ul>
        <?php foreach ($estudiantes as $estudiante): ?>
            <li>
                <?= esc($estudiante['nombre']) ?> <?= esc($estudiante['apellido']) ?> 
                (<?= esc($estudiante['email']) ?>) 
                - Carrera: <?= esc($estudiante['carrera_nombre']) ?>
                <a href="/estudiantes/edit/<?= $estudiante['id'] ?>">Editar</a> |
                <a href="/estudiantes/delete/<?= $estudiante['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>
    <a href="/carreras">Ver Carreras</a>
</body>
</html>