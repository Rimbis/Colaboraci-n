<?php
require "Conexion.php";

if (!isset($_GET["id"])) {
    die("No se proporcionó un ID de Personaje.");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT id, Nombre, Elemental, Estrellas FROM personajes WHERE id = ?");
$stmt->execute([$id]);
$personaje = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$personaje) {
    die("Personaje no encontrado con el ID: " . htmlspecialchars($id));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Editar personaje</title>
</head>
<body>
    <div class="deco">
        <h1 class="text">Editar personaje</h1>

        <form class="deco" action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($personaje["id"]) ?>">
            
            <input class="lal"
                   type="text" name="Nombre"
                   value="<?= htmlspecialchars($personaje["Nombre"]) ?>"
                   placeholder="Nombre">

            <input class="lol"
                   type="text" name="Elemental"
                   value="<?= htmlspecialchars($personaje["Elemental"]) ?>"
                   placeholder="Elemento">

            <input class="lol"
                   type="number" name="Estrellas"
                   value="<?= htmlspecialchars($personaje["Estrellas"]) ?>"
                   placeholder="Estrellas">

            <button class="lil" type="submit">Guardar cambios</button>
        </form>

        <a href="Indice.php">← Volver al listado</a>
    </div>
</body>
</html>
