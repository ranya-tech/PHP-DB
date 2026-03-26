<?php
require '../Gestion des produits/config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM produit WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $produits = $stmt->fetch(PDO :: FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modifier.css">
</head>
<body>
    <form method="post">
        <input type="hidden" name="id" value="<?= $produits['id'] ?>" placeholder="id">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?= $produits['nom']?>"><br>
        <label for="prix">Prix</label>
        <input type="number" name="prix"value="<?= $produits['prix']?>"><br>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?= $produits['description']?>"><br>
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" value="<?= $produits['categorie']?>"><br>
        <button type="submit">Modifier</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $id = $_POST['id'];
            $nom = $_POST["nom"];
            $prix = $_POST["prix"];
            $description = $_POST["description"];
            $categorie = $_POST["categorie"];
            if(empty($nom) || empty($prix) || empty($description) ||
            empty($categorie)){
                echo "Remplissez tous les champs";
            }else{
                $sql = "UPDATE produit SET nom = :nom, prix = :prix, description = :description, categorie = :categorie WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'nom' => $nom,
                    'prix' => $prix,
                    'description' => $description,
                    'categorie' => $categorie,
                    'id' => $id
                ]);
                header('Location: liste.php');
                exit;
            }
        }
    ?>
</body>
</html>