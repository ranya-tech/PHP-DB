<?php
require 'index.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM utilisateur WHERE id = :id";
    $stmt= $pdo->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$user){
        echo "Utilisateur invalide";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="number" name="id" value="<?= $user['id'] ?>" placeholder="id">
        <input type="text" name="nom" value="<?= $user['nom'] ?>" placeholder="Nom"><br>
        <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email"><br>
        <input type="tel" name="telephone" value="<?= $user['telephone'] ?>" placeholder="Telephone"><br>
        <input type="number" name="age" value="<?= $user['age'] ?>" placeholder="Age"><br>
        <button type="submit">Ajouter</button>
    </form>
<?php
$erreur = false;
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = $_GET['id'];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $age = $_POST["age"];
    if(empty($nom) || empty($email) || empty($telephone) || empty($age)){
        echo "Tous les champs sont obligatoire <br>";
        $erreur = true;
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Email invalide <br>";
            $erreur = true;
        }
        if($age<18){
            echo "Age invalide <br>";
            $erreur = true;
        }
    }
    if($erreur == false){
        $sql = "UPDATE utilisateur SET nom = :nom, email = :email, telephone = :telephone, age = :age WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone,
            'age' => $age,
            'id' => $id
        ]);
        header('Location: select.php');
        exit;
    }   
}
?>
</body>
</html>