<?php
require 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM produit WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $detail = $stmt->fetch(PDO :: FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="details.css">
</head>
<body>
    <a href="catalogue.php">Catalogue</a>
    <div>
        <?php
            if(isset($detail)){
                echo "<h3>". $detail['nom'] ."</h3>";
                echo "<p><span>Prix:</span> ". $detail['prix'] ."</p>";
                echo "<p><span>Description:</span> ". $detail['description'] ."</p>";
                echo "<p><span>Categorie:</span> ". $detail['categorie'] ."</p>";
            }  
        ?>
    </div>
</body>
</html>