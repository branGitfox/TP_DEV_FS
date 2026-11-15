# TP 1 : Gestion de produits (CRUD PHP & MySQL)

**Étudiant :** Ravomanana Brandon Fidelin  
**Classe :** # 3IIIA  
**Matière :** Développement Web / PHP  
**Date :** 15 Novembre 2026  

---

## 1. Présentation du TP

Ce travail pratique consiste à concevoir une petite application web en PHP procédural connectée à une base de données MySQL. L'objectif principal est de mettre en place les opérations de base d'un CRUD (Create, Read, Update, Delete) ainsi qu'un système de recherche par nom de produit.

---

## 2. Prérequis et installation

Pour exécuter le projet en local, j'utilise l'environnement **XAMPP / LAMPP**.

### Configuration de la base de données
1. Lancer les services **Apache** et **MySQL**.
2. Accéder à phpMyAdmin (`http://localhost/phpmyadmin`).
3. Créer une base de données nommée `tp_crud`.
4. Exécuter le script SQL suivant pour créer la table :

```sql
CREATE DATABASE IF NOT EXISTS tp_crud;
USE tp_crud;

CREATE TABLE IF NOT EXISTS produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);
```

### Connexion
La connexion se fait dans le fichier `database.php` avec PDO :
- **Hôte :** localhost
- **Base :** tp_crud
- **Utilisateur :** root
- **Mot de passe :** *(vide par défaut sur LAMPP/XAMPP)*

---

## 3. Structure du projet

Le projet est composé de 5 fichiers PHP à la racine :

- **`database.php`** : Initialisation de l'instance PDO pour la connexion à la base de données. Il est inclus (`require`) dans les autres fichiers.
- **`index.php`** : Page d'accueil. Elle affiche la liste des produits sous forme de tableau HTML avec les liens d'action (Modifier / Supprimer). Elle intègre aussi la barre de recherche.
- **`product_create.php`** : Formulaire permettant d'ajouter un nouveau produit en base (méthode `POST`).
- **`edit.php`** : Page de modification. Elle récupère le produit ciblé via son `id` en paramètre d'URL (`GET`), pré-remplit le champ texte, puis applique la mise à jour (`UPDATE`).
- **`delete.php`** : Script de suppression directe d'un produit selon son `id` passé en paramètre, suivi d'une redirection vers l'accueil.

---

## 4. Fonctionnalités implémentées

- **Affichage (Read) :** Sélection de tous les produits et parcours des résultats dans un tableau avec une boucle `foreach`.
- **Recherche :** Filtrage dynamique par mot-clé via une requête `GET` et la clause SQL `LIKE '%q%'`. Si le champ est vide, tous les produits s'affichent normalement.
- **Ajout (Create) :** Insertion d'une ligne via formulaire avec requête préparée (`INSERT INTO produits (nom) VALUES (?)`). Redirection automatique vers `index.php`.
- **Modification (Update) :** Chargement des données existantes avec `fetch()`, puis mise à jour avec `UPDATE produits SET nom = ? WHERE id = ?`.
- **Suppression (Delete) :** Suppression ciblée avec `DELETE FROM produits WHERE id = ?`.

---

## 5. Remarques techniques et axes d'amélioration

- **Sécurité :** L'utilisation de requêtes préparées (`prepare` + `execute`) sur l'ajout, la modification et la suppression permet d'éviter les injections SQL. Pour la recherche dans `index.php`, une requête préparée pourrait également être mise en place pour uniformiser le code.
- **Expérience utilisateur :**
  - Ajouter une boîte de dialogue de confirmation JavaScript avant la suppression pour éviter les erreurs de manipulation (`onclick="return confirm('...')"`).
  - Améliorer l'interface graphique avec du CSS ou un framework léger (Bootstrap/Tailwind).
  - Ajouter une vérification côté serveur pour empêcher l'insertion de chaînes vides ou de doublons.
