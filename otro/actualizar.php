<?php
require "Conexion.php";

if ($_POST) {
    $id = $_POST["id"];
    $Nombre = trim($_POST["Nombre"]);
    $Elemental = trim($_POST["Elemental"]);
    $Estrellas = trim($_POST["Estrellas"]);

    if ($Nombre !== "" && $Elemental !== "" && $Estrellas !== "") {
        $stmt = $pdo->prepare("UPDATE personajes SET Nombre = ?, Elemental = ?, Estrellas = ? WHERE id = ?");
        $stmt->execute([$Nombre, $Elemental, $Estrellas, $id]);
        header("Location: Indice.php");
        exit;
    } else {
        echo "Por favor, completá todos los campos.";
    }
}
?>
