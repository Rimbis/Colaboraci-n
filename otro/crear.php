<?php
require "Conexion.php";

if ($_POST) {
    $Nombre = trim($_POST["Nombre"]);
    $Elemental = trim($_POST["Elemental"]);
    $Estrellas = trim($_POST["Estrellas"]);

    if ($Nombre !== "" && $Elemental !== "" && $Estrellas !== "") {
        $stmt = $pdo->prepare("INSERT INTO personajes (Nombre, Elemental, Estrellas) VALUES (?, ?, ?)");
        $stmt->execute([$Nombre, $Elemental, $Estrellas]);
        header("Location: Indice.php");
        exit;
    } else {
        $error = "Por favor, completá todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css.css">
    <title>Agregar personaje</title>
</head>
<body>
    <div class="decor">
        <h1 class="text">Agregar nuevo personaje</h1>

        <?php if (isset($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="deco" action="crear.php" method="POST">
            <input class="lal" type="text" name="Nombre" placeholder="Nombre">
            <input class="lol" type="text" name="Elemental" placeholder="Elemento">
            <input class="lol" type="number" name="Estrellas" placeholder="Estrellas">
            <button class="lil" type="submit">Guardar</button>
        </form>

        <a href="Indice.php">← Volver al listado</a>
    </div>
</body>
</html>
