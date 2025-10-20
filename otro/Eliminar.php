<?php
require "Conexion.php";

if (!isset($_GET["id"])) {
    die("No se proporcionó un ID de personaje.");
}

$id = $_GET["id"];

try {
    $stmt = $pdo->prepare("DELETE FROM personajes WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: Indice.php");
    exit;
} catch (PDOException $e) {
    die("Error al eliminar personaje: " . $e->getMessage());
}
?>
