<?php
require 'index.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM utilisateur WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
    header("Location: select.php");
    exit;
}
?>