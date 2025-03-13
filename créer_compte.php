<?php 

require_once(__DIR__ . '/connexion_bdd.php');
$id = $_POST['identifiant'];
$mdp = $_POST['mot-de-passe'];

// Requête préparée
$sqlQueryUp = "INSERT INTO utilisateurs (identifiant, mot_de_passe, score) VALUES (:id, :mdp, 0)";
$stmt = $mysqlClient->prepare($sqlQueryUp);

// Exécuter la requête avec des valeurs sécurisées
if ($stmt->execute(['id' => $id, 'mdp' => $mdp])) {
    echo "Compte créé avec succès !";
} else {
    echo "Erreur lors de la création du compte.";
}

echo '<a href="carte.html">Retour à la carte</a>';