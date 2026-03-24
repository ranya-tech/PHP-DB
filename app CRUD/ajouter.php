<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="nom" placeholder="Nom"><br>
        <input type="email" name="email"  placeholder="Email"><br>
        <input type="tel" name="telephone"  placeholder="Telephone"><br>
        <input type="number" name="age"  placeholder="Age"><br>
        <button type="submit">Ajouter</button>
    </form>
<?php
require 'index.php';
$erreur = false;
if($_SERVER['REQUEST_METHOD']=== "POST"){
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
        $sql = "INSERT INTO utilisateur(nom, email, telephone, age) VALUES (:nom, :email, :telephone, :age)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "nom" => $nom,
            "email" => $email,
            "telephone" => $telephone,
            "age"=> $age
        ]);
    }
}
?>
</body>
</html>