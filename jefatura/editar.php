<?php
require "conexion.php";

if (!isset($_GET["id"])) {
    die("No se proporcionó un ID de pedido.");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = ?");
$stmt->execute([$id]);
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    die("Pedido no encontrado con el ID: " . htmlspecialchars($id));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Editar pedido</title>
</head>
<body>
    <div class="decor">
        <h1 class="text">Editar pedido</h1>

        <form class="deco" action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($pedido["id"]) ?>">


            <input type="text" name="Nombre" value="<?= htmlspecialchars($pedido["nombre"]) ?>">
            <input type="text" name="Objeto" value="<?= htmlspecialchars($pedido["objeto"]) ?>">
            <input type="number" name="Cantidad" value="<?= htmlspecialchars($pedido["cantidad"]) ?>">

            <button class="lil" type="submit">Guardar cambios</button>
        </form>

        <a href="index.php">← Volver al listado</a>
    </div>
</body>
</html>