
<?php
require './database.php';

 if(isset($_POST['produit'])) {
    $nom_produit = $_POST['produit'];

$query = $pdo->prepare("INSERT INTO produits (nom) VALUES (?)");
$query->execute([$nom_produit]);
header("location:index.php");
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
    <form action="" method="POST">
        <label for="produit">Produit</label>
        <input type="text" id="produit" name="produit">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

