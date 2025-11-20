<?php
require "conexion.php";

if (!isset($_GET["id"])) {
    die("No se proporcionó un ID de pedido.");
}

$id = $_GET["id"];

try {
    $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    die("Error al eliminar pedido: " . $e->getMessage());
}
?>