<?php
require 'index.php';

$sql = "SELECT * FROM utilisateur";
$stmt= $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border='1'>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Age</th>
            <th colspan="2">Action</th>
        </tr>
<?php
    foreach($users as $user){
        echo "<tr>";
        echo "<td>". $user['id'] ."</td>";
        echo "<td>". $user['nom'] ."</td>";
        echo "<td>". $user['email'] ."</td>";
        echo "<td>". $user['telephone'] ."</td>";
        echo "<td>". $user['age'] ."</td>";
        echo "<td><a href='modifier.php?id=" . $user['id'] . "'>modifier</a></td>";
        echo "<td><a href='delete.php?id=" . $user['id'] . "'>supprimer</a></td>";
        echo "</tr>";
    }
?>
    </table>
</body>
</html>