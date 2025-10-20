<?php
require "Conexion.php";

$stmt = $pdo->query("SELECT * FROM personajes");
$personajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de personajes</title>
    <link rel="stylesheet" href="css2.css">
</head>
<body>
    <div class="container">
        <h1>Listado de personajes</h1>
        <a href="crear.php" class="btn-agregar">Agregar personaje</a>

        <ul class="listado-personajes">
<?php foreach ($personajes as $p): ?>
    <li class="personaje-item">
        <span class="nombre"><?= htmlspecialchars($p["Nombre"]) ?></span> |
        <span class="elemento"><?= htmlspecialchars($p["Elemental"]) ?></span> |
        <span class="estrellas"><?= htmlspecialchars($p["Estrellas"]) ?></span>
        
        <a href="Editar.php?id=<?= $p["id"] ?>" class="btn-editar">Editar</a>

        <a href="eliminar.php?id=<?= $p["id"] ?>" class="btn-eliminar"
           onclick="return confirm('¿Estás seguro de eliminar este personaje?');">Eliminar</a>

    </li>
<?php endforeach; ?>
</ul>

    </div>
</body>
</html>
