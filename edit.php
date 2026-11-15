<?php
require './database.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$pre_nom = $pdo->prepare("SELECT nom FROM produits WHERE id =?");
$pre_nom->execute([$id]);
$nom=$pre_nom->fetch();
if(isset($_POST['produit']) && !empty($_POST['produit'])) {
    $nom = $_POST['produit'];
    $query = $pdo->prepare('UPDATE produits SET nom = ? where id = ?');
    $query->execute([$nom, $id]);
  echo 'ici';
    header('location:index.php');
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
    <a></a>
    <form action="" method="POST">
        <label for="produit">Produit</label>
        <input type="text" id="produit" name="produit" value="<?=$nom['nom'] ?>">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>