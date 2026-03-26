<?php
require 'config.php';
$sql = "SELECT * FROM produit";
$stmt = $pdo->query($sql);
$produits = $stmt->fetchAll(PDO :: FETCH_ASSOC);
if(isset($_GET['ajouter'])){
    if($_GET['ajouter'] == 'ajouter'){
    echo "Produit ajouté avec succès<br>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion des Produits</h1>
    <a href="ajouter.php">Ajouter un Produit</a>
    <div class="container">
        <?php
            foreach($produits as $produit){
                echo "<div class='card'> 
                        <h4>" .$produit["nom"]. "</h4>
                        <p><strong>Prix:</strong>" .$produit["prix"]. "</p>
                        <a href='détails.php?id=".$produit['id']."'>Détails</a> </div>";
            }
        ?>
    </div>
</body>
</html>