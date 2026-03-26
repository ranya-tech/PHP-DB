<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom"><br>
        <label for="prix">Prix:</label>
        <input type="number" name="prix"><br>
        <label for="description">Description:</label>
        <input type="text" name="description"><br>
        <label for="categorie">Categorie:</label>
        <input type="text" name="categorie"><br>
        <button type="submit">Ajouter</button>
    </form>
<?php
require 'config.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];
    if(empty($nom) || empty($prix) || empty($description) ||
    empty($categorie)){
        echo "<h3 class='erreur'>Remplissez tous les champs<h3>";
    }else{
        $sql = "INSERT INTO produit(nom, prix, description, categorie) VALUES(:nom, :prix, :description, :categorie)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'prix' => $prix,
            'description' => $description,
            'categorie' => $categorie
        ]);
        header('Location: catalogue.php?ajouter=ajouter');
        exit;
    }
}
?>
</body>
</html>