<?php
$host = 'localhost';
$dbname = 'gestion_produits';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
}catch(PDOException $a){
    file_put_contents(erreurs.log, $a->getMessage(), FILE_APPEND);
    echo 'erreur';
}
?>