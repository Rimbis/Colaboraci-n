<?php
require "conexion.php";

if ($_POST) {
    $id = $_POST["id"];
    $Nombre = trim($_POST["Nombre"]);
    $Objeto = trim($_POST["Objeto"]);
    $Cantidad = trim($_POST["Cantidad"]);

    if ($Nombre !== "" && $Objeto !== "" && $Cantidad !== "") {
        $stmt = $pdo->prepare("UPDATE pedidos SET Nombre = ?, Objeto = ?, Cantidad = ? WHERE id = ?");
        $stmt->execute([$Nombre, $Objeto, $Cantidad, $id]);
        header("Location: indice.php");
        exit;
    } else {
        echo "Por favor, completá todos los campos.";
    }
}
?>
