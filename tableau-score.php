<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <script type="module" src="script.js"></script>
        <title>tableau des scores</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="body">
        <header>
        <button class="btn-logout" onclick="window.location='logout.php';" >déconnexion</button>
        <div class="h1-header">
            <a href="index.html"><h1 class="titre-header">geoguessr</h1></a>
            </div>
        </header>
        <script type="module">
            import { APchangement } from "./script.js";
            document.addEventListener('DOMContentLoaded', function() {
                APchangement();
            });
        </script>
        <!-- affiche le tableau des scores -->
        <div class="score-container">

<?php
// connexion à la base de données
require_once(__DIR__ . '/connexion_bdd.php');
// on prépare la requête qui permet de récupérer les identifiants et les scores des utilisateurs dans un ordre décroissant
$sqlQuery = "SELECT identifiant,score FROM utilisateurs ORDER BY score DESC";
$tableau = $mysqlClient->prepare($sqlQuery);
// on exécute la requête
$tableau->execute([]);
// on récupère les données
$score = $tableau->fetchALL(PDO::FETCH_ASSOC);
echo '<p class="scores">';
// on affiche les données en parcourant le tableau
foreach ($score as $row) {
 
    echo htmlspecialchars($row['identifiant']) . " - score: " . htmlspecialchars($row['score']). '<br> <br>';

}
echo '</p>';?>
</div>
 </body>
</html>