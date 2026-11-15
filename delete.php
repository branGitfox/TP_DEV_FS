<?php
require './database.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $query->execute([$id]);
    header("location:index.php");
}
?>