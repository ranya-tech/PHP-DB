<?php
require '../Gestion des produits/config.php';
$sql = "SELECT * FROM produit";
$stmt = $pdo->query($sql);
$produits = $stmt->fetchAll(PDO :: FETCH_ASSOC);
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
    <form action="" method="get">
      <input type="text" name="search" placeholder="Recherche">
      <button type='submit'><img src="search.png" alt="search" width="10" height="10"></button>  
    </form>
    <?php 
        if(isset($_GET['search']) && !empty($_GET['search'])){
            $search = $_GET['search'];
            $sql = "SELECT * FROM produit WHERE nom LIKE :search";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'search' => "%$search%"
            ]);
            $produits = $stmt->fetchAll(PDO :: FETCH_ASSOC);
        }
        $total = 0;
        echo "<div class='container'>";
            foreach($produits as $produit){
                echo "<div>";
                echo "<h3>" .$produit['nom']. "</h3>";
                echo "<p>" .$produit['prix']. "</p>";
                echo "<p>" .$produit['description']. "</p>";
                echo "<p>" .$produit['categorie']. "</p>";
                echo "<a href='modifier.php?id=".$produit['id']."'>Modifier</a><br>";
                echo "<a href='supprimer.php?id=".$produit['id']."'>Supprimer</a>";
                echo "</div>";
                $total+= $produit['prix'];
            }
        echo "</div>";
        echo "<h4 class='total'>Total des prix: $total DH</h4>";
    ?>    
</body>
</html>