<?php
require "conexion.php";

if ($_POST) {
    $Nombre = trim($_POST["Nombre"]);
    $Objeto = trim($_POST["Objeto"]);
    $Cantidad = trim($_POST["Cantidad"]);

    if ($Nombre !== "" && $Objeto !== "" && $Cantidad !== "") {
        $stmt = $pdo->prepare("INSERT INTO pedidos (Nombre, Objeto, Cantidad) VALUES (?, ?, ?)");
        $stmt->execute([$Nombre, $Objeto, $Cantidad]);
        header("Location: indice.php");
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
    <link rel="stylesheet" href="css.css">
    <title>Agregar pedido</title>
</head>
<body>
    <div class="decor">
        <h1 class="text">Agregar nuevo pedido</h1>

        <?php if (isset($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form class="deco" action="crear.php" method="POST">
            <input class="lal" type="text" name="Nombre" placeholder="Nombre">
            <input class="lol" type="text" name="Objeto" placeholder="Objeto">
            <input class="lol" type="number" name="Cantidad" placeholder="Cantidad">
            <button class="lil" type="submit">Guardar</button>
        </form>

        <a href="indice.php">← Volver al listado</a>
    </div>
</body>
</html>
