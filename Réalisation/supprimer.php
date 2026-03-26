<?php
require '../Gestion des produits/config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM produit WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    header('Location: liste.php');
    exit;
}
?>