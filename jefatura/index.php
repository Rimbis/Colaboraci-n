<?php
require "conexion.php";

$stmt = $pdo->query("SELECT * FROM pedidos ORDER BY id_pedido DESC");
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de pedidos</title>
    <link rel="stylesheet" href="css2.css">
</head>
<body>
    <div class="container">
        <h1>Listado de pedidos</h1>
        <a href="crear.php" class="btn-agregar">Agregar pedido</a>

        <?php if (empty($pedidos)): ?>
            <p>No hay pedidos registrados.</p>
        <?php else: ?>
        <ul class="listado-personajes">
            <?php foreach ($pedidos as $p): ?>
                <li class="personaje-item">
                    <span class="nombre"><?= htmlspecialchars($p["Nombre"]) ?></span> |
                    <span class="elemento"><?= htmlspecialchars($p["Objeto"]) ?></span> |
                    <span class="estrellas"><?= htmlspecialchars($p["Cantidad"]) ?></span>

                    <a href="editar.php?id=<?= $p["id"] ?>" class="btn-editar">Editar</a>
                    <a href="eliminar.php?id=<?= $p["id"] ?>" class="btn-eliminar"
                       onclick="return confirm('¿Estás seguro de eliminar este pedido?');">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</body>
</html>