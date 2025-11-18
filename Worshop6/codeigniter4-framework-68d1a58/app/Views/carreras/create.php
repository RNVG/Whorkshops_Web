<!DOCTYPE html>
<html>
<head>
    <title>Crear Carrera</title>
</head>
<body>
    <h1>Agregar Nueva Carrera</h1>
    <form action="/carreras/store" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        
        <button type="submit">Guardar</button>
        <a href="/carreras">Cancelar</a>
    </form>
</body>
</html>