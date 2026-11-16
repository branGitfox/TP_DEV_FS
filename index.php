<?php

require './database.php';
$q='';

if(isset($_GET['q'])){
    $q = $_GET['q'];
}

$produits = $pdo->query("SELECT * FROM produits WHERE nom LIKE '%{$q}%'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<style>
    table, th, td {
        border: 1px solid gray;
        border-collapse: collapse;
        padding:5px;
        
    }

    input{
        border-radius:5px;
        outline:.5px solid gray;
        border:none;
        padding:10px;
        margin-right: 10px;
        margin-top: 3px;
    }

    table{
        border-radius:5px;
        margin-top:10px;
    }
    </style>
<body>
    <a href="product_create.php">Ajouter</a>
    <form method="GET" style="display:flex; flex-direction:row; width:200px;">
        <input type="text" placeholder="Rechercher..." name="q">
        <button>Rechercher</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $produit) :?>
            <tr>
                        <td><?= $produit['id'] ?></td>
        <td><?= $produit['nom'] ?></td>
        <td>
            <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a>
            <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a>
        </td>
</tr>
      <?php endforeach; ?>

  
    </tbody>
</body>
</html>